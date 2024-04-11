<?php
require_once(__DIR__ . "../model/Api.php");
require_once(__DIR__ . "/../model/RequestHandler.php");
// require_once(__DIR__ . "/../model/DatabaseDriver.php");

class Newsletter extends Api
{
    private $db;
    private $request;

    public function __construct(array $apiCall)
    {
        $this->request = ($apiCall[2]) ?? null;
    }

    public function callFunction(): mixed
    {
        if ($this->request) {
            switch ($this->request) {
                case 'subscribe':
                    return [$this->subscribe(), true];
                    break;
                default:
                    return ["Invalid request", false];
            }
        }
    }

    private function subscribe(): string
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'] ?? null;

            if ($email) {
                $query = "INSERT INTO newsletter_emails (email) VALUES (:email)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':email', $email);

                if ($stmt->execute()) {
                    return "Subscription successful";
                } else {
                    return "Subscription failed";
                }
            } else {
                return "No email provided";
            }
        } else {
            return "Invalid request method";
        }
    }
}