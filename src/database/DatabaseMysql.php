<?php
namespace database;

class DatabaseMysql {
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect('mysql', 'root', 'root', 'database');
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function dbConnect() {
        return $this->connection;
    }
}