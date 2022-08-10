<?php
extract($_POST);
include("database.php");
include("../View/html/nav03.html");

$sql=mysqli_query($conn,"SELECT * FROM driver_registration where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
          function function_alert($message) {
        echo "<script>alert('$message');</script>";
      }
      function_alert("Email Id Already Exists");
      exit;
}
else(isset($_POST['save']));
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="upload/";
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO driver_registration (Name, NID, Email, Password, File ) VALUES ('$Name', '$NID', '$email', 'md5($pass)', '$final_file')";
         $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: ../Controller/login.php?status=success");
    }
    else
    {
      function function_alert1($message) {
    echo "<script>alert('$message');</script>";
  }
  function_alert1("Error.Please try again");

	}
}
?>
