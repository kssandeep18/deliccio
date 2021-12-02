<?php
$hostName = 'sql302.epizy.com';
$userName = 'epiz_30434377';
$password = 'sandeepkumarks';
$dbName = 'epiz_30434377_deliccio';

$con = mysqli_connect($hostName, $userName, $password);
if (!$con){
 die("Server Connection Failed" . mysqli_error($con));
}
$select_db = mysqli_select_db($con, $dbName);
if (!$select_db){
 die("Database Selection Failed" . mysqli_error($con));
}
?>