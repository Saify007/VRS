<?php include('Controller/navbar.php');?><br>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .User-container{
    
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


.btn-primary{
      background: rgb(2,0,36);
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
      text-decoration: none;
      padding: 10px;
      margin: 215px;
      border-radius: 16px;
      
    }
    .btn-primary button a:hover {
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}
  </style>
</head>
<body>
  <div class="User-container">
    <form action="/action_page.php">
      <a style="color: white;" class="btn-primary" href="userproject/user_login.php" role="button">Sign In As User</a>
    </form><br><br>
    <form action="/action_page.php">
      <a style="color: white;"class="btn-primary" href="Driver/Controller/login.php" role="button">Sign In As Driver</a>
    </form><br><br>
    <form action="/action_page.php">
      <a style="color: white;"class="btn-primary" href="Login.php" role="button">Sign In As Admin</a>
    </form>
  </div>

</body>
</html>