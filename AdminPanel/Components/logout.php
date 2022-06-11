<?php 
session_start();
$_SESSION['admin_id'] = "";
if($_SESSION['admin_id'] == ""){
    header("location: ../signin.php");
}