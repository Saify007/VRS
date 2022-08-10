<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
p a:link,p a:visited {

  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  color:white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

p a:hover,p a:active {
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  color:white;
}
.list{
  list-style-type: none;
  margin: 0.0001;
  padding: 20;
  overflow: hidden;
  background-color: #00A79D;

}
.nav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-radius: 16px;
}

.nav a:hover {
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  color:white;
}
.login-container a:hover, a:active {
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  color:white;
}
.login-container a:link, a:visited {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #00A79D;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
  text-decoration: none;
  border-radius: 16px;
}


* {
  box-sizing: border-box;
}

@media only screen and (max-width:800px) {
  /* For tablets: */

  .list {
    width: 100%;
    padding: 0;
  }
}
@media only screen and (max-width:300px) {
  /* For mobile phones: */
  .list {
    width: 100%;
  }
}
</style>
</head>
<body>
  <div  style="background: rgb(2,0,36), background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%), color:white, padding:15px, position: fixed;top: 0; width: 100%, overflow: hidden;">
  <ul class="list">
  <li class="nav"><a href="Homepage.php">Home</a></li>
  <li class="nav"><a href="user_profile.php">Profile</a></li>
  <li class="nav"><a  href="post.php">Safety</a></li>
  <li class="nav"><a  href="contact.php">Contact Us</a></li>
  <li class="nav"><a  href="contact.php">Help</a></li><br>


  <li>
  <li class="nav" style="float:left;"><a  href="user_login.php">Log Out</a></li><br>
</li>
  </ul>
</div><br><br><br><br><br><br>
</body>
</html>
