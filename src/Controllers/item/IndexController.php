<?php
namespace Controllers\item;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Index.php';

use database\DatabaseMysql;
use Models\item\Index;


class IndexController {
    public static function index() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        $result = Index::index($connection);
        if (is_string($result)) {
            $empty = $result;
        } else {
            $items = $result;
        }
        include '../../Views/items.php';
    }
}

IndexController::index();