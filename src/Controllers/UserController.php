<?php
namespace src\controllers\UserController;

use src\controllers\UserController\UserController as UserControllerUserController;
// use src\database;

class UserController {
    public function signIn (){
        // $db = new database\Database();

        $post = $_POST;
        // return var_dump($post);
        return header("Location: /");
    }
}

$new = new UserController();

$new->signIn();