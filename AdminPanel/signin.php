<?php
include("./Components/DbComponent/DbController.php");
// require product classs 
include("./Components/DbComponent/GetClass.php");
$db = new DbController();
$get = new GetClass($db);
// print_r($get->get($table = "admin"));
print_r($get->getBy($table = "admin", $column = "userName", $info = "ag", $isstring = true)[0]['admin_password']);
// foreach ([0] as $item) {
//     print_r($item["userName"]);
// }
session_start();
print_r($_SESSION);
if (isset($_POST['loginbtn'])) {
    $name = $_POST['uname'];
    $password = $_POST['password'];

    if ($name == "" || $password == "") {
        echo "<script>alert('Please fill all the fields');</script>";
    } else {
        $dbpassword = $get->getBy($table = "admin", $column = "userName", $info = $name, $isstring = true) ? $get->getBy($table = "admin", $column = "userName", $info = $name, $isstring = true)[0]['admin_password'] : "";
        $admin_id = $get->getBy($table = "admin", $column = "userName", $info = $name, $isstring = true)? $get->getBy($table = "admin", $column = "userName", $info = $name, $isstring = true)[0]['admin_id'] : "";
        ?>
            <script>
                alert("db password <?php echo $dbpassword ?> password <?php echo $password ?>")
                alert("<?php echo $admin_id?>")
            </script>
<?php
        if ($dbpassword === $password) {
            $_SESSION['admin_id'] = $admin_id;
            header("location: ./index.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <title>admin Info</title>
</head>
<body>
    <div class="logincont">
        <h3 class="header">Login</h3>
        <hr class="headerline">
        <div class="logincontainer">
            <form action="" method="post">
                <div class="firstcol">
                    <div>
                        <label for="">User name</label>
                        <input type="text" placeholder="User name" name="uname">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input class="submitbtn loginbtn" type="submit" value="Login" name="loginbtn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>