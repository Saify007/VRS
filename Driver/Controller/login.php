<?php
    session_start();
    include("../View/html/nav02.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

  <style>

.body{
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
  color: #fff;
  
  

}



  </style>




</head>
<body>
    <div class="body">
      <form action="../Model/loginProcess.php" method="post" enctype="multipart/form-data">
  		<h1>Driver Login  </h1> <br>


        <span style = "padding-left: 55px">  <label>Email</label> <input type="email" name="email" placeholder="Email" size="30" >
             <br><br>
        <span style = "padding-left: 33px">  <label>Password</label> <input type="password"  name="pass" placeholder="Password" size="30" >
             <br><br>
              <span style = "padding-left: 98px"><button type="submit" name="save">Login</button>
              <br><br>
            <span style = "padding-left: 18px">  Don't have an account? <a href="register.php">Register here</a>
      </form>
    </div>


</body>
</html>
