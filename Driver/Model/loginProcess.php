<?php
include("../View/html/nav02.html");
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include '../Model/database.php';
    $sql=mysqli_query($conn,"SELECT * FROM driver_registration where Email='$email' and Password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["Name"]=$row['Name'];
        $_SESSION["NID"]=$row['NID'];
        header("Location:../View/dvr_profile.php");
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
