<?php 
    include("templates/header.php");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz</h1>
          </div>

          <!-- Content Row -->
          <!-- <div class="row"> -->

            <!-- Add Quiz Form -->
            <!-- <div class="col-xl-4 col-lg-5"> -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Quiz</h6>
                  <a href="add-quiz.php" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-sync"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <form id="quiz_form" action="print-quiz.php" method="POST" class="user">
                        <div class="row form-group">
                          <div class="col-md-4">
                            <label for="">Classs</label>
                            <select class="form-control" name="classId" id="classId" onchange="viewChapter()" required>
                              <?php
                                $query = mysqli_query($con,"SELECT * FROM `classes` WHERE `status`=1 ORDER BY `id` DESC");
                                while($row = mysqli_fetch_array($query)){
                                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="">Subject</label>
                            <select class="form-control" name="subjectId" id="subjectId" onchange="viewChapter()" required>
                              <?php
                                $query = mysqli_query($con,"SELECT * FROM `subjects` WHERE `status`=1 ORDER BY `id` DESC");
                                while($row = mysqli_fetch_array($query)){
                                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div id="priorityDiv" class="col-md-4">
                            <label for="">Priority</label>
                            <select class="form-control" id="priority" name="priority" required onchange="customPriority()">
                              <option value="High">High</option>
                              <option value="Moderate">Moderate</option>
                              <option value="Low">Low</option>
                              <option value="Custom">Custom</option>
                            </select>
                          </div>
                          <div class="row form-group m-2 lastRow"><label for="">Chapters &nbsp;</label></div>
                        </div>
                        <div class="form-group row customPriority" style="display: none;">
                            <div class="col-md-12">
                              <label for="">Set Custom Priority</label>
                            </div>
                            <div class="col">
                              <small><label for="">L MCQs</label></small>
                              <input type="number" id="lowMCQs" class="form-control " name="lowMCQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">M MCQs</label></small>
                              <input type="number" id="moderateMCQs" class="form-control " name="moderateMCQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">H MCQs</label></small>
                              <input type="number" id="highMCQs" class="form-control " name="highMCQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">L CRQs</label></small>
                              <input type="number" id="lowCRQs" class="form-control " name="lowCRQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">M CRQs</label></small>
                              <input type="number" id="moderateCRQs" class="form-control " name="moderateCRQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">H CRQs</label></small>
                              <input type="number" id="highCRQs" class="form-control " name="highCRQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">L ERQs</label></small>
                              <input type="number" id="lowERQs" class="form-control " name="lowERQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">M ERQs</label></small>
                              <input type="number" id="moderateERQs" class="form-control " name="moderateERQs" autocomplete="off">
                            </div>
                            <div class="col">
                              <small><label for="">H ERQs</label></small>
                              <input type="number" id="highERQs" class="form-control " name="highERQs" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="quizTitle" placeholder="Quiz Title" required autocomplete="off">
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Create Quiz" />
                    </form>
                  </div>
                </div>
              </div>
            <!-- </div> -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include("templates/footer.php"); ?>
<script src="js/custom/quiz.js"></script>