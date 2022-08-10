<?php
extract($_POST);
include("database.php");

$sql=mysqli_query($conn,"SELECT * FROM userlogin where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists";
	exit;
}
else(isset($_POST['save']));
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="upload/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO userlogin (Name, Email, Password, File ) VALUES ('$Name', '$email', 'md5($pass)', '$final_file')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: user_login.php?status=success");
    }
    else
    {
		echo "Error.Please try again";
	}
}

?>
