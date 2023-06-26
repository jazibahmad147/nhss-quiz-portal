<?php


include("../db/connect.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $name = $_POST['name'];

        if(!$_POST['recordId']){
            $check = "SELECT * FROM `subjects` WHERE `name`='$name'";
            $result = mysqli_query($con, $check);
            $num = mysqli_num_rows($result);
            if($num == 1){
                $valid['success'] = false;
                $valid['icon'] = "error";
                $valid['title'] = "Failed";
                $valid['messages'] = $name." Already Registerd!";
            }else{
                $sql = "INSERT INTO `subjects` (`name`) VALUES ('$name')";
                mysqli_query($con, $sql);
                $valid['success'] = true;
                $valid['icon'] = "success";
                $valid['title'] = "Congratulations";
                $valid['messages'] = $name." Registerd Successfully!";
            }
        }else{
            $id = $_POST['recordId'];
            $sql = "UPDATE `subjects` SET `name`='$name' WHERE `id`='$id'";
            mysqli_query($con, $sql);
            $valid['success'] = true;
            $valid['icon'] = "success";
            $valid['title'] = "Congratulations";
            $valid['messages'] = $name." Record Updated Successfully!";
        }

        
    $con->close();
    echo json_encode($valid);


}

?>