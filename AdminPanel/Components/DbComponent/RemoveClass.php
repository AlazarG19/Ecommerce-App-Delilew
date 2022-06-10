<?php
class RemoveClass
{
    private $db = null;

    public function __construct($db)
    {
        if (!isset($db)) {
            return null;
        }
        $this->db = $db;
    }
    public function remove($table,$columns,$info,$isstring){
        if ($isstring) {
            $query = "DELETE FROM {$table} WHERE {$columns} = '{$info}'";
        } else {
            $query = "DELETE FROM {$table} WHERE {$columns}  = {$info}";
        }
        $this->db->conn->query($query);
    }
    public function removeSeller($table,$columns){
        $query = "DELETE FROM {$table} WHERE seller_id = {$columns}";
        $result = $this->db->conn->query($query);
        if($result){
            header("Location: ./Sellers.php");
            return $result;
        }
    }
}
