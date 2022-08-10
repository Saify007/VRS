<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$modelname = $fueltype = $engine = $rent = "";
$modelname_err = $fueltype_err = $engine_err = $rent_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["modelname"]);
    if(empty($input_name)){
        $modelname_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $modelname_err = "Please enter a valid name.";
    } else{
        $modelname = $input_name;
    }
    
    // Validate fueltype
    $input_fueltype = trim($_POST["fueltype"]);
    if(empty($input_fueltype)){
        $fueltype_err = "Please enter an fueltype.";     
    } else{
        $fueltype = $input_fueltype;
    }

    // Validate engine
    $input_engine = trim($_POST["engine"]);
    if(empty($input_engine)){
        $engine_err = "Please enter an engine.";     
    } else{
        $engine = $input_engine;
    }
    
    // Validate rent
    $input_rent = trim($_POST["rent"]);
    if(empty($input_rent)){
        $rent_err = "Please enter the rent amount.";     
    } elseif(!ctype_digit($input_rent)){
        $rent_err = "Please enter a positive integer value.";
    } else{
        $rent = $input_rent;
    }
    
    // Check input errors before inserting in database
    if(empty($modelname_err) && empty($fueltype_err) && empty($engine_err) && empty($rent_err)){
        // Prepare an update statement
        $sql = "UPDATE manage_vehicle SET modelname=?, fueltype=?, engine=?, rent=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_modelname, $param_fueltype, $param_engine, $param_rent, $param_id);
            
            // Set parameters
            $param_modelname = $modelname;
            $param_fueltype = $fueltype;
            $param_engine = $engine;
            $param_rent = $rent;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: manage.php");
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
        $sql = "SELECT * FROM manage_vehicle WHERE id = ?";
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
                    $modelname = $row["modelname"];
                    $fueltype = $row["fueltype"];
                    $engine = $row["engine"];
                    $rent = $row["rent"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
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
                    <h2 class="mt-5">Update Record</h2><br>
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Model Name</label>
                            <input type="text" name="modelname" class="form-control <?php echo (!empty($modelname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $modelname; ?>">
                            <span class="invalid-feedback"><?php echo $modelname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Fuel Type</label>
                            <textarea name="fueltype" class="form-control <?php echo (!empty($fueltype_err)) ? 'is-invalid' : ''; ?>"><?php echo $fueltype; ?></textarea>
                            <span class="invalid-feedback"><?php echo $fueltype_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Engine</label>
                            <textarea name="engine" class="form-control <?php echo (!empty($engine_err)) ? 'is-invalid' : ''; ?>"><?php echo $engine; ?></textarea>
                            <span class="invalid-feedback"><?php echo $engine_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rent</label>
                            <input type="text" name="rent" class="form-control <?php echo (!empty($rent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rent; ?>">
                            <span class="invalid-feedback"><?php echo $rent_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="vehiclestable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

