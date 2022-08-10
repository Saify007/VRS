<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .navbar-custom{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        padding: 10px;

      }
    .logincontainer a:link, a:visited {
                  float: right;
                  padding: 6px 10px;
                  margin-top: 8px;
                  margin-right: 16px;
                  background: rgb(2,0,36);
                  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
                  font-size: 17px;
                  border: none;
                  cursor: pointer;
                  text-decoration: none;
                  border-radius: 16px;
                }
      .nav-item a{
        color: white;
      }
    </style>
</head>
<body>
 
  <nav class="navbar navbar-expand navbar navbar-custom">
  <a class="navbar-brand" href="Index.php" style="color: white;">Vehicle Rental System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Safety</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); color: blue; box-shadow: 10px 10px 5px #aaaaaa;">
          <a style="color: white;"class="dropdown-item" href="suv.php">SUV</a>
          <a style="color: white;"class="dropdown-item" href="sedan.php">Sedan</a>
          <a style="color: white;"class="dropdown-item" href="Motobike.php">Motobike</a>
          <a style="color: white;"class="dropdown-item" href="Motobike.php">Products</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Help</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); color: blue; box-shadow: 10px 10px 5px #aaaaaa;">
          <a style="color: white;" class="dropdown-item" href="contact.php">Contact</a>
          <a style="color: white;"class="dropdown-item" href="Aboutus.php">About Us</a>
          <a style="color: white;"class="dropdown-item" href="rideshare.php">Ridesharing Guideline</a>
        </div>
      </li>
      
    </ul>
    <div class="logincontainer" style="color: white;">
    <form action="/action_page.php">
      <a style="float : right; color: white;" href="Registration.php">Sign up </a>
    </form>
    <form action="/action_page.php">
      <a style="float : right; color: white;" id="login" class="fa fa-user-circle-o" href="User.php"> Log In</a>
    </form>
  </div>
  </div>
</nav>
</body>
</html>