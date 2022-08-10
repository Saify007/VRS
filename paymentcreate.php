<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$user_name = $pay_date = $pay_method = $total_pay = "";
$user_name_err = $pay_date_err = $pay_method_err = $total_pay_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        // Prepare an insert statement
        $sql = "INSERT INTO userpayment (user_name, pay_date, pay_method, total_pay) VALUES (?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_user_name, $param_pay_date, $param_pay_method, $param_total_pay);
            
            // Set parameters
            $param_user_name = $user_name;
            $param_pay_date = $pay_date;
            $param_pay_method = $pay_method;
            $param_total_pay = $total_pay;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      .center{
        width: 99%;
      }
      .lnav{
             float: left;
            border: 2px ;
            width: 20.05%;
            height: 481px;

        }
      .wrapper{
        float:left;
        border: 5px solid white;
        width: 57.9%;
        height: 481px;
        

      }
         .bottomleft {
            position: absolute;
            bottom: 8px;
            left: 16px;
            font-size: 18px;
            color: black;
        }
        .previous {
            background-color: #f1f1f1;
            color: black;
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
                    <h2 class="mt-5">Add Payment List</h2>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <input type="text" name="total_pay" class="form-control <?php echo (!empty($total_pay_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total_pay; ?>">
                            <span class="invalid-feedback"><?php echo $total_pay_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-info" value="Add">
                        <a href="paymenttable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <div class="bottomleft">
        <a href="admin.php" class="previous">&laquo; Go to Admin Panel</a>
    </div>
</body>
</html>