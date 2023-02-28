<?php
namespace Models\cart;

class Index {
    public static function index($db) {
        $data = array();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $cartItemsId = array_keys($_SESSION['cart']);
        $items = array();

        if (!count($_SESSION['cart'])) {
            $empty = 'Your cart is empty :(';
            array_push($data, $empty, $items);
            return $data;
        }

        foreach ($cartItemsId as $cartItemId) {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['type'] == 'user') {
                    $dataDb = $db->query("SELECT `id`, `name`, `user_price` AS 'price', `amount`, `description` FROM `items` WHERE `id` = $cartItemId");
                    if (mysqli_num_rows($dataDb)) {
                        array_push($items, $dataDb->fetch_assoc());
                    }
                }
            } else {
                $dataDb = $db->query("SELECT `id`, `name`, `guest_price` AS 'price', `amount`, `description` FROM `items` WHERE `id` = $cartItemId");
                if (mysqli_num_rows($dataDb)) {
                    array_push($items, $dataDb->fetch_assoc());
                }
            }
        }
        array_push($data, $items);
        if (!count($items)) {
            $empty = 'Our store is empty :(';
            array_push($data, $empty, $items);
        }
        return $data;
    }
}