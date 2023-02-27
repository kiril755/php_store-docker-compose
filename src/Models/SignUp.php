<?php
namespace Models;
session_start();

class SignUp {
    public static function create($post, $db) {
        $names = $db->query('SELECT `name` FROM users');
        $emails = $db->query('SELECT `email` FROM users');
        $anyError = false;
        if (mysqli_num_rows($names) && mysqli_num_rows($emails)) {
            $names = mysqli_fetch_array($names);
            $emails = mysqli_fetch_array($emails);
            foreach ($names as $name) {
                if ($post['name'] == $name) {
                    $_POST['name_error'] = 'this name is in use!';
                    $anyError = true;
                    break;
                }
            }
            foreach ($emails as $email) {
                if ($post['email'] == $email) {
                    $_POST['email_error'] = 'this email already exist!';
                    $anyError = true;
                    break;
                }
            }
        }
        if ($anyError) {
            include '../Views/signUp.php';
            return;
        }
        $password = md5($post['password']);

        $db->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES('$post[name]', '$post[email]', '$password')");
        $newUser = $db->query("SELECT * FROM `users` WHERE `email` = '$post[email]' AND `password` = '$password'")->fetch_assoc();

        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        $_SESSION['user'] = [
            'id' => $newUser['id'],
            'name' => $newUser['name'],
            'type' => 'user',
        ];
        $_SESSION['welcome'] = "Welcome $post[name]!";
        header('location: /');
    }
}