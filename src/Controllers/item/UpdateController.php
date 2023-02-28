<?php
namespace Controllers\item;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Update.php';

use database\DatabaseMysql;
use Models\item\Update;

class UpdateController {
    public static function updateItem() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /items.php');
            return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Update::update($_GET,$_POST, $connection);
        header('location: /items.php');
    }
}

UpdateController::updateItem();