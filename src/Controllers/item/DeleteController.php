<?php
namespace Controllers\item;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Delete.php';

use database\DatabaseMysql;
use Models\item\Delete;

class DeleteController {
    public static function deleteItem() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Delete::delete($_GET, $connection);
    }
}

DeleteController::deleteItem();