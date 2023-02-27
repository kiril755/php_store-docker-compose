<?php
namespace Controllers\cart;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/cart/Order.php';

use database\DatabaseMysql;
use Models\cart\Order;

class OrderController {
    public static function order(){
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Order::order($_POST, $connection);
    }
}

OrderController::order();