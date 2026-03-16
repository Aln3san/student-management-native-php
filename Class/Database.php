<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'school_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function __construct()
    {
        $this->conn = null;
        try {
            // Use PDO Because it was best and secure
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

            // This line is used so that if an error accurs in the SQL, it will be clearly visible to us
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Sorry There is an erorr" . $exception->getMessage();
        }
    }
}
