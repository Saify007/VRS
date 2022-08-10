<?php
include("../View/html/nav01.html");
include("../View/html/profile.sitebar.html");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .pic{
      border-radius:60%;
      display:block;
    }
    .main{
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
    .element{
      margin-left: 20%;
    }
    .upload{
    margin-left: 10%;
    }
    </style>
  </head>
  <body>
    <div class="main">
       <div class="element">

        <form action="dvr_profile.php" method="post" enctype="multipart/form-data">

                
            <img class="pic" src="upload/<?php echo $row['File'] ?>" height="130" width="130" "/> <br>
          </div>
          <div class="upload">
            <br><br>
              <p> <b>Select new pic: </b><input type="file" name="file"> </p>
              <br><br>
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Submit</button>

          </div>

       </div>


  </body>
</html>
