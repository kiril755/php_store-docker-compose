<?php
namespace Models\item;

class CreateItem {
    public static function create($post, $db) {
        $name = htmlspecialchars($post['name']);
        $guest_price = (int) $post['guest_price'];
        $user_price = (int) $post['user_price'];
        $amount = (int) $post['amount'];
        $description = htmlspecialchars($post['description']);
        // var_dump($post);
        $db->query("INSERT INTO 
            `items`(`name`, `guest_price`, `user_price`, `amount`, `description`)
            VALUES ('$name', '$guest_price', '$user_price', '$amount', '$description')");
    }
}