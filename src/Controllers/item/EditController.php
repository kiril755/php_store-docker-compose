<?php
namespace Controllers\item;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Edit.php';

use database\DatabaseMysql;
use Models\item\Edit;

class EditController {
    public static function editItem() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /items.php');
            return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        $item = Edit::edit($_GET, $connection);
        include '../../Views/editItem.php';
    }
}

EditController::editItem();