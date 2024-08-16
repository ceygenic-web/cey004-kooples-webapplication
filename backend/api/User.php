<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for admin user related processes
 */

use Random\Engine\Secure;

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/PasswordHash.php';
require_once __DIR__ . '/../model/mail/MailSender.php';

class User extends Api
{

       private bool $isAPI;

       public function __construct($apiPath, $isAPI = true)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->isAPI = $isAPI;
              if ($this->isAPI) {
                     $this->init($this);
              }
       }


       // admin login process
       protected function login()
       {
              // request validation
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              // get user inputs
              $email = $_POST["email"] ?? null;
              $password = $_POST["password"] ?? null;

              // validate data
              if (!$email || !$password) {
                     return self::response(2, "Missing Parameters");
              }

              $errors = $this->validateData(["email" => ["email" => $email], "password" => ["password" => $password]]);
              if ($errors !== null) {
                     return self::response(2, $errors);
              }

              // check if admin exists
              $userData = $this->dbCall("SELECT * FROM `user` WHERE `email` = ? ", "s", [$email]);
              if (count($userData) == 0) {
                     return self::response(2, "Invalid User Email");
              }

              // check passwords
              if (!PasswordHash::isValid($password, $userData[0]["password_hash"])) {
                     return self::response(2, "Invalid Password");
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $this->sessionManager->login($userData[0]["id"]);

              return self::response(1, "new user logged in"); // json response
       }

       // get admins data process
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $id = $_GET["id"] ?? null; // single admin data


              $this->isAPI = false;
              if (!$this->is_logged()) {
                     return self::response(2, "Invalid Access!");
              }

                $userData = ($id !== null) ?
                             $this->dbCall("SELECT `id`, `email`, `lastlogged_datetime` FROM `user` WHERE `id`=?", "i", [$id]) :
                             $this->dbCall("SELECT `id`, `email`, `lastlogged_datetime` FROM `user` ");

              return self::response(1, $userData); // json response
       }

       // log out a user from an account
       protected function logout()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $this->sessionManager->logout();

              return self::response(1, "user logged out"); // json response
       }
       protected function register(){
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $email = $_POST["email"] ?? null;
              $password = $_POST["password"] ?? null;
              $firstName = $_POST["first_name"] ?? null;
              $lastName = $_POST["last_name"] ?? null;

              $errors = $this->validateData([
                     "email" => ["email" => $email],
                     "password" => ["password" => $password],
                     "text_255" => ["first_name" => $firstName, "last_name" => $lastName]
              ]);
              //send response if validation error occurs
              if ($errors !== null) {
                     return self::response(2, $errors);
              }
              //check email already exist
              $emailExist = $this->dbCall("SELECT `id` FROM `user` WHERE `email` = ?", "s", [$email]);
              if (count($emailExist) > 0) {
                     return self::response(2, "Email already exists!");
              }
              $verificationCode = random_int(111111, 999999);

              $passwordHash = PasswordHash::hash($password);
              $this->crudOperator->insert("user", [
                     "email" => $email,
                     "password_hash" => $passwordHash,
                     "firstname" => $firstName,
                     "lastname" => $lastName,
                     "registered_datetime" => date("Y-m-d H:i:s"),
                     "lastlogged_datetime" => date("Y-m-d H:i:s"),
                     "user_status_id"=>1,
                     "verification_code" => $verificationCode,
              ]);

              //log the user in
              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $this->sessionManager->login($this->dbCall("SELECT `id` FROM `user` WHERE `email` = ?", "s", [$email])[0]["id"]);
             
            

              //send verification number
              $mailSender = new MailSender($email);
              $mailSender->mailInitiate("Blanks Clothing | User Verification", "Verification Code", "Here is your verification code : $verificationCode . Note that this code will be expired after 5 minutes!");
              if (!$mailSender->sendMail()) {
                     return self::response(2, "Varification Code Sending failed!"); // json response
              }
              return self::response(1, "User Registered Successfully!"); // json response
       }



       // verify an admin account
       protected function verify()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->isAPI = false;
              if (!$this->is_logged()) {
                     return self::response(2, "Invalid Access!");
              }

              $code =  $_POST["code"] ?? null;

              $errors = $this->validateData(["id_int" => ["code" =>  $code]]);
              if ($errors !== null) {
                     return self::response(2, $errors); // json response
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $verificationCode = $this->dbCall("SELECT `verification_code` FROM `user` WHERE `id` =  " . $this->sessionManager->getSessionData())[0]["verification_code"];

              if ($verificationCode !== $code) {
                     return self::response(2, "Invalid Code!"); // json response
                     // security messures apply here....
              }

              return self::response(1, "User is verified!"); // json response
       }

       // check admin access status
       public function is_logged()
       {
              if ($this->isAPI && !self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $isUser = $this->sessionManager->isLoggedIn();

             

              return $isUser;
       }
}
