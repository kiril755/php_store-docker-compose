<?php
namespace Controllers;

require_once '../database/DatabaseMysql.php';
require_once '../Models/SignUp.php';

use database\DatabaseMysql;
use Models\SignUp;

class SignUpController {
    public static function signUp ()  {
        $db = new DatabaseMysql();
        $connection = $db->dbConnect();
        SignUp::create($_POST, $connection);
    }
} 


SignUpController::signUp();
