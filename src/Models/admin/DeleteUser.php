<?php
namespace Models\admin;
session_start();

class DeleteUser {
    public static function delete($get, $db) {
        $userId = $get['id'];
        var_dump($_SESSION['user']['id']);
        echo $_SESSION['user']['id'];
        echo $userId;
        if ($_SESSION['user']['id'] !== $userId) {
            echo ' no;';
            // $db->query("DELETE FROM `users` WHERE `id` = '$userId'");
        }
    }
}