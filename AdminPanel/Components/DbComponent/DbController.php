<?php
class DbController{
    // db properties
    private $host = "localhost";
    private $user = "root";
    private $database = "delilew";
    private $password = "password";
    public $conn = null;

    public function __construct(){
        $this-> conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->conn->connect_error){
            echo "Connection Error " . mysqli_connect_error();
        }
    } 
    public function __destruct()
    {
        $this->closeConnection();
    }

    public function closeConnection(){
        if($this->conn != null){
            mysqli_close($this->conn);
        }
    }
}