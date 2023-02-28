<?php
namespace Controllers\admin;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/SignIn.php';

use database\DatabaseMysql;
use Models\SignIn;

class AdminAuthController {
    public static function signIn ()  {
        if (isset($_SESSION['user'])) {
            header('location: /');
            return;
        }
        $db = new DatabaseMysql();
        $data = $db->dbConnect();
        $result = SignIn::adminAuthorize($_POST, $data);
        if (is_string($result)) {
            include '../../Views/adminAuth.php';
            return;
        } else {
            header('location: /');
            return;
        }
    }
}

AdminAuthController::signIn();