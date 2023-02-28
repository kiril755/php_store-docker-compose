<?php
namespace Models\cart;

class Order {
    public static function order($post, $db) {
        if (!isset($_SESSION['user'])) {
            $name = htmlspecialchars($post['guest_name']);
            $email = htmlspecialchars($post['guest_email']);
            $itemsId = $post['item_id'];
            $delivery = htmlspecialchars($post['delivery']);
            $region = htmlspecialchars($post['region']);
            $city = htmlspecialchars($post['city']);
            $address = htmlspecialchars($post['address']);
            $house_number = $post['house_number'];
            foreach ($itemsId as $itemId) {
                $db->query("INSERT INTO `orders`(`user_id`, `guest_name`, `guest_email`, `item_id`, `delivery`, `region`, `city`, `address`, `house_number`) VALUES(0, '$name', '$email', '$itemId', '$delivery', '$region', '$city', '$address', '$house_number')");
                $db->query("UPDATE `items` SET `amount` = `amount` - 1 WHERE `id` = $itemId;");
            }
            unset($_SESSION['cart']);
            return;
        }

        $user = $_SESSION['user']['id'];
        $itemsId = $post['item_id'];
        $delivery = htmlspecialchars($post['delivery']);
        $region = htmlspecialchars($post['region']);
        $city = htmlspecialchars($post['city']);
        $address = htmlspecialchars($post['address']);
        $house_number = $post['house_number'];

        foreach ($itemsId as $itemId) {
            $db->query("INSERT INTO `orders`(`user_id`, `item_id`, `delivery`, `region`, `city`, `address`, `house_number`) VALUES('$user', '$itemId', '$delivery', '$region', '$city', '$address', '$house_number')");
            $db->query("UPDATE `items` SET `amount` = `amount` - 1 WHERE `id` = $itemId;");
        }
        unset($_SESSION['cart']);
        return;
    }
}