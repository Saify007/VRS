<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$u_name = $vehicle_type = $vehicle_model = $pickup_location = $dropoff_location = $pickup_date = $dropoff_date = $rider_type = $fare = "";
$u_name_err = $vehicle_type_err = $vehicle_model_err = $pickup_location_err = $dropoff_location_err = $pickup_date_err = $dropoff_date_err = $rider_type_err = $fare_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate u_name
    $input_u_name = trim($_POST["u_name"]);
    if(empty($input_u_name)){
        $u_name_err = "Please enter a name.";
    } elseif(!filter_var($input_u_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $u_name_err = "Please enter a valid name.";
    } else{
        $u_name = $input_u_name;
    }
    
    // Validate vehicle_type
    $input_vehicle_type = trim($_POST["vehicle_type"]);
    if(empty($input_vehicle_type)){
        $vehicle_type_err = "Please enter an vehicle type.";     
    } else{
        $vehicle_type = $input_vehicle_type;
    }

    // Validate vehicle_model
    $input_vehicle_model = trim($_POST["vehicle_model"]);
    if(empty($input_vehicle_model)){
        $vehicle_model_err = "Please enter an vehicle model.";     
    } else{
        $vehicle_model = $input_vehicle_model;
    }

    // Validate pickup_location
    $input_pickup_location = trim($_POST["pickup_location"]);
    if(empty($input_pickup_location)){
        $pickup_location_err = "Please enter an pickup location.";     
    } else{
        $pickup_location = $input_pickup_location;
    }

    // Validate dropoff_location
    $input_dropoff_location = trim($_POST["dropoff_location"]);
    if(empty($input_dropoff_location)){
        $dropoff_location_err = "Please enter an dropoff location.";     
    } else{
        $dropoff_location = $input_dropoff_location;
    }
    
    // Validate pickup_date
    $input_pickup_date = trim($_POST["pickup_date"]);
    if(empty($input_pickup_date)){
        $pickup_date_err = "Please enter an pickup date.";     
    } else{
        $pickup_date = $input_pickup_date;
    }

    // Validate dropoff_date
    $input_dropoff_date = trim($_POST["dropoff_date"]);
    if(empty($input_dropoff_date)){
        $dropoff_date_err = "Please enter an dropoff date.";     
    } else{
        $dropoff_date = $input_dropoff_date;
    }

    // Validate rider_type
    $input_rider_type = trim($_POST["rider_type"]);
    if(empty($input_rider_type)){
        $rider_type_err = "Please enter an rider type.";     
    } else{
        $rider_type = $input_rider_type;
    }

    // Validate fare
    $input_fare = trim($_POST["fare"]);
    if(empty($input_fare)){
        $fare_err = "Please enter the fare amount.";     
    } elseif(!ctype_digit($input_fare)){
        $fare_err = "Please enter a positive integer value.";
    } else{
        $fare = $input_fare;
    }

    // Check input errors before inserting in database
    if(empty($u_name_err) && empty($vehicle_type_err) && empty($vehicle_model_err) && empty($pickup_location_err) && empty($dropoff_location_err) && empty($pickup_date_err) && empty($dropoff_date_err) && empty($rider_type_err)  && empty($fare_err)){
        // Prepare an update statement
        $sql = "UPDATE booking SET u_name=?, vehicle_type=?, vehicle_model=?, pickup_location=?, dropoff_location=?, pickup_date=?, dropoff_date=?, rider_type=?, fare=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssi", $param_u_name, $param_vehicle_type, $param_vehicle_model, $param_pickup_location, $param_dropoff_location, $param_pickup_date, $param_dropoff_date, $param_rider_type, $param_fare, $param_id);
            
            // Set parameters
            $param_u_name = $u_name;
            $param_vehicle_type = $vehicle_type;
            $param_vehicle_model = $vehicle_model;
            $param_pickup_location = $pickup_location;
            $param_dropoff_location = $dropoff_location;
            $param_pickup_date = $pickup_date;
            $param_dropoff_date = $dropoff_date;
            $param_rider_type = $rider_type;
            $param_fare = $fare;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: availablebookings.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM booking WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                $u_name = $row["u_name"];
                $vehicle_type = $row["vehicle_type"];
                $vehicle_model = $row["vehicle_model"];
                $pickup_location = $row["pickup_location"];
                $dropoff_location = $row["dropoff_location"];
                $pickup_date = $row["pickup_date"];
                $dropoff_date = $row["dropoff_date"];
                $rider_type = $row["rider_type"];
                $fare = $row["fare"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: bookingerror.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: bookingerror.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .lnav{
             float: left;
            border: 2px ;
            width: 20.05%;
            height: 481px;

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
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Bookings</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="u_name" class="form-control <?php echo (!empty($u_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $u_name; ?>">
                            <span class="invalid-feedback"><?php echo $u_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <textarea name="vehicle_type" class="form-control <?php echo (!empty($vehicle_type_err)) ? 'is-invalid' : ''; ?>"><?php echo $vehicle_type; ?></textarea>
                            <span class="invalid-feedback"><?php echo $vehicle_type_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Vehicle Model</label>
                            <textarea name="vehicle_model" class="form-control <?php echo (!empty($vehicle_model_err)) ? 'is-invalid' : ''; ?>"><?php echo $vehicle_model; ?></textarea>
                            <span class="invalid-feedback"><?php echo $vehicle_model_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Pickup Location</label>
                            <textarea name="pickup_location" class="form-control <?php echo (!empty($pickup_location_err)) ? 'is-invalid' : ''; ?>"><?php echo $pickup_location; ?></textarea>
                            <span class="invalid-feedback"><?php echo $pickup_location_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>dropoff Location</label>
                            <textarea name="dropoff_location" class="form-control <?php echo (!empty($dropoff_location_err)) ? 'is-invalid' : ''; ?>"><?php echo $dropoff_location; ?></textarea>
                            <span class="invalid-feedback"><?php echo $dropoff_location_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Pickup Date</label>
                            <textarea name="pickup_date" class="form-control <?php echo (!empty($pickup_date_err)) ? 'is-invalid' : ''; ?>"><?php echo $pickup_date; ?></textarea>
                            <span class="invalid-feedback"><?php echo $pickup_date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Dropoff Date</label>
                            <textarea name="dropoff_date" class="form-control <?php echo (!empty($dropoff_date_err)) ? 'is-invalid' : ''; ?>"><?php echo $dropoff_date; ?></textarea>
                            <span class="invalid-feedback"><?php echo $dropoff_date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rider Type</label>
                            <textarea name="rider_type" class="form-control <?php echo (!empty($rider_type_err)) ? 'is-invalid' : ''; ?>"><?php echo $rider_type; ?></textarea>
                            <span class="invalid-feedback"><?php echo $rider_type_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>fare</label>
                            <input type="text" name="fare" class="form-control <?php echo (!empty($fare_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fare; ?>">
                            <span class="invalid-feedback"><?php echo $fare_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="availablebookings.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

