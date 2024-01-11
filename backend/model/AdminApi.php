<?php

require_once(__DIR__ . "/Api.php");

class AdminApi extends Api
{
    public function loggedAsAdmin()
    {
        $this->sessionInit();
        $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_ADMIN);
        return $this->checkAccess();
    }
}
