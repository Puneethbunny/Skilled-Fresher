<?php  
include "connection.php";
session_start();  
  
if(!$_SESSION['Email'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}
$sql = "SELECT * from Candidates";

if ($result = $sfconn->query($sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );

    
    // Display result
    
 }
 $sql1 = "SELECT * from CandidateLikes";

if ($result1 = $sfconn->query($sql1)) {

    // Return the number of rows in result set
    $rowcount1 = mysqli_num_rows( $result1 );
}
$sql2 = "SELECT * from Colleges";

if ($result2 = $sfconn->query($sql2)) {

    // Return the number of rows in result set
    $rowcount2 = mysqli_num_rows( $result2 );
}
$sql3 = "SELECT * from Skills";

if ($result3 = $sfconn->query($sql3)) {

    // Return the number of rows in result set
    $rowcount3 = mysqli_num_rows( $result3 );
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skilled Freshers</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
        #object1 {
            width: 20%;
            height: 20%;
           
            object-fit: none;
            object-position: absolute;
            /* String value */
        }
  
        #object2 {
            width: 500px;
            height: 200px;
            background-color: green;
            object-fit: none;
            object-position: 50px 30px;
            /* Numeric value */
        }
    </style>
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="indexx.php"><img style="width:100%;height:100%" src="images/logo.jpeg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="indexx.php"><img style="width:100%;height:100%" src="images/logo-light.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <?php $email=$_SESSION['Email'];
             $q= "SELECT Logo FROM Corporates where Email='$email'";
             $result = mysqli_query($sfconn, $q);
             while($rows=$result->fetch_assoc())
                {
              $s=$rows['Logo'];  
              }
              echo "<img src='logo/".$s."' style='width:50px; height:50px;'> ";
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              <a href="logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="indexx.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="candidates.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Candidates</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="likedcan.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">My Candidates</span>
            </a>
          </li>
          
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome<?php
                  echo " ";
                  echo $_SESSION['CorporateName'];
                  ?></h3>
                  
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img  src="images/dashboard/people1.jpg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Candidates</p>
                      <p class="fs-30 mb-2"><?php echo $rowcount; ?></p>
                      <p>Total number of candidates present</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">My Candidates</p>
                      <p class="fs-30 mb-2"><?php echo $rowcount1; ?></p>
                      <p>Approved Candidates</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Colleges</p>
                      <p class="fs-30 mb-2"><?php echo $rowcount2; ?></p>
                      <p>Colleges associated with us</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Types of Skills</p>
                      <p class="fs-30 mb-2"><?php echo $rowcount3; ?></p>
                      <p>All skills of candidates</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          
          

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
