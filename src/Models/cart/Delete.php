<?php
namespace Models\cart;

class Delete {
    public static function Delete($post){
        if (isset($post['item_id'])) {
            $itemId = $post['item_id'];
            if (array_key_exists($itemId, $_SESSION['cart'])) {
                unset($_SESSION['cart'][$itemId]);
            }
            http_response_code(200);
            echo count($_SESSION['cart']);
        } else {
        http_response_code(400);
        echo 'Error deleting item from cart';
        }
    }
}