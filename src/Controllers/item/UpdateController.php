<?php
namespace Controllers\item;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Update.php';

use database\DatabaseMysql;
use Models\item\Update;

class UpdateController {
    public static function updateItem() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Update::update($_GET,$_POST, $connection);
    }
}

UpdateController::updateItem();