<?php

    include("../db/connect.php");

    $topics = array();

    $chapter = $_POST['chapter'];
    $sql = "SELECT DISTINCT `topic` FROM `questions` WHERE `chapter`='$chapter' ORDER BY `topic` ASC";
    $result = $con->query($sql);
    while($row = mysqli_fetch_array($result)){
        array_push($topics,$row['topic']);
    }
    
    $con->close();
    
    echo json_encode($topics);


?>