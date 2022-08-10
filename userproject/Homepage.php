<?php
include('html/nav01.html');
include "Homepagedb.php";
include ('html/sidebar.html');

$Id = $SL_From = $SL_To = $Vehicle = $From_Date = $To_Date = $Driving_Option = $Payment = "";
$Id_err = $SL_From_err = $SL_To_err = $Vehicle_err = $From_Date_err = $To_Date_err = $Driving_Option_err = $Payment_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$input_SL_From = trim($_POST["SL_From"]);
    if(empty($input_SL_From)){
        $SL_From_err = "Select Location";
    } else{
        $SL_From = $input_SL_From;
    }

	$input_SL_To = trim($_POST["SL_To"]);
    if(empty($input_SL_To)){
        $SL_To_err = "Select Destination";
    } else{
        $SL_To = $input_SL_To;
    }

	$input_Vehicle = trim($_POST["Vehicle"]);
    if(empty($input_Vehicle)){
        $Vehicle_err = "Please enter a name.";
    } elseif(!filter_var($input_Vehicle, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Vehicle_err = "Please enter a valid name.";
    } else{
        $Vehicle = $input_Vehicle;
    }

	$input_From_Date = trim($_POST["From_Date"]);
    if(empty($input_From_Date)){
        $From_Date_err = "Please enter a Date.";
    } else{
        $From_Date = $input_From_Date;
    }

	$input_To_Date = trim($_POST["To_Date"]);
    if(empty($input_To_Date)){
        $To_Date_err = "Enter a Date.";
    } else{
        $To_Date = $input_To_Date;
    }

	$input_Driving_Option = trim($_POST["Driving_Option"]);
    if(empty($input_Driving_Option)){
        $Driving_Option_err = "Enter a Date.";
    } else{
        $Driving_Option = $input_Driving_Option;
    }

	$input_Payment = trim($_POST["Payment"]);
    if(empty($input_Payment)){
        $Payment_err = "Please enter the salary amount.";
    } elseif(!ctype_digit($input_Payment)){
        $Payment_err = "Please enter a positive integer value.";
    } else{
        $Payment = $input_Payment;
    }

	$insert = mysqli_query($db,"INSERT INTO `menu_table`(`SL_From`, `SL_To`, `Vehicle`, `From_Date`, `To_Date`, `Driving_Option`, `Payment`) VALUES ('$SL_From', '$SL_To', '$Vehicle', '$From_Date', '$To_Date', '$Driving_Option', '$Payment')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        function function_alert($message) {
          echo "<script>alert('$message');</script>";
    }
        function_alert("Registration successful");
        exit;
    }
}

mysqli_close($db); // Close connection

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/HomePage.css">
	<link rel="stylesheet" href="">
    <style>
<style>


        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
		.row{
			
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            color:white;
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

		}
		.col-md-12{
			
		}

</style>
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mt-5"><span style = "padding-left: 170px">***</span></h5>
                    <p><span style = "padding-left: 170px"> Fill Up The Details </span></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

						<div class="form-group">
                            <label>Select Location(From)</label>
                            <input type="text" placeholder = "Enter Your Location" name="SL_From" class="form-control <?php echo (!empty($SL_From_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $SL_From; ?>">
                            <span class="invalid-feedback"><?php echo $SL_From_err;?></span>
                        </div>

						<br>

						<div class="form-group">
                            <span style = "padding-left: 18px"><label>Select Location(To)</label>
                            <input type = "text" placeholder = "Enter Destination" name="SL_To" class="form-control <?php echo (!empty($SL_To_err)) ? 'is-invalid' : ''; ?>" value = "<?php echo $SL_To; ?>">
                            <span class="invalid-feedback"><?php echo $SL_To_err;?></span>
                        </div>

						<br>

                        <div class="form-group">
                           <span style = "padding-left: 97px"> <label>Vehicle</label></span>
                            <input type="text" placeholder = "Car/Bike" name="Vehicle" class="form-control <?php echo (!empty($Vehicle_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Vehicle; ?>">
                            <span class="invalid-feedback"><?php echo $Vehicle_err;?></span>
                        </div>

						<br>

						<div class="form-group">
                            <span style = "padding-left: 76px"><label>From Date</label>
                            <input type="text" placeholder = "Starting Date of Journey Day" name="From_Date" class="form-control <?php echo (!empty($From_Date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $From_Date; ?>">
                            <span class="invalid-feedback"><?php echo $From_Date_err;?></span>
                        </div>

						<br>

						<div class="form-group">
                            <span style = "padding-left: 94px"><label>To Date</label>
                            <input type="text" placeholder = "End Date of Journey" name="To_Date" class="form-control <?php echo (!empty($To_Date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $To_Date; ?>">
                            <span class="invalid-feedback"><?php echo $To_Date_err;?></span>
                        </div>

						<br>

						<div class="form-group">
                            <span style = "padding-left: 47px"><label>Driving Option</label>
                            <input type="text" placeholder = "Self Drive/Hire Driver" name="Driving_Option" class="form-control <?php echo (!empty($Driving_Option_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Driving_Option; ?>">
                            <span class="invalid-feedback"><?php echo $Driving_Option_err;?></span>
                        </div>

                        <br>

						<div class="form-group">
                            <span style = "padding-left: 89px"><label>Payment</label>
                            <input type="text" placeholder = "Expected Rent(BDT)" name="Payment" class="form-control <?php echo (!empty($Payment_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Payment; ?>">
                            <span class="invalid-feedback"><?php echo $Payment_err;?></span>
                        </div>

						<br>

                        <span style = "padding-left: 175px"><input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Homepage.php" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
