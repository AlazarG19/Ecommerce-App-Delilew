<?php
class ProductClass {
    public $db = null;
    public function __construct(DBController $db) {
        if(!isset($db->conn)){
            return null;
        }
        $this->db = $db;
    }
    // fetch product data using get data method 
    public function getData($table = "product"){
        $result = $this->db->conn->query("SELECT * FROM {$table}");
        $resultarray = array();

        // fetch products one by one 
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultarray[] = $item;
        }
        return $resultarray;
    }
    // get product using item id 
    public function getProduct($item_id = null,$table = "product"){
        if(isset($item_id)){
            $result = $this->db->conn->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");
            $resultarray = array();
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultarray[] = $item;
            }
            return $resultarray;
        }
    }
}