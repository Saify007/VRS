<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM booking WHERE id = ?"; // here ? is called a query string which is replaced by the id of the selected row
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: bookingerror.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                <div class="">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>User Name</label>
                        <p><b><?php echo $row["u_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <p><b><?php echo $row["vehicle_type"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Vehicle Model</label>
                        <p><b><?php echo $row["vehicle_model"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Pickup Location</label>
                        <p><b><?php echo $row["pickup_location"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Dropoff Location</label>
                        <p><b><?php echo $row["dropoff_location"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Pickup Date</label>
                        <p><b><?php echo $row["pickup_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Dropoff Date</label>
                        <p><b><?php echo $row["dropoff_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Rider Type</label>
                        <p><b><?php echo $row["rider_type"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Fare</label>
                        <p><b><?php echo $row["fare"]; ?></b></p>
                    </div>
                    <p><a href="availablebookings.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>