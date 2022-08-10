<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
	<style type="text/css">


.lnav{
             float: left;
            border: 2px ;
            width: 20.05%;
            height: 481px;
            

        }
.wrapper{
        float:left;
        width: 57.9%;
        height: 481px;
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
  <?php
include('Controller/navbar.php');
?><br>
<div class="lnav">
    <?php
    include('Controller/leftnavbar.php');
    ?>
</div><br><br>
<div class="wrapper">
	<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Joha</option>
  <option value="2">Saify</option>
  <option value="3">Arman</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Admin info will be listed here...</b></div>

</div>

</body>
</html>
