<?php
namespace Models\admin;

session_start();

class Panel {
    public function index($db) {
        $userData = $db->query("SELECT `users`.`id`, `users`.`name`, `users`.`email`, `user_type`.`type` FROM `users` INNER JOIN `user_type` ON `users`.`type_id` = `user_type`.`id` WHERE `users`.`id` > 1");
        $userOrdersData = $db->query("SELECT `users`.`name`, `users`.`email`, `items`.`name` as 'item', `orders`.`delivery`, `orders`.`region`, `orders`.`city`, `orders`.`address`, `orders`.`house_number` 
            FROM `orders` INNER JOIN `users` ON `orders`.`user_id` = `users`.`id`
            INNER JOIN `items` ON `orders`.`item_id` = `items`.`id` WHERE `user_id` > 0");
        $guestOrdersData = $db->query("SELECT `orders`.`guest_name` AS 'name', `orders`.`guest_email` AS 'email', `items`.`name` as 'item', `orders`.`delivery`, `orders`.`region`, `orders`.`city`, `orders`.`address`, `orders`.`house_number` 
            FROM `orders` INNER JOIN `items` ON `orders`.`item_id` = `items`.`id` WHERE `user_id` = 0");

        $users = [];
        if (!mysqli_num_rows($userData)) {
            $users = '0 users';
        }
        while ($data = mysqli_fetch_assoc($userData)) {
            array_push($users, $data);
        }

        $usersOrders = [];
        if (!mysqli_num_rows($userOrdersData)) {
            $usersOrders = '0 users orders';
        }
        while ($data = mysqli_fetch_assoc($userOrdersData)) {
            array_push($usersOrders, $data);
        }

        $guestOrders = [];
        if (!mysqli_num_rows($guestOrdersData)) {
            $guestOrders = '0 guest orders';
        }
        while ($data = mysqli_fetch_assoc($guestOrdersData)) {
            array_push($guestOrders, $data);
        }
        

        $data = ['users' => $users, 'usersOrders' => $usersOrders, 'guestOrders' => $guestOrders];
        return $data;
    }
}