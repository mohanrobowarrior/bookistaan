<?php
require 'env.php';

class Config {
    private $dsn = "mysql:host=" . DB_HOST . "; dbname=" . DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASS;

    protected $conn = null;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: Server error, please try later!");
        }
    }
}

