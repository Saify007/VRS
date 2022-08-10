<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$v_type = $product = $price = "";
$v_type_err = $product_err = $price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate v_type
    $input_v_type = trim($_POST["v_type"]);
    if(empty($input_v_type)){
        $v_type_err = "Please enter a v_type.";
    } elseif(!filter_var($input_v_type, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $v_type_err = "Please enter a valid v_type.";
    } else{
        $v_type = $input_v_type;
    }
    
     // Validate product
    $input_product = trim($_POST["product"]);
    if(empty($input_product)){
        $product_err = "Please enter an product.";     
    } else{
        $product = $input_product;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the rent amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Check input errors before inserting in database
    if(empty($v_type_err) && empty($product_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO vehiclemaintain (v_type, product, price) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_v_type, $param_product, $param_price);
            
            // Set parameters
            
            $param_v_type = $v_type;
            $param_product = $product;
            $param_price = $price;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: maintaintable.php");
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
                    <h2 class="mt-5">Add New Product</h2>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <textarea name="v_type" class="form-control <?php echo (!empty($v_type_err)) ? 'is-invalid' : ''; ?>"><?php echo $v_type; ?></textarea>
                            <span class="invalid-feedback"><?php echo $v_type_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product</label>
                            <textarea name="product" class="form-control <?php echo (!empty($product_err)) ? 'is-invalid' : ''; ?>"><?php echo $product; ?></textarea>
                            <span class="invalid-feedback"><?php echo $product_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-info" value="Add">
                        <a href="maintaintable.php" class="btn btn-secondary ml-2">Cancel</a>
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