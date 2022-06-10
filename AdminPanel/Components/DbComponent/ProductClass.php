<?php
class ProductClass {
    public $db = null;
    public function __construct(DbController $db){
        if(!isset($db->conn)){
            return null;
        }
        $this->db = $db;
    }
    public function getAllProduct ($table = "product"){
        $query = "SELECT * FROM {$table}";
        $result = $this->db->conn->query($query);
        $resultarray = array();
        while ($item = mysqli_fetch_array($result)){
            $resultarray[] = $item;
        }
        return $resultarray ;
    }
    public function getProductById($table = "product",$item_id){
        $query = "SELECT * FROM {$table} WHERE item_id = {$item_id}";
        $result = $this->db->conn->query($query);
        $resultarray = array();
        while ($item = mysqli_fetch_array($result)){
            $resultarray[] = $item;
        }
        return $resultarray ;
    }
    public function deleteItem($table = "product",$item_id){
        $query = "DELETE FROM {$table} WHERE item_id = {$item_id}";
        $result = $this->db->conn->query($query);
        if($result){
            header("Location: ./index.php");
            return $result;
        }
    }
} 