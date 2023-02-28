<?php
namespace Controllers;
session_start();

require_once '../database/DatabaseMysql.php';
require_once '../Models/SignIn.php';

use database\DatabaseMysql;
use Models\SignIn;

class SignInController {
    public static function signIn ()  {
        if (isset($_SESSION['user'])) {
            header('location: /');
            return;
        }
        $db = new DatabaseMysql();
        $connection = $db->dbConnect();
        $result = SignIn::login($_POST, $connection);
        if (is_string($result)) {
            include '../Views/signIn.php';
            return;
        } else {
            header('location: /');
            return;
        }
    }
}

SignInController::signIn();