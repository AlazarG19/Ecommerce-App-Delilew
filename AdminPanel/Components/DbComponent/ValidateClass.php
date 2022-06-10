<?php
class ValidateClass {
    private $db = null;
    public function __construct ($db){
        if (!isset($db)){
            return null;
        }
        $this->db = $db;
    }
    public function validate($table1 = "product", $table2 = "to_be_validated",$item_id){
        $query = "INSERT INTO {$table1} SELECT * FROM {$table2} WHERE item_id  = {$item_id};";
        $query.= "DELETE FROM {$table2} WHERE item_id  = {$item_id};";
        // return $query;
        $result = $this->db->conn->multi_query($query);
        if($result){
            header("Location:".$_SERVER['PHP_SELF']);
            return $result;
        }
    }
}