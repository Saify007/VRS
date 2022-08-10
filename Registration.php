<?php
session_start();

	include("Model/connection.php");
	include("Model/function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email))
		{
			//save to database
			$u_id = random_num(20);
			$query = "insert into registration(u_id,user_name,email,password)values('$u_id','$user_name','$email','$password')";

			mysqli_query($con,$query);

			header("Location: Login.php");
			die;
		}
		else
		{
			echo "Please enter some valid information!";
		}
	}

$user_name = $email = $password = $c_password = '';
$user_nameE = $emailE = $passwordE = $c_passwordE = '';
$message = '';
$error = '';
$flag = 1;

if($_SERVER["REQUEST_METHOD"] == "POST")  
{  
  if (empty($_POST["user_name"])) 
  {
    $user_nameE = "Name is required";
    $flag=0;
  } 
  else 
  {
    $user_name = test_input($_POST["user_name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$user_name) || str_word_count($user_name)<2 )
    {
      $user_nameE = "Only letters, white space, period, dash allowed and minimum two words";
      $user_name="";
      $flag=0;
    }
  }
   if(empty($_POST["email"])){

        $emailE = "Email is required";

        }

        else

        {

        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $emailE = "Invalid email format. Format: example@gmail.com";}

        }
  if (empty($_POST["password"])) 
  {
    $passwordE = "Password is required";
    $flag=0;
  } 
  else 
  {
    $password = test_input($_POST["password"]);
    if (strlen($password) <= 8)
    {
      $passwordE = "Must be atleast 8 characters";
      $password="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) 
    {
      $passwordE = "Password must contain at least one of the special character (@, #, $,%)";
      $password ="";
      $flag=0;
    }
  }

  if (empty($_POST["c_password"])) 
  {
    $c_passwordE = "Password is required";
    $flag=0;
  } 
  else 
  {
    $c_password = test_input($_POST["c_password"]);
    if($c_password!=$password)
    {
      $c_passwordE = "Password dosen't match";
      $c_password="";
      $flag=0;
    }
  }
  if ($flag==1) 
  {
    if(isset($_POST["submit"]))  
    {
      if(file_exists('data.json'))  
      {  
        $current_data = file_get_contents('Data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
        'user_name'       =>     $_POST['name'],
        'email'           =>     $_POST['email'],
        'password'        =>     $_POST['password']);
          
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('Data.json', $final_data))  
        {  
          $message = "File Appended Success fully";  
        } 
      } 
      else  
      {  
        $error = 'JSON File not exits';  
      }
    }  
  }    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

?>

<?php include('Controller/navbar.php');?><br><br>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
  
 <style type="text/css">
 	#text{
 		height: 25px;
 		border-radius: 5px;
 		padding: 4px;
 		border: solid thin #aaa;
 		width: 100%;
    color: white; 
   	}
  #password{
    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }
  #c_password{
    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }
 	#button{
 		padding:10px;
 		width: 100px;
 		color: white;
 		background-color: #1E74FF;
 		border: none; 
 	}

 	#box{
 		
   
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  margin: auto;
  height: 80%;
  width: 50%;
  padding: 20px;
  box-shadow: 10px 10px 5px #aaaaaa;
  position: fixed;
  top: 20%;
  left: 30%;
  margin-top: -50px;
  margin-left: -100px;
  color: Green;

 	}
 	.error{
 		color: red;
 	}
 </style>

 <div id="box">
 	<form method="post">
 		<div style="font-size: 20px; margin: 10px; color: white">Sign Up</div>
 		<label>User Name</label>
 		<input id="text" type="text" name="user_name"><br><br>
 		<span class="error"> <?php echo $user_nameE;?></span><br><br>
 		<label>Email</label>
 		<input id="text" type="text" name="email"><br><br>
 		<span class="error"> <?php echo $emailE;?></span><br><br>
 		<label>Password</label>
 		<input id="password" type="password" name="password" onkeyup="check();" value="<?php echo $password;?>"><br><br>
 		<span class="error"> <?php echo $passwordE;?></span>
    <p id="pass"></p>
    <br><br>
 		<label>Confirm Password</label>
 		<input id="c_password" type="password" name="c_password" onkeyup="check();" value="<?php echo $c_password;?>"><br><br>
 		<span class="error"> <?php echo $c_passwordE;?></span>
    <p id="pass"></p>
    <br><br>


 	<input id="button" type="submit" name="submit" value="Sign Up"><br><br>
 		Already got an account! <a href="Login.php">Login here</a>
 	</form>
  </div>
  
 <?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";

?>
<script src="registration.js"></script>
 </body>
 </html>