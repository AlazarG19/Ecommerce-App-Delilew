<?php
class GetClass
{
    private $db = null;

    public function __construct($db)
    {
        if (!isset($db)) {
            return null;
        }
        $this->db = $db;
    }
    public function get($table)
    {
        $query = "SELECT * FROM {$table}";
        $result = $this->db->conn->query($query);
        $resultarray = array();
        while ($item = mysqli_fetch_array($result)) {
            $resultarray[] = $item;
        }
        return $resultarray;
    }
    public function getBy($table, $column, $info, $isstring)
    {
        if ($isstring) {
            $query = "SELECT * FROM {$table} WHERE {$column} = '{$info}'";
        } else {
            $query = "SELECT * FROM {$table} WHERE {$column}  = {$info}";
        }
        // return $query;
        $result = $this->db->conn->query($query);
        $resultarray = array();
        while ($item = mysqli_fetch_array($result)) {
            $resultarray[] = $item;
        }
        return $resultarray;
    }
}
