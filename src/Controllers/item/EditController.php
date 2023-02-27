<?php
namespace Controllers\item;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/item/Edit.php';

use database\DatabaseMysql;
use Models\item\Edit;

class EditController {
    public static function editItem() {
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        Edit::edit($_GET, $connection);
    }
}

EditController::editItem();