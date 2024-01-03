<?php

require_once(__DIR__ . "/Api.php");

class AdminApi extends Api
{
    public function loggedAsAdmin()
    {
        $this->sessionInit();
        $this->sessionManager->updateSessionVariable("cey004_admin");
        return $this->checkAccess();
    }
}
