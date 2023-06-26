<?php 
    include("templates/header.php"); 
    $recordId = "";
    $recordName = "";
    if(isset($_GET['editId'])){
        $recordId = $_GET['editId'];
        $query = mysqli_query($con,"SELECT * FROM `subjects` WHERE `id`='$recordId'");
        $result = mysqli_fetch_array($query);
        $recordName = $result['name'];
    }
    if(isset($_GET['delId'])){
        $recordId = $_GET['delId'];
        mysqli_query($con,"UPDATE `subjects` SET `status`=0 WHERE `id`='$recordId'");
        echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations!",
                        text: "Record Deleted Successfully!",
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href="subject.php";
                        }else{
                            Swal.fire("info", "There might be something goes wrong.", "Failed")
                        }
                    })
            </script>';
    }

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subject</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Add Subject Form -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Subject</h6>
                  <a href="subject.php" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-sync"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <form id="subject_form" action="includes/addSubjectProcess.php" method="POST" class="user">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-user" name="recordId" value="<?php echo $recordId; ?>" placeholder="Subject ID">
                            <input type="text" class="form-control form-control-user" name="name" value="<?php echo $recordName; ?>" autofocus placeholder="Subject Name">
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit" />
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Manage Subject -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Record</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x = 1;
                                $query = mysqli_query($con,"SELECT * FROM `subjects` WHERE `status`=1 ORDER BY `id` DESC ");
                                while($row = mysqli_fetch_array($query)){
                                    $id = $row['id'];
                                    // $button = '<a href="#?&id='.$id.'" type="button" class="btn btn-danger btn-sm" name="id" onclick="delete_employee('.$id.')" data-toggle="modal" data-target="#delete_employee_modal"> <i class="fa fa-trash"></i> Delete </a>';
                                    $button = '<a href="?editId='.$id.'" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="?delId='.$id.'" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>';

                                    echo '<tr>
                                            <td>'.$x.'</td>
                                            <td>'.$row['name'].'</td>
                                            <td style="text-align:center">'.$button.'</td>
                                        </tr>';
                                    $x++;
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
<script src="js/custom/subject.js"></script>