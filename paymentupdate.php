<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$user_name = $pay_date = $pay_method = $total_pay = "";
$user_name_err = $pay_date_err = $pay_method_err = $total_pay_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["u_id"]) && !empty($_POST["u_id"])){
    // Get hidden input value
    $u_id = $_POST["u_id"];
    
    // Validate name
    $input_user_name = trim($_POST["user_name"]);
    if(empty($input_user_name)){
        $user_name_err = "Please enter a name.";
    } elseif(!filter_var($input_user_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $user_name_err = "Please enter a valid name.";
    } else{
        $user_name = $input_user_name;
    }
    
    // Validate pay_date
    $input_pay_date = trim($_POST["pay_date"]);
    if(empty($input_pay_date)){
        $pay_date_err = "Please enter an pay date.";     
    } else{
        $pay_date = $input_pay_date;
    }

     // Validate pay_method
    $input_pay_method = trim($_POST["pay_method"]);
    if(empty($input_pay_method)){
        $pay_method_err = "Please enter an pay method.";     
    } else{
        $pay_method = $input_pay_method;
    }
    
    // Validate total_pay
    $input_total_pay = trim($_POST["total_pay"]);
    if(empty($input_total_pay)){
        $total_pay_err = "Please enter the total pay amount.";     
    } elseif(!ctype_digit($input_total_pay)){
        $total_pay_err = "Please enter a positive integer value.";
    } else{
        $total_pay = $input_total_pay;
    }
    
    // Check input errors before inserting in database
     if(empty($user_name_err) && empty($pay_date_err) && empty($pay_method_err) && empty($total_pay_err)){
        // Prepare an update statement
        $sql = "UPDATE userpayment SET user_name=?, pay_date=?, pay_method=?, total_pay=? WHERE u_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_user_name, $param_pay_date, $param_pay_method, $param_total_pay, $param_u_id);
            
            // Set parameters
            $param_user_name = $user_name;
            $param_pay_date = $pay_date;
            $param_pay_method = $pay_method;
            $param_total_pay = $total_pay;
            $param_u_id = $u_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: paymenttable.php");
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
    if(isset($_GET["u_id"]) && !empty(trim($_GET["u_id"]))){
        // Get URL parameter
        $u_id =  trim($_GET["u_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM userpayment WHERE u_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_u_id);
            
            // Set parameters
            $param_u_id = $u_id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: paymenterror.php");
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
        header("location: paymenterror.php");
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
                    <h2 class="mt-5">Update Payment Record</h2>
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user_name" class="form-control <?php echo (!empty($user_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $user_name; ?>">
                            <span class="invalid-feedback"><?php echo $user_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Payment Date</label>
                            <textarea name="pay_date" class="form-control <?php echo (!empty($pay_date_err)) ? 'is-invalid' : ''; ?>"><?php echo $pay_date; ?></textarea>
                            <span class="invalid-feedback"><?php echo $pay_date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <textarea name="pay_method" class="form-control <?php echo (!empty($pay_method_err)) ? 'is-invalid' : ''; ?>"><?php echo $pay_method; ?></textarea>
                            <span class="invalid-feedback"><?php echo $pay_method_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Total Payment</label>
                            <input type="text" name="total_pay" class="form-control <?php echo (!empty($rent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total_pay; ?>">
                            <span class="invalid-feedback"><?php echo $total_pay_err;?></span>
                        </div>
                        <input type="hidden" name="u_id" value="<?php echo $u_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="paymenttable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

