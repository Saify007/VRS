<?php include('Controller/navbar.php');?><br>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		#yamaha{
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			margin: auto;
  			height: 38%;
 			width: 25%;
			padding: 20px;
     		box-shadow: 10px 10px 5px #aaaaaa;
  			position: absolute;
 			top: 25%;
  			left: 15%;
  			margin-top: -50px;
  			margin-left: -50px;
			color: white;
			background-color: #e5e5e5;
			text-align: center;
		}
		#honda{
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			margin: auto;
  			height: 38%;
 			width: 25%;
			padding: 20px;
     		box-shadow: 10px 10px 5px #aaaaaa;
  			position: absolute;
 			top: 25%;
  			left: 65%;
  			margin-top: -50px;
  			margin-left: -50px;
			color: white;
			background-color: #e5e5e5;
			text-align: center;
		}
		#suzuki{
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			margin: auto;
  			height: 35%;
 			width: 30%;
			padding: 20px;
     		box-shadow: 10px 10px 5px #aaaaaa;
  			position: absolute;
 			top: 68%;
  			left: 35%;
  			margin-top: -50px;
  			margin-left: -50px;
			color: white;
			background-color: #e5e5e5;
			text-align: center;
		}
		.bike-container{
			display: grid;
			grid-template-columns: 1fr 1fr;
		}
		
		button{
			text-align: center;
			margin: auto;
			display: flex;
		}
	</style>
	<button id="button2">Tap to see Motobike Models</button><br><br>
	<div class="bike-container">
	<div id="yamaha"style="display:none;">
	<img src="images/MicrosoftTeams-image (17).png" height="200" width="300"><br>
	 <label><b>Model:</b></label> 
	Yamaha R15 V3<br>
	 <label><b>Fuel Type:</b></label>  
		Octane<br>

	<label><b>Engine:</b></label>	 
	155 CC<br>

	<label><b>Rent:</b></label> 
	3500 per day
	</div>
	<div id="honda"style="display:none;">
	<img src="images/MicrosoftTeams-image (18).png" height="200" width="300"><br>
	<label><b>Model:</b></label> 
	Honda Exmotion<br>
	 <label><b>Fuel Type:</b></label>  
		Octane<br>

	<label><b>Engine:</b></label>	 
	150 CC<br>

	<label><b>Rent:</b></label> 
	3,700 per day
	</div>
	<div id="suzuki"style="display:none;">
	<img src="images/MicrosoftTeams-image (19).png"height="200" width="300"><br>
	<label><b>Model:</b></label> 
	Suzuki GSXR<br>
	 <label><b>Fuel Type:</b></label>  
		Octane<br>

	<label><b>Engine:</b></label>	 
	 150 CC<br>

	<label><b>Rent:</b></label> 
	3,000 per day
	</div>
</div><br><br>

<script>
	$("#button2").click(function(){

			    //$("#div1").______; wirte correct code to fadein in 3000 milisecond (8)
			    $("#yamaha").fadeIn(3000);

			    //_______.fadeIn(slow); wirte correct selector to fadein slow for the div with id div2 (9)
				$("#honda").fadeIn("slow");
				//_______.fadeIn(slow); wirte correct selector to fadein slow for the div with id div2 (9)
				$("#suzuki").fadeIn("slow");
			  });
</script>
</body>
</html>