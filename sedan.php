<?php include('Controller/navbar.php');?><br>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#premio{

			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			margin: auto;
  			height: 40%;
 			width: 30%;
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
		#mitsubishi{
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			margin: auto;
  			height: 40%;
 			width: 30%;
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
		.sedan-container{
			display: grid;
			grid-template-columns: 1fr 1fr;
		}
		footer {
   			padding: 30px;
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			color: white;
  			height: 100%;
  			width: 100%;
		}

		button{
			text-align: center;
			margin: auto;
			display: flex;
		}
		body{
			padding: 30px;
			background: rgb(2,0,36);
  			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
			height: 100%;
  			width: 100%;
		}
		
	</style>
</head>
<body>
	<button id="button2">Tap to see Sedan Models</button><br><br>
	<div class="sedan-container">
	<div id="premio"style="display:none;">
	<img src="images/MicrosoftTeams-image (14).png"height="200" width="300"><br>
	 <label><b>Model:</b></label> 
	Toyota Premio<br>
	 <label><b>Fuel Type:</b></label>  
		 Petrol<br>

	<label><b>Engine:</b></label>	 
	 1600 CC<br>

	<label><b>Rent:</b></label> 
	 7,000 per day
	</div>
	<div id="mitsubishi"style="display:none;">
	<img src="images/MicrosoftTeams-image (15).png"height="200" width="300"><br>
	<label><b>Model:</b></label> 
	Mitsubishi Lancer<br>
	 <label><b>Fuel Type:</b></label>  
		Petrol<br>

	<label><b>Engine:</b></label>	 
	1800 CC<br>

	<label><b>Rent:</b></label> 
	  7,500 per day
	</div>
	

</div><br><br>


<script>
	$("#button2").click(function(){

			    //$("#div1").______; wirte correct code to fadein in 3000 milisecond (8)
			    $("#premio").fadeIn(3000);

			    //_______.fadeIn(slow); wirte correct selector to fadein slow for the div with id div2 (9)
				$("#mitsubishi").fadeIn("slow");
				
			  });
</script>
</body>
</html>