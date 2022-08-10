<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel1").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip3").click(function(){
    $("#panel3").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip4").click(function(){
    $("#panel4").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip5").click(function(){
    $("#panel5").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip6").click(function(){
    $("#panel6").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel {
  padding: 20px;
  display: none;
}
#panel1, #flip1 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel1 {
  padding: 20px;
  display: none;
}
#panel2, #flip2 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel2 {
  padding: 20px;
  display: none;
}
#panel3, #flip3 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel3 {
  padding: 20px;
  display: none;
}
#panel4, #flip4 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel4 {
  padding: 20px;
  display: none;
}
#panel5, #flip5 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel5 {
  padding: 20px;
  display: none;
}
#panel6, #flip6 {
  padding: 5px;
  
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  text-align: center;
}

#panel6 {
  padding: 20px;
  display: none;
}
.Ridenav{
        border: 5px solid white;
        
        
      }
      .center{
        width: 80%;
      }
      
      .guide-line div{
        float:left;
        border: 5px solid white;
        width: 57.9%;
        height: 481px;
        left:30px;
      }

</style>
</head>
<body >
	<div class="Ridenav">
    <?php
    include('Controller/Navbar.php');
    ?>
    </div>
 <div class="guide-line">
	<div id="flip">Click here to view step one</div>
	<div id="panel" style="background-color: #00A79D; color: white;">Sign Up if You're new here!</div><br>
	<div id="flip1">Click heere to view step Two</div>
	<div id="panel1" style="background-color: #00A79D; color: white;">Insert Your location & destination</div><br>
	<div id="flip2">Click here to view step Three</div>
	<div id="panel2"style="background-color: #00A79D; color: white;">Insert Your vehicles Pickup & Dropoff date</div><br>
	<div id="flip3">Click here to view step Four</div>
	<div id="panel3"style="background-color: #00A79D; color: white;">Select Your suitable vehicle Type & Model</div><br>
	<div id="flip4">Click here to view step Five</div>
	<div id="panel4"style="background-color: #00A79D; color: white;">Choose Your Driving Option</div><br>
	<div id="flip5">Click here to view step Six</div>
	<div id="panel5"style="background-color: #00A79D; color: white;">Get Your desired vehicle in given time & location</div><br>
	<div id="flip6">Click here to view step Seven</div>
	<div id="panel6"style="background-color: #00A79D; color: white;">Enjoy Your Ride :)</div><br>
</div>

</body>
</html>
