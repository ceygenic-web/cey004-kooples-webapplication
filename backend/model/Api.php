<?php
require_once(__DIR__ . "/../model/DataValidator.php");
require_once(__DIR__ . "/../model/SessionManager.php");

class Api
{

    public DatabaseDriver $database;
    public SessionManager $sessionManager;
    public DataValidator | null $validator = null;

    public function sessionInit()
    {
        $this->sessionManager = new SessionManager();
    }

    public function checkAccess()
    {
        return $this->sessionManager->isLoggedIn();
    }

    private function ConnectDatabase()
    {
        $this->database = new DatabaseDriver();
    }

    public function getData(string $query, string $type = null, array $data = [])
    {
        $this->ConnectDatabase();
        if (count($data) !== 0 && isset($type) && !empty($type)) {
            $results =  $this->database->execute_query($query, $type, $data);
        } else {
            $results =  $this->database->query($query);
        }

        return $results->fetch_all(1);
    }

    public function updateData(string $query, string $type = null, array $data = []): void
    {
        $this->ConnectDatabase();
        if (count($data) !== 0 && isset($type) && !empty($type)) {
            $this->database->execute_query($query, $type, $data);
        } else {
            $this->database->query($query);
        }
    }

    public function updateQueryBuilder(string $table, array $collumns, string $types, array $data)
    {
        // set the update query
        $updateQuery = "UPDATE `$table` SET ";
        $queryDataTypes = "";
        $queryData = [];

        for ($i = 0; $i < count($collumns); $i++) {
            $updateQuery .=  ($i == 0) ? " `$collumns[$i]`= ? " :  ", `$collumns[$i]`= ? ";
            $queryDataTypes .= $types[$i];
            array_push($queryData, $data[$i]);
        }
        return [$updateQuery, $queryDataTypes, $queryData];
    }

    public function validateData(object $data): object
    {
        if (!$this->validator) {
            $this->validator = new DataValidator($data);
        }
        return $this->validator->validate();
    }
}
