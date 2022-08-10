<?php
include('html/nav01.html');
include("html/sidebar.html");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>


<style>
  .pic{
  border-radius:60%;
  display: block flow-root;
}
.main{
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  margin: auto;
  height: 50%;
  width: 50%;
  padding: 20px;
  box-shadow: 10px 10px 5px #aaaaaa;
  position: fixed;
  top: 20%;
  left: 30%;
  margin-top: -50px;
  margin-left: -50px;

}
.element{
  margin-left: 35%;
  margin-bottom: 20%;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  color: #fff;

}
</style>








</head>
<body>
<div class="main">
   <div class="element">

    <form action="user_profile.php" method="post" enctype="multipart/form-data">

            <?php
				session_start();
				include 'database.php';
				$Id= $_SESSION["Id"];
				$sql=mysqli_query($conn,"SELECT * FROM userlogin where Id='$Id' ");
				$row  = mysqli_fetch_array($sql);
            ?>
    <h2>About   <?php echo $_SESSION["Name"] ?> </h2> <br>
            <img class="pic" src="upload/<?php echo $row['File'] ?>" height="120" width="120"/> <br>

        <p><b> Name : </b> <?php echo $_SESSION["Name"] ?></p> <br>
        <p><b>Email: </b> <?php echo $_SESSION["Email"] ?></p><br>
        <p><b>Category :</b> User </p><br>



         </form>

         </div>


   </div>
</body>
</html>
