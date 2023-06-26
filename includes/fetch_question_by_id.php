<?php

include("../db/connect.php");

$questionId = $_POST['questionId'];

$sql = "SELECT * FROM questions WHERE id='$questionId'";
$result = $con->query($sql);
while($row = mysqli_fetch_array($result)){
    $classId = $row['classId'];
    $subjectId = $row['subjectId'];
    $userId = $row['userId'];
    // Class
    $classQuery = $con->query("SELECT * FROM classes WHERE id='$classId'");
    $classResult = mysqli_fetch_array($classQuery);
    // Subject
    $subjectQuery = $con->query("SELECT * FROM subjects WHERE id='$subjectId'");
    $subjectResult = mysqli_fetch_array($subjectQuery);
    // User
    $userQuery = $con->query("SELECT * FROM users WHERE id='$userId'");
    $userResult = mysqli_fetch_array($userQuery);

    $question_detail[] = array("id" => $row['id'],
                                "class" => $classResult['name'],
                                "subject" => $subjectResult['name'],
                                "chapter" => $row['chapter'],
                                "topic" => $row['topic'],
                                "question" => $row['question'],
                                "type" => $row['type'],
                                "priority" => $row['priority'],
                                "opt1" => $row['opt1'],
                                "opt2" => $row['opt2'],
                                "opt3" => $row['opt3'],
                                "opt4" => $row['opt4'],
                                "user" => $userResult['name'],
                                "date" => $row['date']
                            );
}

$con->close();
   
echo json_encode($question_detail);


?>