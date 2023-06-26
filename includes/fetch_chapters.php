<?php

    include("../db/connect.php");

    $chapters = array();

    $classId = $_POST['classId'];
    $subjectId = $_POST['subjectId'];
    $sql = "SELECT DISTINCT `chapter` FROM `questions` WHERE `classId`='$classId' AND `subjectId`='$subjectId' ORDER BY `chapter` ASC";
    $result = $con->query($sql);
    while($row = mysqli_fetch_array($result)){
        array_push($chapters,$row['chapter']);
    }
    
    $con->close();
    
    echo json_encode($chapters);


?>