<?php
namespace Models\cart;
session_start();

class Add {
    public static function add($post){
        if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
          header('location: /');
          return;
        }
        if (isset($_POST['item_id'])) {
        $itemId = $_POST['item_id'];
        
          // Add the item to the cart in the session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if (!isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId] = 1;
        } else {
            $_SESSION['cart'][$itemId]++;
        }
          // Return a success response to the client
        http_response_code(200);
        // echo 'Item added to cart!';
        // unset($_SESSION['cart']);
        // echo json_encode($_SESSION['cart']);
        echo count($_SESSION['cart']);

        } else {
          // Return an error response to the client
        http_response_code(400);
        echo 'Error adding item to cart';
        }
    }
}