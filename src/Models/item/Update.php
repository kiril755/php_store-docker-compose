<?php
namespace Models\item;



class Update {
    public static function update($get, $post, $db) {
        $name = $post['name'];
        $guest_price = (int) $post['guest_price'];
        $user_price = (int) $post['user_price'];
        $amount = (int) $post['amount'];
        $description = $post['description'];
        $db->query("UPDATE `items` SET `name` = '$name', `guest_price` = '$guest_price', `user_price` = '$user_price', `amount` = '$amount', `description` = '$description' WHERE `id` = $get[id]");
        header('location: /items.php');
    }
}