<?php

class Database
{
    private $password = "";
    private $username = "root";
    private $hostname = "localhost";
    private $db = "coursera";
    private $dsn;
    public $conn;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public function __construct()
    {

        $this->dsn = "mysql:host=$this->hostname;dbname=$this->db;charset=utf8";
    }

    public function getConnection()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password, $this->options);
            return $this->conn;
        } catch (PDOException $exception) {
            echo "Connection Error" . $exception->getMessage();
        }
    }
}
