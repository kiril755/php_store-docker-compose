<?php
namespace Models;
session_start();


class SignIn{
    public static function login($post, $db) {
        $email = $post['email'];
        $password = md5($post['password']);
        
        $data = $db->query("SELECT * FROM `users` WHERE `email` = '$email' AND`password` = '$password'");
        if (!mysqli_num_rows($data)) {
            $_POST['error'] = 'email or password is incorrect!';
            include '../Views/signIn.php';
            return;
        } else {
            $data = $data->fetch_assoc();
            $_SESSION['user'] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'type' => 'user',
            ];
            
            $_SESSION['welcome'] = "Welcome back $data[name]!";
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            header('location: /');
        }
    }
    public static function adminAuthorize($post, $db) {
        $email = $post['email'];
        $password = md5($post['password']);
        
        $data = $db->query("SELECT * FROM `users` WHERE `email` = '$email' AND`password` = '$password'");
        if (!mysqli_num_rows($data)) {
            $_POST['error'] = 'email or password is incorrect!';
            include '../Views/adminAuth.php';
            return;
        } 
        $data = $data = $data->fetch_assoc();

        if ((int) $data['type_id'] !== 2){
            $_POST['error'] = 'You doesnt have admin permission!';
            include '../../Views/adminAuth.php';
            return;
        } else {
            $_SESSION['user'] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'type' => 'admin',
            ];
            
            $_SESSION['welcome'] = "Welcome back admin $data[name]!";
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            header('location: /');
        }
    }
}