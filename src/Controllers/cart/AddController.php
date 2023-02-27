<?php
namespace Controllers\cart;

require_once '../../Models/cart/Add.php';

use Models\cart\Add;

class AddController {
    public static function add() {
        Add::add($_POST);
    }
}

AddController::add();