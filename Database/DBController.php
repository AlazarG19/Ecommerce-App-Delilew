<?php
class DBController{
    // database cnnnection properties
    private $host = "localhost";
    private $user = "root";
    private $password = "password";
    private $database = "delilew";
    public $conn  = null;
    // get the database connection
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->conn->connect_error){
            echo "Connection failed: " . mysqli_connect_error();
        }
        // echo "Connected successfully";
    }
    public function __destruct()
    {
        $this->closeConnection();
    }
    // for closing connection 
    private function closeConnection(){
        if($this->conn != null){
            mysqli_close($this->conn);
        }
    }
}
?>