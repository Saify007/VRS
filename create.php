<?php
include('Controller/navbar.php');
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$modelname = $fueltype = $engine = $rent = "";
$modelname_err = $fueltype_err = $engine_err = $rent_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        // Prepare an insert statement
        $sql = "INSERT INTO manage_vehicle (modelname, fueltype, engine, rent) VALUES (?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_modelname, $param_fueltype, $param_engine, $param_rent);
            
            // Set parameters
            $param_modelname = $modelname;
            $param_fueltype = $fueltype;
            $param_engine = $engine;
            $param_rent = $rent;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: submit.php");
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

      .center{
        width: 99%;
      }
      .Cnav{
        float: left;
        border: 5px solid white;
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
         .navbar-custom{
        background-color: #00A79D;
        padding: 10px;
      }
    .logincontainer a:link, a:visited {
                  float: right; 
                  font-size: 20px;
                  border: none;
                  cursor: pointer;
                  text-decoration: none;
            
                }
    </style>
</head>
<body>
    <div class="Cnav">
    <?php
    
    include('Controller/leftnavbar.php');
    ?>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Add New Vehicle</h2>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-info" value="Add">
                        <a href="create.php" class="btn btn-secondary ml-2">Cancel</a>
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