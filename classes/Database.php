<?php 
session_start();
class Database{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $db_name = 'sns';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db_name);

        if($this->conn->connect_error){
            die('error connection'.$this->conn->connect_error);
        }else{
            return $this->conn;
        }

    }
    
}



?>