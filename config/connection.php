<?php

class dbConnect
{

    private $host = 'localhost';
    private $dbname = 'iems';
    private $username = 'root';
    private $password = '';
    private $db;

    public function dbConnection()
    {
        try {
            //connect db by pdo
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname;", $this->username, $this->password);
        } catch (PDOException $err) {
            throw $err;
            var_dump($err->getMessage());
        }
        return $this->db;
    }
}
