<?php
    session_start();
    include("html/nav02.html");
?>
<html lang="en">
<head>
<meta charset="utf-8">
  

<body>
  
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
  color: white;

}

      </style>

</head>
<body>
  
      <div class="body">
      <form action="loginProcess.php" method="post" enctype="multipart/form-data">
  		<h2>Login as a User </h2> <br>

          	<input type="email" name="email" placeholder="Email" size="30" required="required">
             <br><br>
              <input type="password"  name="pass" placeholder="Password" size="30" required="required">
             <br><br>
              <button type="submit" name="save">Login</button>
              <br><br>
              Don't have an account? <a href="user_register.php">Register here</a>
      </form>
    </div>


</body>
</html>
