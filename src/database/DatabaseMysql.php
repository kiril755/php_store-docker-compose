<?php
namespace database;


class DatabaseMysql {
    public function dbConnect (){
        $connection = mysqli_connect('mysql', 'root', 'root', 'database');
        return $connection;
    }

}