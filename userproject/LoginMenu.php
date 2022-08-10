<?php include('Nav.php');?><br>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .User-container{
      background-color: #e5e5e5;
      padding: 10px;
      margin: 10px;
      border: 10px;
    }
    .btn-primary{
      background-color: #00A79D;
      color: white;
      text-decoration: none;
      padding: 10px;
      margin: 10px;
      border-radius: 16px;
    }
    .btn-primary button a:hover {
  background: #ddd;
  color: #00A79D;
}
  </style>
</head>
<body> <br> <br> <br>
  <div class="User-container">
    <form action="/action_page.php">
      <a class="btn-primary" href="user_login.php" role="button">Sign In to User</a>
    </form><br><br>
    <form action="/action_page.php">
      <a class="btn-primary" href="Login.php" role="button">Sign In to Drive</a>
    </form><br><br>
    <form action="/action_page.php">
      <a class="btn-primary" href="Login.php" role="button">Sign In to Admin</a>
    </form>
  </div>

</body>
</html>