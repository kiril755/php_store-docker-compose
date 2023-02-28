<?php
namespace Controllers\item;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/CreateItem.php';

use database\DatabaseMysql;
use Models\item\CreateItem;


class CreateController {
    public static function createItem() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /items.php');
            return;
        }
        if (!count($_POST)) {
            include '../../Views/createItem.php';
            return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        CreateItem::create($_POST, $connection);
        header('location: /items.php');
    }
}

CreateController::createItem();