<?php

namespace Controllers\admin;

require_once '../../database/DatabaseMysql.php';
require_once '../../Models/admin/Panel.php';

use database\DatabaseMysql;
use Models\admin\Panel;

class PanelController {
    public static function index() {
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['type'] !== 'admin') {
            header('location: /');
        }
        $db = new DatabaseMysql;
        $connection = $db->dbConnect();
        $panel = new Panel();
        $data = $panel->index($connection);

        $users = $data['users'];
        $usersOrders = $data['usersOrders'];
        $guestOrders = $data['guestOrders'];
        include '../../Views/adminPanel.php';
    }
}

PanelController::index();