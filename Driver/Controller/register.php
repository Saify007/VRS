<?php
  require("../View/html/nav03.html");

   ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
    
    <script>
    function validateForm() {
    let Name = document.forms["myForm"]["Name"].value;
    if (Name == "") {
    alert("Name must be filled out");
    return false;
    }

    let NID = document.forms["myForm"]["NID"].value;
    if (NID == "") {
    alert("NID must be filled out");
    return false;
    }

    let email = document.forms["myForm"]["email"].value;
    if (email == "") {
    alert("email must be filled out");
    return false;
    }

    let Pass = document.forms["myForm"]["Password"].value;
    if (Pass == "") {
    alert("Password must be filled out");
    return false;
    }

 }
</script>
  </head>
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
  color: #fff;
  

}

  </style>


        <div class="body">
          <form name="myForm" action="../Model/register_a.php" method="post" enctype="multipart/form-data"  onsubmit="return validateForm()">
      		<h2>Create Account</h2>
          <br>
      		<span style = "padding-left: 82px">	<label>Name</label>	<input type="text"  name="Name" placeholder="Name"> </span>
              <br> <br>
      		  <span style = "padding-left: 91px"> <label>NID </label> <input type="text" name="NID" placeholder="NID Number"></span>
              <br> <br>
        <span style = "padding-left: 81px">  <label>Email</label>    <input type="email"  name="email" placeholder="Email" ></span>
              <br><br>
        <span style = "padding-left: 58px">  <label>Password</label>    <input type="password"  name="pass" placeholder="Password"></span>
              <br><br>
        <span style = "padding-left: 0px">  <label>Confirm Password</label>    <input type="password" name="cpass" placeholder="Confirm Password">
              <br><br>
      <span style = "padding-left: 74px">  <label>Picture</label>      <input type="file" name="file">
              <br><br>
      			 <span style = "padding-left: 40px"> <label><input type="checkbox"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
              <br><br>
              <span style = "padding-left: 124px"><button type="submit" name="save" >Register Now</button>
              <br><br>
            <span style = "padding-left: 50px">  Already have an account? <a href="login.php">Log In</a>
          </form>
        </div>

  </body>
  </html>
