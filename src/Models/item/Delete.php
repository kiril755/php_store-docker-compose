<?php
namespace Models\item;

class Delete {
    public static function delete($get, $db) {
        $db->query("DELETE FROM `items` WHERE `id` = $get[id]"); 
    }
}