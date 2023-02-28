<?php
namespace Controllers\item;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Delete.php';

use database\DatabaseMysql;
use Models\item\Delete;

class DeleteController {
    public static function deleteItem() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /items.php');
            return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Delete::delete($_GET, $connection);
        header('location: /items.php');
    }
}

DeleteController::deleteItem();