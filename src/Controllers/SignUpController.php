<?php
namespace Controllers;
session_start();

require_once '../database/DatabaseMysql.php';
require_once '../Models/SignUp.php';

use database\DatabaseMysql;
use Models\SignUp;

class SignUpController {
    public static function signUp ()  {
        if (isset($_SESSION['user'])) {
            header('location: /');
            return;
        }
        $db = new DatabaseMysql();
        $connection = $db->dbConnect();
        $anyError = SignUp::create($_POST, $connection);
        if ($anyError == true) {
            include '../Views/signUp.php';
            return;
        } else {
            header('location: /');
            return;
        }
    }
} 


SignUpController::signUp();
