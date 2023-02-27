<?php
namespace Controllers\item;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Index.php';

use database\DatabaseMysql;
use Models\item\Index;

class IndexController {
    public static function index() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Index::index($connection);
    }
}

IndexController::index();