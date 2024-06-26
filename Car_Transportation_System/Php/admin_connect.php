<?php
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = 'admin_login';

    $Connection = new mysqli($servername,$username, $password,$dbname);
    if($Connection->connect_error)
    {
        die("Connection Failed.....".$Connection->connect_error);
    }
?>