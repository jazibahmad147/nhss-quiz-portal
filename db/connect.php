<?php

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "nhss_quiz_management";

// Check Connection
$con = new mysqli($servername, $username, $password, $db);
if ($con->connect_error) {
    die("Error on the Connection..." . $con->connect_error);
}else{
    // echo "OK";
}


?>