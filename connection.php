<?php 
    // error_reporting(0); //ignore warnings
    $servername = "localhost";
    $username   =   "root";
    $password   = "";
    $dbname     = "responsiveform";

    $con    =   mysqli_connect($servername,$username,$password,$dbname);

    if($con)
    {
    //   echo "Connection successful";
    }
    else
    {
        echo "Connection failed".mysqli_connect_error();
    }
?>