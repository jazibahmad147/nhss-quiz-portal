<?php

include("../db/connect.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $subjectId = $_POST['subjectId'];
        $classId = $_POST['classId'];
        $chapter = $_POST['chapter'];
        $topic = $_POST['topic'];
        $question = $_POST['question'];
        $userEmail = $_POST['userEmail'];
        // getting user ID
        $query = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$userEmail'");
        $result = mysqli_fetch_array($query);
        $userId = $result['id'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];
        if($type == "MCQ"){
            $opt1 = $_POST['opt1'];
            $opt2 = $_POST['opt2'];
            $opt3 = $_POST['opt3'];
            $opt4 = $_POST['opt4'];
            $sql = "INSERT INTO `questions` (`classId`,`subjectId`,`chapter`,`topic`,`question`,`type`,`priority`,`userId`,`opt1`,`opt2`,`opt3`,`opt4`) 
                        VALUES ('$classId','$subjectId','$chapter','$topic','$question','$type','$priority','$userId','$opt1','$opt2','$opt3','$opt4')";
        }else{
            $sql = "INSERT INTO `questions` (`classId`,`subjectId`,`chapter`,`topic`,`question`,`type`,`priority`,`userId`) 
                            VALUES ('$classId','$subjectId','$chapter','$topic','$question','$type','$priority','$userId')";
        }
        mysqli_query($con, $sql);
        

        $valid['success'] = true;
        $valid['icon'] = "success";
        $valid['title'] = "Congratulations";
        $valid['messages'] = "Record Registerd Successfully! ";
        

        
    $con->close();
    echo json_encode($valid);


}

?>