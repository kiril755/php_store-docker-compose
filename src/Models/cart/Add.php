<?php
namespace Models\cart;

class Add {
    public static function add($post){
        if (isset($post['item_id'])) {
        $itemId = $post['item_id'];
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if (!isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId] = 1;
        } else {
            $_SESSION['cart'][$itemId]++;
        }

        http_response_code(200);

        echo count($_SESSION['cart']);

        } else {
        http_response_code(400);
        echo count($_SESSION['cart']);;
        }
    }
}