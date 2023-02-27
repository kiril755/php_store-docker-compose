<?php
namespace Controllers\admin;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/SignIn.php';

use database\DatabaseMysql;
use Models\SignIn;

class AdminAuthController {
    public static function signIn ()  {
        $db = new DatabaseMysql();
        $data = $db->dbConnect();
        SignIn::adminAuthorize($_POST, $data);
    }
}

AdminAuthController::signIn();