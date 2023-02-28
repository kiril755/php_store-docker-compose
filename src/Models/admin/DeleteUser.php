<?php
namespace Models\admin;

class DeleteUser {
    public static function delete($get, $db) {
        $userId = $get['id'];
        $db->query("DELETE FROM `users` WHERE `id` = '$userId'");
    }
}