<?php
namespace Models\cart;

session_start();

class Index {
    public static function index($db) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $cartItemsId = array_keys($_SESSION['cart']);
        $items = array();

        if (!count($_SESSION['cart'])) {
            $empty = 'Your cart is empty :(';
            include '../../Views/cart.php';
            return;
        }

        foreach ($cartItemsId as $cartItemId) {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['type'] == 'user') {
                    $data = $db->query("SELECT `id`, `name`, `user_price` AS 'price', `amount`, `description` FROM `items` WHERE `id` = $cartItemId");
                    if (mysqli_num_rows($data)) {
                        array_push($items, $data->fetch_assoc());
                    }
                }
            } else {
                $data = $db->query("SELECT `id`, `name`, `guest_price` AS 'price', `amount`, `description` FROM `items` WHERE `id` = $cartItemId");
                if (mysqli_num_rows($data)) {
                    array_push($items, $data->fetch_assoc());
                }
            }
        }
        if (!count($items)) {
            $empty = 'Our store is empty :(';
        }
        include '../../Views/cart.php';
    }
}