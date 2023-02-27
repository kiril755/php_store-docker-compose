<?php
namespace Controllers;
session_start();

class LogOutController {
    public static function logOut() {
        session_destroy();
        header('location: /');
    }
}

LogOutController::logOut();