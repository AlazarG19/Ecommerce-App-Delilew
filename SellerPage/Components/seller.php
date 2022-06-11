<?php
include '../db.php';
if (isset($_POST['registerbtn'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $userName = $_POST['uname'];
    $password = $_POST['password'];
    if ($firstName == "" || $lastName == "" || $userName == "" || $password == "") {
        echo "<script>alert('Please fill all the fields');</script>";
    } else {
        $sql2 = "SELECT userName from seller WHERE userName = 'abebe1';";
        $result = mysqli_query($conn, $sql2);
        $resultCheck = mysqli_num_rows($result);
        $check = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['userName'] == "abebe1") {
                $check = true;

?>
                <script>
                    alert("user name already used")
                </script>
            <?php
                break;
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
        if ($check == false) {

            $sql = "INSERT INTO seller(firstName, lastName, userName, seller_password) VALUES ('$firstName',
                '$lastName', '$userName', '$password');";
            mysqli_query($conn, $sql);
            // header('location: ../index.php');
            ?>
            <script>
                alert("user registered sucessfully")
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
    <link rel="stylesheet" href="../style.css">
    <title>Seller Info</title>
</head>

<body>

    <form action="" method="post">
        <div class="cont">
            <h3 class="header">Seller info</h3>
            <hr class="headerline">
            <div class="container">
                <div class="seccol">
                    <div>
                        <label for="">First name</label>
                        <input type="text" placeholder="First name" name="fname">
                    </div>
                    <div>
                        <label for="">Last name</label>
                        <input type="text" placeholder="Last name" name="lname">
                    </div>
                    <div>
                        <label for="">User name</label>
                        <input type="text" placeholder="User name" name="uname">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                </div>
            </div>
            <input class="submitbtn" type="submit" value="Register" name="registerbtn" id="registerbtn">

        </div>
    </form>
</body>

</html>