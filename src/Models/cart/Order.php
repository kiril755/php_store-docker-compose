<?php
namespace Models\cart;
session_start();

class Order {
    public static function order($post, $db) {
        if (!isset($_SESSION['user'])) {
            $name = $post['guest_name'];
            $email = $post['guest_email'];
            $itemsId = $post['item_id'];
            $delivery = $post['delivery'];
            $region = $post['region'];
            $city = $post['city'];
            $address = $post['address'];
            $house_number = $post['house_number'];

            foreach ($itemsId as $itemId) {
                $db->query("INSERT INTO `orders`(`guest_name`, `guest_email`, `item_id`, `delivery`, `region`, `city`, `address`, `house_number`) VALUES('$name', '$email', '$itemId', '$delivery', '$region', '$city', '$address', '$house_number')");
                $db->query("UPDATE `items` SET `amount` = `amount` - 1 WHERE `id` = $itemId;");
            }
            unset($_SESSION['cart']);
            header('location: /');
            return;
        }

        if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
            header('location: /');
            return;
        }

        $user = $_SESSION['user']['id'];
        $itemsId = $post['item_id'];
        $delivery = $post['delivery'];
        $region = $post['region'];
        $city = $post['city'];
        $address = $post['address'];
        $house_number = $post['house_number'];

        foreach ($itemsId as $itemId) {
            $db->query("INSERT INTO `orders`(`user_id`, `item_id`, `delivery`, `region`, `city`, `address`, `house_number`) VALUES('$user', '$itemId', '$delivery', '$region', '$city', '$address', '$house_number')");
        }
        unset($_SESSION['cart']);
        header('location: /');
        return;
    }
}