<?php
error_reporting(1);
$server="localhost";
$user="root";
$dbname="moviereview";
$password="";
$con=mysqli_connect($server,$user,$password,$dbname);
if($con)
{
	  // echo"connected";
}
else
{
	die(mysqli_connect_error());
}                                                                                                                                                  