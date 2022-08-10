<?php

$db = mysqli_connect("localhost","root","","vehicle_rentingdb");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>