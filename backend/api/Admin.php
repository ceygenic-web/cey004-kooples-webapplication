<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for admin user related processes
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/PasswordHash.php';
require_once __DIR__ . '/../model/mail/MailSender.php';

class Admin extends Api
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
              $adminData = $this->dbCall("SELECT * FROM `admin` WHERE `email` = ? ", "s", [$email]);
              if (count($adminData) == 0) {
                     return self::response(2, "Invalid Admin Email");
              }

              // check passwords
              if (!PasswordHash::isValid($password, $adminData[0]["password_hash"])) {
                     return self::response(2, "Invalid Password");
              }

              // log in as admin
              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
              $this->sessionManager->login(null);

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
              $this->sessionManager->login($adminData[0]["admin_id"]);

              return self::response(1, "new admin logged in"); // json response
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

              $adminData = ($id !== null) ?
                     $this->dbCall("SELECT `admin_id`, `email`, `last_logged_datetime` FROM `admin` WHERE `admin_id`=?", "i", [$id]) :
                     $this->dbCall("SELECT `admin_id`, `email`, `last_logged_datetime` FROM `admin` ");

              return self::response(1, $adminData); // json response
       }

       // log out a user from an account
       protected function logout()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
              $this->sessionManager->logout();

              return self::response(1, "user logged out"); // json response
       }


       // send admin verification
       protected function send_verification()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->isAPI = false;
              if (!$this->is_logged()) {
                     return self::response(2, "Invalid Access!");
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
              $id = $this->sessionManager->getSessionData();
              $email = $this->dbCall("SELECT `email` FROM `admin` WHERE `admin_id` =  " . $id)[0]["email"];
              $verificationCode = random_int(111111, 999999);
              $nowTime = date("Y-m-d H:i:s");

              $this->dbCall("UPDATE `admin` 
                                   SET `verification_code` = '$verificationCode' , `last_code_generated_time` = '$nowTime' 
                                   WHERE `admin_id`= '$id' ");

              $mailSender = new MailSender($email);
              $mailSender->mailInitiate("Kooples Clothing | Admin Verification", "Verification Code", "Here is your verification code : $verificationCode . Note that this code will be expired after 5 minutes!");

              if (!$mailSender->sendMail()) {
                     return self::response(2, "Varification Code Sending failed!"); // json response
              }

              return self::response(1, "Verification Code Sent to your email!"); // json response
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

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
              $verificationCode = $this->dbCall("SELECT `verification_code` FROM `admin` WHERE `admin_id` =  " . $this->sessionManager->getSessionData())[0]["verification_code"];

              if ($verificationCode !== $code) {
                     return self::response(2, "Invalid Code!"); // json response
                     // security messures apply here....
              }

              return self::response(1, "Admin is verified!"); // json response
       }

       // check admin access status
       public function is_logged()
       {
              if ($this->isAPI && !self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
              $isAdmin = $this->sessionManager->isLoggedIn();

              if ($this->isAPI) {
                     return self::response(1, ($isAdmin) ? "logged as an admin!" : "not an admin!"); // json response
              }

              return $isAdmin;
       }
}
