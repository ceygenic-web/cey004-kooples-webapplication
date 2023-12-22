<?php
require_once(__DIR__ . "/../model/DataValidator.php");

class Api
{

    public DatabaseDriver $database;
    public DataValidator | null $validator = null;

    private function ConnectDatabase()
    {
        $this->database = new DatabaseDriver();
    }

    public function getData(string $query, string $type = null, array $data = null)
    {
        $this->ConnectDatabase();
        if ($data) {
            var_dump($query);
            $results =  $this->database->execute_query($query, $type, $data);
        } else {
            $results =  $this->database->query($query);
        }

        return $results->fetch_all(1);
    }

    public function updateData(string $query, string $type = null, array $data = null): void
    {
        $this->ConnectDatabase();
        if ($data) {
            $this->database->execute_query($query, $type, $data);
        } else {
            $this->database->query($query);
        }
    }

    public function validateData(object $data): object
    {
        if (!$this->validator) {
            $this->validator = new DataValidator($data);
        }
        return $this->validator->validate();
    }
}
