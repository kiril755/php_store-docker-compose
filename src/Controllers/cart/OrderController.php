<?php
namespace Controllers\cart;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/cart/Order.php';

use database\DatabaseMysql;
use Models\cart\Order;



class OrderController {
    public static function order(){
        if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
          header('location: /');
          return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Order::order($_POST, $connection);
        header('location: /');
    }
}

OrderController::order();