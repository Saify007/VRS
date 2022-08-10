<?php
// Check existence of id parameter before processing further
if(isset($_GET["u_id"]) && !empty(trim($_GET["u_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM userpayment WHERE u_id = ?"; // here ? is called a query string which is replaced by the id of the selected row
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_u_id);
        
        // Set parameters
        $param_u_id = trim($_GET["u_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $user_name = $row["user_name"];
                $pay_date = $row["pay_date"];
                $pay_method = $row["pay_method"];
                $total_pay = $row["total_pay"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
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
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
                    <h1 class="mt-5 mb-3">View Payment List</h1>
                    <div class="form-group">
                        <label>User Name</label>
                        <p><b><?php echo $row["user_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Payment Date</label>
                        <p><b><?php echo $row["pay_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Payment Method</label>
                        <p><b><?php echo $row["pay_method"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Total Payment</label>
                        <p><b><?php echo $row["total_pay"]; ?></b></p>
                    </div>
                    <p><a href="paymenttable.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>