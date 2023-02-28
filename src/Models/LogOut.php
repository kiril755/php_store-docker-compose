<?php
namespace Models;

class LogOut {
    public static function sessionDestroy(){
        session_destroy();
    }
}