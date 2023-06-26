<?php 
    include("templates/header.php");

    if(isset($_GET['delId'])){
        $recordId = $_GET['delId'];
        mysqli_query($con,"UPDATE `questions` SET `status`=0 WHERE `id`='$recordId'");
        echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations!",
                        text: "Record Deleted Successfully!",
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href="manage-questions.php";
                        }else{
                            Swal.fire("info", "There might be something goes wrong.", "Failed")
                        }
                    })
            </script>';
    }
?>

<link href="vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Questions</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Questions Manage -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Questions</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="mb-3">
                        <form action="" method="POST" class="user">
                            <div class="form-group row m-auto">
                                <div class="col">
                                    <small>Class</small>
                                    <select class="form-control form-control-sm form-control-student" name="classId">
                                        <option>Select</option>
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM `classes` WHERE `status`=1 ORDER BY id DESC");
                                            while($row = mysqli_fetch_array($query)){
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <small>Subject</small>
                                    <select class="form-control form-control-sm form-control-student" name="subjectId">
                                        <option>Select</option>
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM `subjects` WHERE `status`=1 ORDER BY id DESC");
                                            while($row = mysqli_fetch_array($query)){
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <small>Chapter</small>
                                    <select class="form-control form-control-sm form-control-student" name="chapter">
                                        <option>Select</option>
                                        <?php
                                            $query = mysqli_query($con,"SELECT DISTINCT `chapter` FROM `questions` WHERE `status`=1 ORDER BY chapter DESC");
                                            while($row = mysqli_fetch_array($query)){
                                                echo '<option value="'.$row['chapter'].'">'.$row['chapter'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <small>Topic/SLO</small>
                                    <select class="form-control form-control-sm form-control-student" name="topic">
                                        <option>Select</option>
                                        <?php
                                            $query = mysqli_query($con,"SELECT DISTINCT `topic` FROM `questions` WHERE `status`=1 ORDER BY topic DESC");
                                            while($row = mysqli_fetch_array($query)){
                                                echo '<option value="'.$row['topic'].'">'.$row['topic'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <small>Type</small>
                                    <select class="form-control form-control-sm form-control-student" name="type">
                                        <option>Select</option>
                                        <option value="ERQ">ERQs</option>
                                        <option value="CRQ">CRQs</option>
                                        <option value="MCQ">MCQs</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <small>Priority</small>
                                    <select class="form-control form-control-sm form-control-student" name="priority">
                                        <option>Select</option>
                                        <option value="High">High</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="submit" name="filter" class="btn btn-success btn-sm btn-block" value="Filter" style="margin-top:1.5rem;" />
                                </div>
                            </div>
                        </form>
                        <hr />
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Ch.</th>
                                    <th>Question</th>
                                    <th>Type</th>
                                    <th>Prio.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 15px">
                                <?php
                                    $x = 1;
                                    if(isset($_POST['filter'])){
                                        if(!isset($_POST['classId']) || $_POST['classId']=='Select'){$classId = 'classId';}else{$classId="'".$_POST['classId']."'";}
                                        if(!isset($_POST['subjectId']) || $_POST['subjectId']=='Select'){$subjectId = 'subjectId';}else{$subjectId="'".$_POST['subjectId']."'";}
                                        if(!isset($_POST['chapter']) || $_POST['chapter']=='Select'){$chapter = 'chapter';}else{$chapter="'".$_POST['chapter']."'";}
                                        if(!isset($_POST['topic']) || $_POST['topic']=='Select'){$topic = 'topic';}else{$topic="'".$_POST['topic']."'";}
                                        if(!isset($_POST['type']) || $_POST['type']=='Select'){$type = 'type';}else{$type="'".$_POST['type']."'";}
                                        if(!isset($_POST['priority']) || $_POST['priority']=='Select'){$priority = 'priority';}else{$priority="'".$_POST['priority']."'";}
                                        $query = mysqli_query($con,"SELECT * FROM `questions` WHERE `classId`=$classId AND `subjectId`=$subjectId AND `chapter`=$chapter AND `topic`=$topic AND `type`=$type AND `priority`=$priority AND `status`=1 ORDER BY `id` DESC");
                                        $string = "SELECT * FROM `questions` WHERE `classId`=$classId AND `subjectId`=$subjectId AND `chapter`=$chapter AND `topic`=$topic AND `type`=$type AND `priority`=$priority AND `status`=1 ORDER BY `id` DESC";
                                    }else{
                                        $string = "SELECT * FROM `questions` WHERE `status`=1 ORDER BY `id` DESC";
                                        $query = mysqli_query($con,"SELECT * FROM `questions` WHERE `status`=1 ORDER BY `id` DESC");
                                    }
                                    // echo $string;
                                    while($row = mysqli_fetch_array($query)){
                                    $id = $row['id'];
                                    // subject name capturing
                                    $subjectId = $row['subjectId'];
                                    $subjectQuery = mysqli_query($con,"SELECT * FROM subjects WHERE id='$subjectId'");
                                    $subjectResult = mysqli_fetch_array($subjectQuery);
                                    $subjectName = $subjectResult['name'];
                                    // class name capturing
                                    $classId = $row['classId'];
                                    $classQuery = mysqli_query($con,"SELECT * FROM classes WHERE id='$classId'");
                                    $classResult = mysqli_fetch_array($classQuery);
                                    $className = $classResult['name'];
                                    // Change priority formating
                                    if($row['priority'] == "High"){
                                        $priority = '<span class="badge badge-warning">H</span>';
                                    }elseif($row['priority'] == "Moderate"){
                                        $priority = '<span class="badge badge-success">M</span>';
                                    }elseif($row['priority'] == "Low"){
                                        $priority = '<span class="badge badge-info">L</span>';
                                    }else{
                                        $priority = '<span class="badge badge-danger">'.$row['priority'].'</span>';
                                    }
                                    $viewBtn = '<a href="?view='.$id.'" onclick="view_question('.$id.')" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#questionViewModal">
                                                    <i class="fas fa-eye"></i>
                                                </a>';
                                    $delBtn = '<a href="?delId='.$id.'" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>';
                                    if($row['type']=="MCQ"){
                                      echo '<tr>
                                              <td>'.$className.'</td>
                                              <td><small>'.$subjectName.'</small></td>
                                              <td>'.$row['chapter'].'</td>
                                              <td>'.$row['question'].'</br><small><b>a)</b> '.$row['opt1'].' <b>b)</b> '.$row['opt2'].' <b>c)</b> '.$row['opt3'].' <b>d)</b> '.$row['opt4'].'</small></td>
                                              <td><b>'.$row['type'].'</b></td>
                                              <td>'.$priority.'</td>
                                              <td style="text-align:center">'.$viewBtn.' '.$delBtn.'</td>
                                          </tr>';
                                    }else{
                                      echo '<tr>
                                              <td>'.$className.'</td>
                                              <td><small>'.$subjectName.'</small></td>
                                              <td>'.$row['chapter'].'</td>
                                              <td>'.$row['question'].'</td>
                                              <td><b>'.$row['type'].'</b></td>
                                              <td>'.$priority.'</td>
                                              <td style="text-align:center">'.$viewBtn.' '.$delBtn.'</td>
                                              <td></td>
                                          </tr>';
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
      <!-- view question model -->
<div class="modal fade" id="questionViewModal" tabindex="-1" role="dialog" aria-labelledby="questionViewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="questionViewModalLabel">Question Details View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="questionModal" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Chapter</th>
                    <th>Topic/SLO</th>
                    <th>Type</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="class"></td>
                    <td id="subject"></td>
                    <td id="chapter"></td>
                    <td id="topic"></td>
                    <td id="type"></td>
                    <td id="priority"></td>
                </tr>
                <tr>
                    <th colspan="6" class="text-center">Question</th>
                </tr>
                <tr>
                    <td colspan="6" id="question" class="text-center"></td>
                </tr>
            </tbody>
            <tfoot>
                <p>Question added by: <span id="user"></span></p>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include("templates/footer.php"); ?>
<script>
    query = $('#queryString').text();
    $('#query').val(query);
</script>
<script src="js/custom/question.js"></script>