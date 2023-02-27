<?php
namespace Models\item;



class CreateItem {
    public static function create($post, $db) {
        $name = $post['name'];
        $guest_price = (int) $post['guest_price'];
        $user_price = (int) $post['user_price'];
        $amount = (int) $post['amount'];
        $description = $post['description'];
        // var_dump($post);
        $db->query("INSERT INTO 
            `items`(`name`, `guest_price`, `user_price`, `amount`, `description`)
            VALUES ('$name', '$guest_price', '$user_price', '$amount', '$description')");
        header('location: /items.php');
    }
}