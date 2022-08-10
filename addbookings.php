<?php
include('Controller/navbar.php');
?><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            float:left;
            border: 5px solid white;
            width: 80%;
            height: 481px;
        }
        .lnav{
            float: left;
            border: 2px ;
            width: 20%;
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
        table tr td:last-child{
            width: 400px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="lnav">
    <?php
    include('Controller/leftnavbar.php');
    ?>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Booking Requests</h2>
                        <//a href="create.php" class="btn btn-success pull-right"><//i class="fa fa-plus"></i></a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM booking";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Booking ID</th>";
                                        echo "<th>User Name</th>";
                                        echo "<th>Vehicle Type</th>";
                                        echo "<th>Vehicle Model</th>";
                                        echo "<th>Pickup Location</th>";
                                        echo "<th>Dropoff Location</th>";
                                        echo "<th>Pickup Date</th>";
                                        echo "<th>Dropoff Date</th>";
                                        echo "<th>Rider Type</th>";
                                        echo "<th>Fare</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['u_name'] . "</td>";
                                        echo "<td>" . $row['vehicle_type'] . "</td>";
                                        echo "<td>" . $row['vehicle_model'] . "</td>";
                                        echo "<td>" . $row['pickup_location'] . "</td>";
                                        echo "<td>" . $row['dropoff_location'] . "</td>";
                                        echo "<td>" . $row['pickup_date'] . "</td>";
                                        echo "<td>" . $row['dropoff_date'] . "</td>";
                                        echo "<td>" . $row['rider_type'] . "</td>";
                                        echo "<td>" . $row['fare'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="readbookigs.php? id='. $row['id'] .'" class="mr-3" title="to confirm" data-toggle="tooltip"><span>Confirm </span></a>';
                                            
                                            echo '<a href="deletebooking.php? id='. $row['id'] .'" title="to cancel" data-toggle="tooltip"><span>Cancel </span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <div>
        <div class="bottomleft">
        <a href="admin.php" class="previous">&laquo; Go to Admin Panel</a>
        </div>
    </div>
</body>
</html>