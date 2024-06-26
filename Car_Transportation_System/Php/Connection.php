<?php
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = 'car_showroom';

    $Connection = new mysqli($servername, $username, $password, $dbname);
    if($Connection)
    {
        
       echo "";
    }else{
        die("Error".mysqli_error($Connection));
    }
?>