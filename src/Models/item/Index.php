<?php
namespace Models\item;
session_start();


class Index {
    public static function index($db) {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['type'] == 'user') {
                $data = $db->query("SELECT `id`, `name`, `user_price` AS 'price', `amount`, `description` FROM `items`");
            } elseif($_SESSION['user']['type'] == 'admin') {
                $data = $db->query("SELECT `id`, `name`, `user_price` AS 'price', `guest_price`, `amount`, `description` FROM `items`");
            }
        } else {
            $data = $db->query("SELECT `id`, `name`, `guest_price` AS 'price', `amount`, `description` FROM `items`");
        }
        if (!mysqli_num_rows($data)) {
            $empty = 'Our store is empty :(';
            include '../../Views/items.php';
            return;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $items = [];
        while ($itemData = mysqli_fetch_assoc($data)) {
            array_push($items, $itemData);
        }

        // echo '<pre>';
        // var_dump($_SESSION);
        // echo '</pre>';
        include '../../Views/items.php';
    }
}