<?php 
    include("templates/header.php");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Question</h1>
          </div>

          <!-- Content Row -->
          <!-- <div class="row"> -->

            <!-- Add Question Form -->
            <!-- <div class="col-xl-4 col-lg-5"> -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Question</h6>
                  <a href="question.php" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-sync"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <form id="question_form" action="includes/addQuestionProcess.php" method="POST" class="user">
                        <div class="row form-group">
                          <div class="col">
                            <label for="">Class</label>
                            <select class="form-control" name="classId">
                              <?php
                                $query = mysqli_query($con,"SELECT * FROM `classes` WHERE `status`=1 ORDER BY `id` DESC");
                                while($row = mysqli_fetch_array($query)){
                                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div class="col">
                            <label for="">Subject</label>
                            <select class="form-control" name="subjectId">
                              <?php
                                $query = mysqli_query($con,"SELECT * FROM `subjects` WHERE `status`=1 ORDER BY `id` DESC");
                                while($row = mysqli_fetch_array($query)){
                                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div class="col">
                            <label for="">Chapter</label>
                            <input type="number" class="form-control" name="chapter" placeholder="Chapter" value="" required autocomplete="off">
                          </div>
                          <div class="col">
                            <label for="">Topic/SLO</label>
                            <input type="text" class="form-control" name="topic" placeholder="Topic/SLO" value="" required autocomplete="off">
                          </div>
                          <div class="col">
                            <label for="">Type</label>
                            <select id="type" class="form-control" name="type" onchange="showOptions()">
                              <option value="ERQ">ERQ</option>
                              <option value="CRQ">CRQ</option>
                              <option value="MCQ">MCQ</option>
                            </select>
                          </div>
                          <div class="col">
                            <label for="">Priority</label>
                            <select class="form-control" name="priority">
                              <option value="High">High</option>
                              <option value="Moderate">Moderate</option>
                              <option value="Low">Low</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="userEmail" value="<?php echo $email; ?>">
                            <input type="text" class="form-control form-control-user" name="question" placeholder="Question" required autocomplete="off">
                        </div>
                        <div id="options" style="display:none">
                          <div class="row form-group">
                            <div class="col"><input type="text" class="form-control form-control-user" name="opt1" placeholder="Option 1" autocomplete="off"></div>
                            <div class="col"><input type="text" class="form-control form-control-user" name="opt2" placeholder="Option 2" autocomplete="off"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col"><input type="text" class="form-control form-control-user" name="opt3" placeholder="Option 3" autocomplete="off"></div>
                            <div class="col"><input type="text" class="form-control form-control-user" name="opt4" placeholder="Option 4" autocomplete="off"></div>
                          </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit" />
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
<script src="js/custom/question.js"></script>