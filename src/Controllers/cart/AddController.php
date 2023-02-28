<?php
namespace Controllers\cart;
session_start();

require_once '../../Models/cart/Add.php';

use Models\cart\Add;

class AddController {
    public static function add() {
        if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
          header('location: /');
          return;
        }
        Add::add($_POST);
    }
}

AddController::add();