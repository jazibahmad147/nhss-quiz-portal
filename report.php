<?php 
    include("templates/header.php");
?>

<link href="vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Report -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Report</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table class="display" id="dataTable3" width="100%" cellspacing="0"> -->
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Chapters</th>
                                    <th colspan="12">Questions</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="4">MCQs</th>
                                    <th colspan="4">CRQs</th>
                                    <th colspan="4">ERQs</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th>L</th>
                                    <th>M</th>
                                    <th>H</th>
                                    <th>Total</th>
                                    <th>L</th>
                                    <th>M</th>
                                    <th>H</th>
                                    <th>Total</th>
                                    <th>L</th>
                                    <th>M</th>
                                    <th>H</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 15px">
                                <?php
                                    $x = 1;

                                    // class 
                                    $query = mysqli_query($con,"SELECT DISTINCT `classId` FROM `questions` WHERE `status`=1  ORDER BY `id` ASC");
                                    while($classes = mysqli_fetch_array($query)){
                                        $classId = $classes['classId'];
                                        $classQuery = mysqli_query($con,"SELECT * FROM classes WHERE id='$classId'");
                                        $classResult = mysqli_fetch_array($classQuery);
                                        $className = $classResult['name'];
                                        // subject
                                        $query = mysqli_query($con,"SELECT DISTINCT `subjectId` FROM `questions` WHERE `classId`=$classId AND `status`=1  ORDER BY `id` ASC");
                                        while($subjects = mysqli_fetch_array($query)){
                                            $subjectId = $subjects['subjectId'];
                                            $subjectQuery = mysqli_query($con,"SELECT * FROM subjects WHERE id='$subjectId'");
                                            $subjectResult = mysqli_fetch_array($subjectQuery);
                                            $subjectName = $subjectResult['name'];
                                            // chapters
                                            $query = mysqli_query($con,"SELECT DISTINCT `chapter`FROM `questions` WHERE `classId`=$classId AND `subjectId`=$subjectId AND `status`=1  ORDER BY `chapter` ASC");
                                            while($chapters = mysqli_fetch_array($query)){
                                                $chapterName = $chapters['chapter'];
                                                // MCQs
                                                $mcqQuery = "SELECT 
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='MCQ'  AND `priority`='low' then 1 else null end) AS lowMCQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='MCQ' AND `priority`='moderate' then 1 else null end) AS moderateMCQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='MCQ' AND `priority`='high' then 1 else null end) AS highMCQ
                                                            FROM questions;";
                                                $mcqQueryRun = mysqli_query($con,$mcqQuery);
                                                $queryResult = mysqli_fetch_assoc($mcqQueryRun);
                                                $countLowMCQs = $queryResult['lowMCQ'];
                                                $countModerateMCQs = $queryResult['moderateMCQ'];
                                                $countHighMCQs = $queryResult['highMCQ'];
                                                $totalMCQ = $countLowMCQs+$countModerateMCQs+$countHighMCQs;
                                                // CRQs
                                                $crqQuery = "SELECT 
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='CRQ'  AND `priority`='low' then 1 else null end) AS lowCRQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='CRQ' AND `priority`='moderate' then 1 else null end) AS moderateCRQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='CRQ' AND `priority`='high' then 1 else null end) AS highCRQ
                                                            FROM questions;";
                                                $crqQueryRun = mysqli_query($con,$crqQuery);
                                                $queryResult = mysqli_fetch_assoc($crqQueryRun);
                                                $countLowCRQs = $queryResult['lowCRQ'];
                                                $countModerateCRQs = $queryResult['moderateCRQ'];
                                                $countHighCRQs = $queryResult['highCRQ'];
                                                $totalCRQ = $countLowCRQs+$countModerateCRQs+$countHighCRQs;
                                                // ERQs
                                                $erqQuery = "SELECT 
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='ERQ'  AND `priority`='low' then 1 else null end) AS lowERQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='ERQ' AND `priority`='moderate' then 1 else null end) AS moderateERQ,
                                                                count(case when `chapter`=$chapterName AND `classId`=$classId AND `subjectId`=$subjectId AND `status`=1 AND type='ERQ' AND `priority`='high' then 1 else null end) AS highERQ
                                                            FROM questions;";
                                                $erqQueryRun = mysqli_query($con,$erqQuery);
                                                $queryResult = mysqli_fetch_assoc($erqQueryRun);
                                                $countLowERQs = $queryResult['lowERQ'];
                                                $countModerateERQs = $queryResult['moderateERQ'];
                                                $countHighERQs = $queryResult['highERQ'];
                                                $totalERQ = $countLowERQs+$countModerateERQs+$countHighERQs;
                                                // // chapter count 
                                                // $chapterCountQuery = "SELECT COUNT(DISTINCT `chapter`) AS chapterCount FROM `questions` WHERE `classId`=$classId AND `subjectId`=$subjectId AND `status`=1  ORDER BY `chapter` ASC";
                                                // $chapterCountQueryRun = mysqli_query($con,$chapterCountQuery);
                                                // $totalChapters = mysqli_fetch_assoc($chapterCountQueryRun);
                                                // print 
                                                echo "<tr>
                                                    <td>".$className."</td>
                                                    <td>".$subjectName."</td>
                                                    <td>".$chapterName."</td>
                                                    <td class='bg-light'>".$countLowMCQs."</td>
                                                    <td class='bg-light'>".$countModerateMCQs."</td>
                                                    <td class='bg-light'>".$countHighMCQs."</td>
                                                    <td class='bg-secondary text-light'>".$totalMCQ."</td>
                                                    <td class='bg-light'>".$countLowCRQs."</td>
                                                    <td class='bg-light'>".$countModerateCRQs."</td>
                                                    <td class='bg-light'>".$countHighCRQs."</td>
                                                    <td class='bg-secondary text-light'>".$totalMCQ."</td>
                                                    <td class='bg-light'>".$countLowERQs."</td>
                                                    <td class='bg-light'>".$countModerateERQs."</td>
                                                    <td class='bg-light'>".$countHighERQs."</td>
                                                    <td class='bg-secondary text-light'>".$totalMCQ."</td>
                                                    <td>".$totalMCQ+$totalCRQ+$totalERQ."</td>
                                                </tr>";
                                                
                                            }
                                        }
                                    }

                                ?>
                                <div hidden id='queryString'><?php echo $string; ?></div>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include("templates/footer.php"); ?>
<script src="js/custom/question.js"></script>