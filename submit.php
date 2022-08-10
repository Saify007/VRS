<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="">
		.header{
        
        border: 2px ;
        width: 96.35%;
        
      }

		.left-Content{
        float: left;
        border: 2px ;
        width: 20.05%;
        height: 481px;
        

      }
      .main-Content{
        float:left;
        border: 5px solid white;
        width: 57.9%;
        height: 481px;
        }
	</style>
</head>
<body>
	<div class="header">
      <?php
    include('Controller/Navbar.php');
    ?>
    </div>
	<div class="left-Content">
    <?php
    include('Controller/leftnavbar.php');
    ?>
    </div>
    <div class="main-Content">
      <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Added a new Vehicle!</h2>
    </div>
</body>
</html>