
<?php include('Controller/navbar.php');?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home</title>
 	<style>
 		p{
 			font-style: float:right;
 		}
 		footer {
   
  			padding: 60px;
  			background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  			color: white;
  			height: 100%;
  			width: 100%;
}
.main {
	align-items: center;
}
@media only screen and (max-width:800px) {
  /* For tablets: */
  .main {
    width: 80%;
    padding: 0;
  }
 }
 @media only screen and (max-width:300px) {
  /* For mobile phones: */
  .main {
    width: 100%;
  }
}
 	</style>
 </head>
 <body>
 	<div class="main">
 	
  
  <img src="images/VRS/1.jpg" style="width:100%">
</div>

  

</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<div class="text-box">
  <h2> Welcome To</h2>
  <h1> Vehicle Rental System</h1>
  <h2>Rent vehicle within a short time ...</h2>
</div>
<style>


@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@800&display=swap');


.text-box{
  color: trasparent;
  position: absolute;
  bottom: 8%;
}
.text-box p{
  font-size: 50px;
  font-weight: 500;
}
.text-box h1{
  left: 40%;
  text-align: center;
  font-family: 'Orbitron', sans-serif;
  font-size: 68px;
  background: -webkit-linear-gradient(#e66465, #9198e5);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

}
.text-box h2{

  left: 40%;

  text-align: right;
  font-size: 48px;
  background: -webkit-linear-gradient(#eee, #333);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-family: 'Orbitron', sans-serif;

}

</style>

<script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() 
    {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); 
    }
    </script>
	
	
	<style>
		
/* Slideshow container */
.slideshow-container {
  max-width: 650px;
  position: relative;
  margin: auto;
  width: 80%;
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}


/* Caption text 
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
*/
/* Number text (1/3 etc)
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}*/
/* The dots/bullets/indicators 
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 4s ease;
}
*/
.active {
background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 2.0s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

/* footer section styling */
footer{
	background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  padding:  0 50px 0 100px;
  text-align: center;
  display: block;
}
footer span a{
  text-decoration: none;
}
footer span a:hover{
  text-decoration: underline;
}
	</style>
 	<footer>
 		<?php include('footer.php');?>
</footer>
 </body>
 </html>
