<!DOCTYPE html>
<html>
  <head>
    <title>Test</title>
    <!-- <link href="vendor/online/pagedjs.js" rel="stylesheet"> -->
    <script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
      body{
        font-family: 'Roboto', sans-serif;
      }
      @page {
        size: A4;
        border: 2px double black;
        margin: 5mm 5mm 10mm 5mm;
        padding: 0mm 5mm 0mm 5mm;
        @bottom-left {
          padding: 0mm 5mm 0mm 5mm;
          color: darkgray;
          content: "NASIR HIGHER SECONDARY SCHOOL";
        }
        @bottom-right {
          padding: 0mm 5mm 0mm 5mm;
          color: darkgray;
          content: "page " counter(page) " of " counter(pages);
        }
      }
      
      .mcqs{
        text-align: left;
        border-bottom: 2px solid black;
        padding-bottom: 5mm;
      }
      .heading{
        height: 10px;
        display: grid;
        grid-template-columns: 85% auto;
      }
      hr{
        border-bottom: 1px solid black;
        border-top: 0;
        border-left: 0;
        border-right: 0;
        height: 20px;
      }
      .option{
          width: 25%;
      }
      .erqHr{
          height: 35px !important;
      }

      .head {
        display: grid;
        grid-template-columns: auto auto auto;
      }
      .erqs, .erq3, .erq6, .erq9, .erq12{
        break-before: page;
      }
    </style>
  </head>
  <body>
    
    <?php
      include("./db/connect.php");
      // variables
      $topics = array();
      $chapters = array();
      $MCQs = array();
      $lowMCQs = array();
      $moderateMCQs = array();
      $highMCQs = array();
      $lowCRQs = array();
      $moderateCRQs = array();
      $highCRQs = array();
      $lowERQs = array();
      $moderateERQs = array();
      $highERQs = array();
      $quizTitle = $_POST['quizTitle'];

      // CRQs & ERQs Quantity According To Priority 
      $priority = $_POST['priority'];
      if($priority == "Custom"){
          $countLowMCQ = $_POST['lowMCQs'];
          $countModerateMCQ = $_POST['moderateMCQs'];
          $countHighMCQ = $_POST['highMCQs'];
          $countLowCRQ = $_POST['lowCRQs'];
          $countModerateCRQ = $_POST['moderateCRQs'];
          $countHighCRQ = $_POST['highCRQs'];
          $countLowERQ = $_POST['lowERQs'];
          $countModerateERQ = $_POST['moderateERQs'];
          $countHighERQ = $_POST['highERQs'];
      }else{
          $sql = mysqli_query($con, "SELECT * FROM `priorities` WHERE `name`='$priority'");
          $result = mysqli_fetch_array($sql);
          $countLowMCQ = $result['lowMCQ'];
          $countModerateMCQ = $result['moderateMCQ'];
          $countHighMCQ = $result['highMCQ'];
          $countLowCRQ = $result['lowCRQ'];
          $countModerateCRQ = $result['moderateCRQ'];
          $countHighCRQ = $result['highCRQ'];
          $countLowERQ = $result['lowERQ'];
          $countModerateERQ = $result['moderateERQ'];
          $countHighERQ = $result['highERQ'];
      }

      // count totals
      $countMCQs = $countLowMCQ+$countModerateMCQ+$countHighMCQ;
      $countCRQs = ($countLowCRQ+$countModerateCRQ+$countHighCRQ)*2;
      $countERQs = ($countLowERQ+$countModerateERQ+$countHighERQ)*5;
      $totalPaperMarks = $countMCQs+$countCRQs+$countERQs;
      $passingMarks = round((40 * $totalPaperMarks)/100);

      // Class Name Extraction
      $classId = $_POST['classId'];
      $sql = mysqli_query($con, "SELECT * FROM `classes` WHERE `id`='$classId'");
      $result = mysqli_fetch_array($sql);
      $class = $result['name'];
      // Subject Name Extraction
      $subjectId = $_POST['subjectId'];
      $sql = mysqli_query($con, "SELECT * FROM `subjects` WHERE `id`='$subjectId'");
      $result = mysqli_fetch_array($sql);
      $subject = $result['name'];
      // Chapter extractions
      $chaptersLength = count($_POST['chapters']);
      for($i=0; $i<$chaptersLength; $i++){
          $chapter = $_POST['chapters'][$i];
          array_push($chapters,$chapter);
      }
      $chapterNumbers = implode(", ", $chapters);
      // Question Types Extractions
      $topicsLength = count($_POST['topics']);
      for($i=0; $i<$topicsLength; $i++){
        $topic = $_POST['topics'][$i];
        $sql = mysqli_query($con,"SELECT * FROM `questions` WHERE `topic`='$topic'");
        while($row = mysqli_fetch_array($sql)){
            if($row['type'] == "MCQ"){
                if($row['priority']=="High"){array_push($highMCQs,$row['id']);}
                if($row['priority']=="Moderate"){array_push($moderateMCQs,$row['id']);}
                if($row['priority']=="Low"){array_push($lowMCQs,$row['id']);}
            }
            if($row['type'] == "CRQ"){
                if($row['priority']=="High"){array_push($highCRQs,$row['id']);}
                if($row['priority']=="Moderate"){array_push($moderateCRQs,$row['id']);}
                if($row['priority']=="Low"){array_push($lowCRQs,$row['id']);}
            }
            if($row['type'] == "ERQ"){
                if($row['priority']=="High"){array_push($highERQs,$row['id']);}
                if($row['priority']=="Moderate"){array_push($moderateERQs,$row['id']);}
                if($row['priority']=="Low"){array_push($lowERQs,$row['id']);}
            }
        }
      }
    ?>
    <div class="paper">
      <div class="head" style="padding-bottom:12px; border-bottom: 2px solid black;">
        <div>
          <h3 style="width: 95%; border: 1px solid black; padding: 10px 0px 10px 5px"><?php echo $quizTitle ?></h3>
          <h4><?php echo $subject." ".$class ?></h4>
          <h5 style="">Name: ________________________________</h5>
          <h5 style="">Roll Number: ________ Section: _________</h5>
        </div>
        <div><img style="padding-top:8px;" src="./img/logo.png" width="200px" alt="LOGO"></div>
        <div>
          <h4 style="padding-top:65px">Parent Signature: ______________</h4>
          <h5 style="">Total Marks <b><?php echo $totalPaperMarks; ?></b> | Passing Marks <b><?php echo $passingMarks; ?></b></h5>
          <h5 style="">Time 35 Minutes | Date: __/__/____ </h5>
        </div> 
      </div>
      <div class="mcqs">
        <div class="heading"><h3>MCQs</h3><h3><?php echo $countMCQs; ?> Marks</h3></div>
        <table style="padding-top:35px;">
          <?php
            $selectedLowMCQs = array();
            $selectedModerateMCQs = array();
            $selectedHighMCQs = array();
            $i=0;
            for($j = 0; $j < $countLowMCQ; $j++){
                $random_key = array_rand($lowMCQs);
                $selectedLowMCQ = $lowMCQs[$random_key];
                if (!in_array($selectedLowMCQ, $selectedLowMCQs)) {
                    array_push($selectedLowMCQs, $selectedLowMCQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedLowMCQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<tr>
                                <th style="width:20px;">'.$no.'</th>
                                <th colspan="4">'.$row['question'].'</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="option">(A) '.$row['opt1'].'</td>
                                <td class="option">(B) '.$row['opt2'].'</td>
                                <td class="option">(C) '.$row['opt3'].'</td>
                                <td class="option">(D) '.$row['opt4'].'</td>
                            </tr>';
                    }
                    unset($selectedLowMCQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add moderate MCQs as priority defined.
            for($j = 0; $j < $countModerateMCQ; $j++){
                $random_key = array_rand($moderateMCQs);
                $selectedModerateMCQ = $moderateMCQs[$random_key];
                if (!in_array($selectedModerateMCQ, $selectedModerateMCQs)) {
                    array_push($selectedModerateMCQs, $selectedModerateMCQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedModerateMCQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<tr>
                                <th style="width:20px;">'.$no.'</th>
                                <th colspan="4">'.$row['question'].'</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="option">(A) '.$row['opt1'].'</td>
                                <td class="option">(B) '.$row['opt2'].'</td>
                                <td class="option">(C) '.$row['opt3'].'</td>
                                <td class="option">(D) '.$row['opt4'].'</td>
                            </tr>';
                    }
                    unset($selectedModerateMCQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add high MCQs as priority defined.
            for($j = 0; $j < $countHighMCQ; $j++){
                $random_key = array_rand($highMCQs);
                $selectedHighMCQ = $highMCQs[$random_key];
                if (!in_array($selectedHighMCQ, $selectedHighMCQs)) {
                    array_push($selectedHighMCQs, $selectedHighMCQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedHighMCQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<tr>
                                <th style="width:20px;">'.$no.'</th>
                                <th colspan="4">'.$row['question'].'</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="option">(A) '.$row['opt1'].'</td>
                                <td class="option">(B) '.$row['opt2'].'</td>
                                <td class="option">(C) '.$row['opt3'].'</td>
                                <td class="option">(D) '.$row['opt4'].'</td>
                            </tr>';
                    }
                    unset($selectedHighMCQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
          ?>
        </table>
      </div>
        <div class="crqs">
          <!-- check if mcq is 15 then place a line break after that -->
          <?php if($i==15){echo '<br><br>';} ?>
          <div class="heading"><h3>CRQs</h3><h3><?php echo $countCRQs ?> Marks</h3></div><br>
          <?php
            $selectedLowCRQs = array();
            $selectedModerateCRQs = array();
            $selectedHighCRQs = array();
            $i=0;
            for ($j=0; $j < $countLowCRQ; $j++) {
                $random_key = array_rand($lowCRQs);
                $selectedLowCRQ = $lowCRQs[$random_key];
                if (!in_array($selectedLowCRQ, $selectedLowCRQs)) {
                    array_push($selectedLowCRQs, $selectedLowCRQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedLowCRQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading crq'.$i.'">
                                <h4>'.$no.'. '.$row['question'].'</h4>
                                <h4>2 Marks</h4>
                            </div>';
                        echo '<br><hr><hr><hr>';
                    }
                    unset($selectedLowCRQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add moderate CRQs as priority defined.
            for ($j=0; $j < $countModerateCRQ; $j++) {
                $random_key = array_rand($moderateCRQs);
                $selectedModerateCRQ = $moderateCRQs[$random_key];
                if (!in_array($selectedModerateCRQ, $selectedModerateCRQs)) {
                    array_push($selectedModerateCRQs, $selectedModerateCRQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedModerateCRQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading crq'.$i.'">
                                <h4>'.$no.'. '.$row['question'].'</h4>
                                <h4>2 Marks</h4>
                            </div>';
                        echo '<br><hr><hr><hr>';
                    }
                    unset($selectedModerateCRQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add high CRQs as priority defined.
            for ($j=0; $j < $countHighCRQ; $j++) {
                $random_key = array_rand($highCRQs);
                $selectedHighCRQ = $highCRQs[$random_key];
                if (!in_array($selectedHighCRQ, $selectedHighCRQs)) {
                    array_push($selectedHighCRQs, $selectedHighCRQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedHighCRQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading crq'.$i.'">
                                <h4>'.$no.'. '.$row['question'].'</h4>
                                <h4>2 Marks</h4>
                            </div>';
                        echo '<br><hr><hr><hr>';
                    }
                    unset($selectedHighCRQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
          ?>
        </div>
        <div class="erqs">
          <div class="heading"><h3>ERQs</h3><h3><?php echo $countERQs ?> Marks</h3></div><br>
          <?php
            $selectedLowERQs = array();
            $selectedModerateERQs = array();
            $selectedHighERQs = array();
            $i = 0;
            for ($j=0; $j < $countLowERQ; $j++) {
                $random_key = array_rand($lowERQs);
                $selectedLowERQ = $lowERQs[$random_key];
                if (!in_array($selectedLowERQ, $selectedLowERQs)) {
                    array_push($selectedLowERQs, $selectedLowERQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedLowERQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading erq'.$i.'">
                                    <h4>'.$no.'. '.$row['question'].'</h4>
                                    <h4>5 Marks</h4>
                                </div>';
                        echo '<br><hr><hr><hr>
                            <hr><hr><hr><hr>
                            <hr><hr><hr><br>';
                    }
                    unset($selectedLowERQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add moderate CRQs as priority defined.
            for ($j=0; $j < $countModerateERQ; $j++) {
                $random_key = array_rand($moderateERQs);
                $selectedModerateERQ = $moderateERQs[$random_key];
                if (!in_array($selectedModerateERQ, $selectedModerateERQs)) {
                    array_push($selectedModerateERQs, $selectedModerateERQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedModerateERQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading erq'.$i.'">
                                    <h4>'.$no.'. '.$row['question'].'</h4>
                                    <h4>5 Marks</h4>
                                </div>';
                        echo '<br><hr><hr><hr>
                            <hr><hr><hr><hr>
                            <hr><hr><hr><br>';
                    }
                    unset($selectedModerateERQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            // Add high CRQs as priority defined.
            for ($j=0; $j < $countHighERQ; $j++) {
                $random_key = array_rand($highERQs);
                $selectedHighERQ = $highERQs[$random_key];
                if (!in_array($selectedHighERQ, $selectedHighERQs)) {
                    array_push($selectedHighERQs, $selectedHighERQ);
                    $query = mysqli_query($con,"SELECT * FROM `questions` WHERE id='$selectedHighERQ'");
                    $no=$i+1;
                    while($row = mysqli_fetch_array($query)){
                        echo '<div class="heading erq'.$i.'">
                                    <h4>'.$no.'. '.$row['question'].'</h4>
                                    <h4>5 Marks</h4>
                                </div>';
                        echo '<br><hr><hr><hr>
                            <hr><hr><hr><hr>
                            <hr><hr><hr><br>';
                    }
                    unset($selectedHighERQs[$random_key]);
                }else{$j--; $i--;}
                $i++;
            }
            ?>
        </div>
    </div>
  </body>
</html>
