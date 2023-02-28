<?php
namespace Controllers;
session_start();


require_once '../Models/LogOut.php';

use Models\LogOut;


class LogOutController {
    public static function logOut() {
        LogOut::sessionDestroy();
        header('location: /');
    }
}

LogOutController::logOut();