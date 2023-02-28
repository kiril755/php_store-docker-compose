<?php
namespace Controllers\cart;
session_start();

require_once '../../Models/cart/Delete.php';

use Models\cart\Delete;


class DeleteController {
    public static function delete() {
        if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
          header('location: /');
          return;
        }
        Delete::delete($_POST);
    }
}

DeleteController::delete();