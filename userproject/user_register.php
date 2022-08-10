<?php
  include("html/nav03.html");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }
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
  color: white;
  
}
    </style>
  </head>
  <body>
        <div class="body">
          <form action="register_a.php" method="post" enctype="multipart/form-data">
      		<h2>Create Account</h2>
          <br>
      				<input type="text"  name="Name" placeholder="Name" required="required">
              <br> <br>
      		    
              <input type="email" class="form-control" name="email" placeholder="Email" required="required">
              <br><br>
              <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
              <br><br>
              
              <input type="file" name="file" required>
              <br><br>
      			
              <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
              <br><br>
              Already have an account? <a href="user_login.php">Sign in</a>
          </form>
        </div>

  </body>
  </html>
