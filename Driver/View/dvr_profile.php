<?php
include("html/nav01.html");
include("html/profile.sitebar.html");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/profile2.css">
</head>
<div class="main">
   <div class="element">

    <form action="profile.php" method="post" enctype="multipart/form-data">

            <?php
				session_start();
				include '../Model/database.php';
				$ID= $_SESSION["ID"];
				$sql=mysqli_query($conn,"SELECT * FROM driver_registration where ID='$ID' ");
				$row  = mysqli_fetch_array($sql);
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    <h2>About   <?php echo $_SESSION["Name"] ?> </h2> <br>
            <img class="pic" src="../Model/upload/<?php echo $row['File'] ?>" height="120" width="120" "/> <br>

        <p><b> Name : </b> <?php echo $_SESSION["Name"] ?></p> <br>
        <p><b>NID  : </b><?php echo $_SESSION["NID"] ?></p><br>
        <p><b>Email: </b> <?php echo $_SESSION["Email"] ?></p><br>
        <p><b>Category :</b> Driver </p><br>


         </form>

         </div>


   </div>
</body>
</html>
