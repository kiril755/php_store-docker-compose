<?php
namespace Controllers\cart;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/cart/index.php';

use database\DatabaseMysql;
use Models\cart\Index;

class IndexController {
    public static function index() {
        if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
          header('location: /');
          return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        $result = Index::index($connection);
        if (count($result) == 1) {
            $items = $result[0];
        } else {
            $items = $result[1];
            $empty = $result[0];
        }
        include '../../Views/cart.php';
    }
}

IndexController::index();