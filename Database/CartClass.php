<?php
class CartClass
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->conn)) {
            return null;
        }
        $this->db = $db;
    }
    public function insertintoCart($params = null, $table = "cart")
    {
        if ($this->db->conn != null) {
            if ($params != null) {
                // get table colums 
                $columns = implode(",", array_keys($params));
                $values = implode(",", array_values($params));
                // create sql query 
                $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
                // execute query
                $result = $this->db->conn->query($sql);
                return $result;
            }
        }
    }
    // to get use id and item id and insert into cart table 
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "quantity" => 1
            );
            $result = $this->insertintoCart($params);
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    public function addToCart2($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "quantity" => 1
            );
            $result = $this->insertintoCart($params);
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF'] . "?item_id=" . $itemid);
            }
            return $result;
        }
    }
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf("%.2f", $sum);
        }
    }
    // delete cart item using cart item id 
    public function deleteCartItem($itemid = null, $table = "cart")
    {
        if ($itemid != null) {

            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id = {$itemid}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    public function deleteCartItem2($itemid = null, $table = "cart")
    {
        if ($itemid != null) {

            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id = {$itemid}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF'] . "?item_id=" . $itemid);
            }
            return $result;
        }
    }
    // get item id of shopping cart list 
    public function getCartId($cartArray = null, $key = "item_id")
    {
        $cart_id = array();
        if ($cartArray != null) {
            $cart_id = array_map(
                function ($value) use ($key) {
                    return $value[$key];
                },
                $cartArray
            );
        };
        return $cart_id;
    }
    // to get the quantity
    public function getCartQuantity($cartArray = null, $item_id)
    {
        $cart_id = array();
        if ($cartArray != null) {
            $cart_id = array();
            for ($x = 0; $x < count($cartArray); $x++) {
                if ($cartArray[$x]["item_id"] == $item_id) {
                    $array = array("item_id" => $cartArray[$x]["item_id"], "quantity" => $cartArray[$x]["quantity"]);
                    array_push($cart_id, $array);
                }
            }
            if(count($cart_id) == 0){
                return 0;
            }
            return $cart_id[0]["quantity"];
        };
        return;
    }
    // increment
    public function increment($userid, $itemid)
    {
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = {$userid} AND item_id = {$itemid}";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    // decrement
    public function decrement($userid, $itemid)
    {
        $sql = "UPDATE cart SET quantity = quantity - 1 WHERE user_id = {$userid} AND item_id = {$itemid}";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    // get cart item
    public function getCartItem($userid = null, $table = "cart")
    {
        if ($userid != null) {
            $sql = "SELECT * FROM {$table} WHERE user_id = {$userid}";
            $result = $this->db->conn->query($sql);
            $resultarray = array();

            // fetch products one by one 
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultarray[] = $item;
            }
            return $resultarray;
        }
    }
}
