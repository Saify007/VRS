<?php
 include("../View/html/nav010.html");
// Check existence of id parameter before processing further
if(isset($_GET["Id"]) && !empty(trim($_GET["Id"]))){
    // Include config file
    require_once "../Model/config0.php";

    // Prepare a select statement
    $sql = "SELECT * FROM menu_table WHERE Id = ?"; // here ? is called a query string which is replaced by the id of the selected row

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_Id);

        // Set parameters
        $param_Id = trim($_GET["Id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $Vehicle = $row["Vehicle"];
                $Location = $row["SL_From"];
                $Duration = $row["SL_To"];
                $Date = $row["From_Date"];
                $salary = $row["To_Date"];
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
    <title>View Record</title>
    <style>
    .abc{
      border-top: 110px solid white;
      background-color: #00A79D;
      margin: auto;
      width: 420px;
      padding: 20px;

    }
    .mt-5 mb-3{
      text-align: center;
    }
    .ba{
      float: right;
    }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }

    </style>
</head>
<body>
  <div class="abc">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Details</h1>
                    <div class="form-group">
                        <label>Vehicle</label>
                        <p><b><?php echo $row["Vehicle"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Srart Location</label>
                        <p><b><?php echo $row["SL_From"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>End Location</label>
                        <p><b><?php echo $row["SL_To"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Srart Date</label>
                        <p><b><?php echo $row["From_Date"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>End Date</label>
                        <p><b><?php echo $row["To_Date"]; ?></b></p>
                    </div>
                    <a href="../View/dvr_ride.php" >Back</a>
                    <br>
                    <a href="../Controller/history_ride.php">Confirm</a>
                </form>
                </div>
            </div>
        </div>
    </div>
  </div>

</body>
</html>
