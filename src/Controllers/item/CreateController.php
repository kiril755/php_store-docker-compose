<?php
namespace Controllers\item;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/CreateItem.php';

use database\DatabaseMysql;
use Models\item\CreateItem;

class CreateController {
    public static function createItem() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        CreateItem::create($_POST, $connection);
    }
}

CreateController::createItem();