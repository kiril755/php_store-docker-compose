<?php
namespace Controllers\admin;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/admin/DeleteUser.php';

use database\DatabaseMysql;
use Models\admin\DeleteUser;

class DeleteUserController {
    public static function delete() {
        if (isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /');
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        DeleteUser::delete($_GET, $connection);
        // header('location: /admin-panel');
    }
}

DeleteUserController::delete();