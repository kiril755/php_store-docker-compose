<?php
namespace Controllers\admin;
session_start();

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/admin/DeleteUser.php';

use database\DatabaseMysql;
use Models\admin\DeleteUser;

class DeleteUserController {
    public static function delete() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /');
            return;
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        DeleteUser::delete($_GET, $connection);
        header('location: /admin-panel');
    }
}

DeleteUserController::delete();