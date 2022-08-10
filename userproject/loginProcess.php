<?php
session_start();
include("html/nav02.html");
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM userlogin where Email='$email' and Password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["Id"] = $row['Id'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["Password"]=$row['Password'];
        $_SESSION["Name"]=$row['Name'];
        header("Location: Homepage.php");
    }
    else
    {
        function function_alert($message) {
        echo "<script>alert('$message');</script>";
    }
        function_alert("Invalid Email ID/Password");
        exit;
    }
}
?>
