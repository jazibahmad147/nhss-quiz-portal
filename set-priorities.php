<?php 
    include("templates/header.php"); 
    if(isset($_POST['update'])){
        $priority = $_POST['priority'];
        if(!$priority==""){
            $lowMCQ = $_POST['lowMCQ'];
            $moderateMCQ = $_POST['moderateMCQ'];
            $highMCQ = $_POST['highMCQ'];
            $lowCRQ = $_POST['lowCRQ'];
            $moderateCRQ = $_POST['moderateCRQ'];
            $highCRQ = $_POST['highCRQ'];
            $lowERQ = $_POST['lowERQ'];
            $moderateERQ = $_POST['moderateERQ'];
            $highERQ = $_POST['highERQ'];
            $totalMCQ = $lowMCQ+$moderateMCQ+$highMCQ;
            $totalCRQ = $lowCRQ+$moderateCRQ+$highCRQ;
            $totalERQ = $lowERQ+$moderateERQ+$highERQ;
            if($totalMCQ > 5 || $totalCRQ > 5 || $totalERQ > 2){
                echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Record Does Not Updated!",
                                text: "CRQs sum must be eqaul to 5 & ERQs sum must be equal to 2",
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location.href="set-priorities.php";
                                }else{
                                    Swal.fire("info", "There might be something goes wrong.", "Failed")
                                }
                            })
                    </script>';
            }else{
                mysqli_query($con,"UPDATE `priorities` SET `lowMCQ`='$lowMCQ',`moderateMCQ`='$moderateMCQ',`highMCQ`='$highMCQ',`lowCRQ`='$lowCRQ',`moderateCRQ`='$moderateCRQ',`highCRQ`='$highCRQ',`lowERQ`='$lowERQ',`moderateERQ`='$moderateERQ',`highERQ`='$highERQ' WHERE `name`='$priority'");
                echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Congratulations!",
                                text: "Record Updated Successfully!",
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location.href="set-priorities.php";
                                }else{
                                    Swal.fire("info", "There might be something goes wrong.", "Failed")
                                }
                            })
                    </script>';
            }
            }
    }

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Set Priorities</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Add Class Form -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Priorities</h6>
                  <a href="class.php" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-sync"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <form id="class_form" action="set-priorities.php" method="POST" class="user">
                      <div class="form-group">
                          <input type="hidden" class="form-control form-control-user" name="recordId" value="<?php echo $recordId; ?>" placeholder="Class ID">
                          <label for="">Subject</label>
                          <select class="form-control" id="priority" name="priority" onchange="showPreviousSetPriorities()">
                              <option value="">Select</option>
                            <?php
                              $query = mysqli_query($con,"SELECT * FROM `priorities` ORDER BY `id` ASC");
                              while($row = mysqli_fetch_array($query)){
                                echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                              }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                        <table class="table">
                            <tr>
                                <th colspan="3">MRQs</th>
                            </tr>
                            <tr>
                                <td><input type="number" id="lowMCQInput" class="form-control" name="lowMCQ" max="5"></td>
                                <td><input type="number" id="moderateMCQInput" class="form-control" name="moderateMCQ" max="5"></td>
                                <td><input type="number" id="highMCQInput" class="form-control" name="highMCQ" max="5"></td>
                            </tr>
                            <tr>
                                <th colspan="3">CRQs</th>
                            </tr>
                            <tr>
                                <td><input type="number" id="lowCRQInput" class="form-control" name="lowCRQ" max="5"></td>
                                <td><input type="number" id="moderateCRQInput" class="form-control" name="moderateCRQ" max="5"></td>
                                <td><input type="number" id="highCRQInput" class="form-control" name="highCRQ" max="5"></td>
                            </tr>
                            <tr>
                                <th colspan="3">ERQs</th>
                            </tr>
                            <tr>
                                <td><input type="number" id="lowERQInput" class="form-control" name="lowERQ" max="2"></td>
                                <td><input type="number" id="moderateERQInput" class="form-control" name="moderateERQ" max="2"></td>
                                <td><input type="number" id="highERQInput" class="form-control" name="highERQ" max="2"></td>
                            </tr>
                        </table>
                      </div>
                      <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Update" />
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Manage Insitutes -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Priorities</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th colspan="3">MRQs</th>
                              <th colspan="3">CRQs</th>
                              <th colspan="3">ERQs</th>
                          </tr>
                          <tr>
                            <th></th>
                            <th>L</th>
                            <th>M</th>
                            <th>H</th>
                            <th>L</th>
                            <th>M</th>
                            <th>H</th>
                            <th>L</th>
                            <th>M</th>
                            <th>H</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              $query = mysqli_query($con,"SELECT * FROM `priorities` ORDER BY `id` ASC");
                              while($row = mysqli_fetch_array($query)){
                                  $id = $row['id'];
                                  echo '<tr id="name'.$row['name'].'">
                                          <td>'.$row['name'].'</td>
                                          <td id="lowMCQ">'.$row['lowMCQ'].'</td>
                                          <td id="moderateMCQ">'.$row['moderateMCQ'].'</td>
                                          <td id="highMCQ">'.$row['highMCQ'].'</td>
                                          <td id="lowCRQ">'.$row['lowCRQ'].'</td>
                                          <td id="moderateCRQ">'.$row['moderateCRQ'].'</td>
                                          <td id="highCRQ">'.$row['highCRQ'].'</td>
                                          <td id="lowERQ">'.$row['lowERQ'].'</td>
                                          <td id="moderateERQ">'.$row['moderateERQ'].'</td>
                                          <td id="highERQ">'.$row['highERQ'].'</td>
                                      </tr>';
                              }
                          ?>
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
<script src="js/custom/priority.js"></script>