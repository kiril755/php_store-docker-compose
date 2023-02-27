<?php
namespace Controllers\cart;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/cart/index.php';

use database\DatabaseMysql;
use Models\cart\Index;


class IndexController {
    public static function index() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Index::index($connection);
    }
}

IndexController::index();