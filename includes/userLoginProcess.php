<?php

session_start();
include("../db/connect.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password); // Password Encryption....

        
        // Checking emails recurring.
        $check = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $array = mysqli_fetch_array($result);
            $_SESSION['email'] = $email;
            $valid['success'] = true;
            $valid['icon'] = "success";
            $valid['title'] = "Congratulations";
            $valid['messages'] = "Login Successfull!";
            
        }else{
            $valid['success'] = false;
            $valid['icon'] = "error";
            $valid['title'] = "Failed";
            $valid['messages'] = "Login Failed, Due to Wrong Credentials!";
        }
   
        $con->close();
        echo json_encode($valid);
}

?>