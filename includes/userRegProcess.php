<?php


include("../db/connect.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $fullname = $fname." ".$lname;
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
                $valid['success'] = false;
                $valid['icon'] = "error";
                $valid['title'] = "Failed";
                $valid['messages'] = $email." Already Registered!";
            }else{

                $sql = "INSERT INTO users (`name`,`email`,`password`) VALUES ('$fullname','$email','$password')";
                mysqli_query($con, $sql);

                $valid['success'] = true;
                $valid['icon'] = "success";
                $valid['title'] = "Congratulations";
                $valid['messages'] = $email." Registerd Successfully!";
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