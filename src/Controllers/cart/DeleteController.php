<?php
namespace Controllers\cart;

require_once '../../Models/cart/Delete.php';

use Models\cart\Delete;

class DeleteController {
    public static function delete() {
        Delete::delete($_POST);
    }
}

DeleteController::delete();