<?php
session_start();
include_once "db.php";
include_once "./Components/sellerLogin.html";
if (isset($_POST['loginbtn'])) {
    $name = $_POST['uname'];
    $password = $_POST['password'];

    if ($name == "" || $password == "") {
        echo "<script>alert('Please fill all the fields');</script>";
    } else {
        $dbpassword = null;
        setcookie("name", $name);
        $sql = "SELECT seller_password FROM seller WHERE userName = '$name';";
        $result = mysqli_query($conn, $sql);
        $resultrow = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $dbpassword = $row['seller_password'];
        }
        $seller_id = null;
        $sql2 = "SELECT seller_id FROM seller WHERE userName = '$name';";
        $result2 = mysqli_query($conn, $sql2);
        $resultrow2 = mysqli_num_rows($result2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $seller_id = $row['seller_id'];
        }
        ?>
            <script>
                alert("db password <?php echo $dbpassword ?> password <?php echo $password ?>")
                alert("<?php echo $seller_id?>")
            </script>
<?php
        if ($dbpassword === $password) {
            $_SESSION['seller_id'] = $seller_id;
            if($_SESSION['seller_id'] != "" || isset($_SESSION['seller_id'])){
                header("Location: ./index.php");
            }
        } else {
?>
            <script>
                alert("wrong credentials Try again")
            </script>
<?php
        }
    }
}
?>