<?php
include("../View/html/nav01.html");
include("../View/html/profile.sitebar.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .abc{

            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            margin: auto;
            height: 50%;
            width: 50%;
            padding: 20px;
            box-shadow: 10px 10px 5px #aaaaaa;
            position: fixed;
            top: 20%;
            left: 30%;
            margin-top: -50px;
            margin-left: -50px;
            color: #fff;
        }
        .wrapper{
            width: 90%;

        }
        th, td{
          border: 5px solid black;
          padding: 20px;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
  <div class="abc">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <!-- <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>-->
                    </div>
                    <?php
                    // Include config file
                    require_once "../Model/config0.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM con_order";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Serial Number</th>";
                                        echo "<th>Vehicle</th>";
                                        echo "<th>Srart Location</th>";
                                        echo "<th>End Location</th>";
                                        echo "<th>Srart Date</th>";
                                        echo "<th>End Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Vehicle'] . "</td>";
                                        echo "<td>" . $row['SL_From'] . "</td>";
                                        echo "<td>" . $row['SL_To'] . "</td>";
                                        echo "<td>" . $row['From_Date'] . "</td>";
                                        echo "<td>" . $row['To_Date'] . "</td>";

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
                        echo "Oops!! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
