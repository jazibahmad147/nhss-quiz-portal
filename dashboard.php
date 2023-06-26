<?php 
    include("templates/header.php");

    if(isset($_GET['backup'])){
        echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations!",
                        text: "Your backup successfully done!",
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href="dashboard.php";
                        }else{
                            Swal.fire("info", "There might be something goes wrong.", "Failed")
                        }
                    })
            </script>';
    }

    // classes count
    $query = mysqli_query($con,"SELECT count(*) as `classes` FROM `classes` WHERE `status`=1");
    $queryResult = mysqli_fetch_assoc($query);
    $classes = $queryResult['classes'];
    // subjects count
    $query = mysqli_query($con,"SELECT count(*) as `subjects` FROM `subjects` WHERE `status`=1");
    $queryResult = mysqli_fetch_assoc($query);
    $subjects = $queryResult['subjects'];
    // questions count
    $query = mysqli_query($con,"SELECT count(*) as `questions` FROM `questions` WHERE `status`=1");
    $queryResult = mysqli_fetch_assoc($query);
    $questions = $queryResult['questions'];
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="backup.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Backup</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Total Members -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Classes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $classes ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Students -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Subjects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $subjects ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Job Holders -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Questions Added</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $questions ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-pencil fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <!-- Content Row -->
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include("templates/footer.php"); ?>