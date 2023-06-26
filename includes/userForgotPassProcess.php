<?php


include("../db/connect.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $email = $_POST['email'];
        $mpin = $_POST['mpin'];
        $password = $_POST['password'];
        $password = md5($password); // Password Encryption....

        if($mpin == 3265){
            // Checking emails recurring...
            $check = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($con, $check);
            $num = mysqli_num_rows($result);

            if($num == 1){

                $sql = "UPDATE `users` SET `password`='$password' WHERE `email`='$email'";
                mysqli_query($con, $sql);

                $valid['success'] = true;
                $valid['icon'] = "success";
                $valid['title'] = "Congratulations";
                $valid['messages'] = "Your Account Password Changed Successfully!";
            }else{
                $valid['success'] = false;
                $valid['icon'] = "error";
                $valid['title'] = "Failed";
                $valid['messages'] = $email." Not Registered!";
            }
        }else{
            $valid['success'] = false;
            $valid['icon'] = "error";
            $valid['title'] = "Failed";
            $valid['messages'] = "You Entered a Wrong Master PIN Code!";
        }
        
    $con->close();
    echo json_encode($valid);


}

?>