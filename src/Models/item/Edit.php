<?php
namespace Models\item;

class Edit {
    public static function edit($get, $db) {
        $data = $db->query("SELECT * FROM `items` WHERE `id` = $get[id]");
        $item = $data->fetch_assoc();
        include '../../Views/editItem.php';
    }
}