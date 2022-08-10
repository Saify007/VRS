<?php
include('Controller/navbar.php');
?>
<br>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
      .showinfo{
				  margin-top: 10px;
          float:right;
				  transform: translate(-50%, -50%);
      }

			@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #007bff;
}
::selection{
    color: #fff;
    background: #007bff;
}
.container{
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Poppins', sans-serif;

}
.container .mail-form{
    background: #fff;
    padding: 25px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container form .form-control{
    height: 43px;
    font-size: 15px;
}
.container .mail-form form .form-group .button{
    font-size: 17px!important;
}
.container form .textarea{
    height: 100px;
    resize: none;
}
.container .mail-form h2{
    font-size: 30px;
    font-weight: 600;
}
.container .mail-form p{
    font-size: 14px;
}

  </style>

</head>
<body>
	<?php
	include('Controller/leftnavbar.php');
	?><br>
  <div class="showinfo">


		<?php
		// Include config file
		require_once "config.php";

		// Attempt select query execution
		$sql = "SELECT * FROM userlogin";
		if($result = mysqli_query($link, $sql)){
				if(mysqli_num_rows($result) > 0){
						echo '<table class="table table-bordered table-striped">';
								echo "<thead>";
										echo "<tr>";
												echo "<th>User ID</th>";

												echo "<th>Email</th>";

										echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
								while($row = mysqli_fetch_array($result)){
										echo "<tr>";
												echo "<td>" . $row['Id'] . "</td>";
												echo "<td>" . $row['Email'] . "</td>";
										echo "</tr>";
								}
								echo "</tbody>";
						echo "</table>";
						// Free result set
						mysqli_free_result($result);
				} else{
						echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
				}
		} else{
				echo "Oops! Something went wrong. Please try again later.";
		}

		?>

  </div>

  <div class="mail">
    <<?php
        $to = "www.joha10431@gmail.com";
        $subject = "Vehicle Rental ";
        $body = "20% offer";
        $from = "From: nljoha47@gmail.com";
        if(mail($to,$subject,$body,$from)){
          echo "Mail send";
        }else{
          echo "Faild";
        }

     ?>
  </div>


	<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send Mail</h2>
                <p class="text-center">Send mail to all user</p>
                <!-- starting php code -->
                <?php
                    //first we leave this input field blank
                    $recipient = "";
                    //if user click the send button
                    if(isset($_POST['send'])){
                        //access user entered data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                       $sender = "From:nljoha47@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient) || empty($subject) || empty($message)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                            <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                            <div class="alert alert-success text-center">
                                <!--<?php echo "Your mail successfully sent to $recipient"?>  -->
																<?php echo "Your mail sent successfully" ?>
                            </div>
                           <?php
                           $recipient = "";
                           }else{
                            ?>
                            <!-- display an alert message if somehow mail can't be sent -->
                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending your mail!" ?>
                            </div>
                           <?php
                           }
                       }
                    }
                ?> <!-- end of php code -->
                <form action="mail.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="email"  placeholder="Recipients" value="<?php
											  // Include config file
											  require_once "config.php";
											  // Attempt select query execution
											  $sql = "SELECT * FROM userlogin";
											  if($result = mysqli_query($link, $sql)){
											      if(mysqli_num_rows($result) > 0){
											              while($row = mysqli_fetch_array($result)){
											                      echo $row['Email'].",";
											              }
											          // Free result set
											          mysqli_free_result($result);
											      } else{
											          echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
											      }
											  } else{
											      echo "Oops! Something went wrong. Please try again later.";
											  }

											  // Close connection
											  mysqli_close($link);
											  ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
