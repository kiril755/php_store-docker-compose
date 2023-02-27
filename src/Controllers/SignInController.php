<?php
namespace Controllers;

require_once '../database/DatabaseMysql.php';
require_once '../Models/SignIn.php';

use database\DatabaseMysql;
use Models\SignIn;

class SignInController {
    public static function signIn ()  {
        $db = new DatabaseMysql();
        $connection = $db->dbConnect();
        SignIn::login($_POST, $connection);
    }
}

SignInController::signIn();