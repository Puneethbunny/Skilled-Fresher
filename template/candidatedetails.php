<?php  
include "connection.php";
session_start();  
  
if(!$_SESSION['Email'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}
?>
     <script> var m = sessionStorage.getItem("t");
     document.cookie="m ="+m;
</script>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<?php
$f=$_COOKIE['m'];
$sql = " SELECT * FROM Candidates where FirstName='$f' ";
$result = $sfconn->query($sql);


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
  

</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="indexx.php"><img style="width:100%;height:52%" src="images/logo.jpeg" class="mr-2" alt="logo"/></a>
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
              <img  alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>

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
            <a class="nav-link" href="candidates.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title"> MyCandidates</span>
            </a>
          </li>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-title"><?php echo $f;?>'s Details</p>
                  <div class="row">
                    <div class="col-12">
     <div> <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Details')" id="defaultOpen">Details</button>
  <button class="tablinks" onclick="openCity(event, 'Awards')">Awards</button>
  <button class="tablinks" onclick="openCity(event, 'Courses')">Courses</button>
  <button class="tablinks" onclick="openCity(event, 'ExtraCurricular')">ExtraCurricular</button>
  <button class="tablinks" onclick="openCity(event, 'Hobbies')">Hobbies</button>
  <button class="tablinks" onclick="openCity(event, 'Inventions')">Inventions</button>
  <button class="tablinks" onclick="openCity(event, 'Trainings')">Trainings</button>
  <button class="tablinks" onclick="openCity(event, 'Projects')">Projects</button>
  <button class="tablinks" onclick="openCity(event, 'Skills')">Skills</button>
  
</div>

<!-- Tab content -->
<div id="Details" class="tabcontent">
  
   <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Current Location</th>
                <th>Mobile</th>
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                    <?php $id= $rows['Id']; ?>
                
                <td><?php echo $rows['FirstName'];?></td>
                <td><?php echo $rows['LastName'];?></td>
                <td><?php echo $rows['Email'];?></td>
                <td><?php echo $rows['CurrentLocation'];?></td>
                <td><?php echo $rows['Mobile'];?></td>
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div>

<div id="Awards" class="tabcontent">
  <?php $sql1 = " SELECT * FROM CandidateAwards where CandidateId='$id' ";
$result1 = $sfconn->query($sql1); ?>
  
<table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> AwardName</th>
              <th> Year</th>
              <th> Description</th>
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result1->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['AwardName'];?></td>
                  <td><?php echo  $rows['YearAwarded'];?></td>
                  <td><?php echo  $rows['Description'];?></td>
               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
  
</div>

<div id="Courses" class="tabcontent">
<?php $sql2 = " SELECT * FROM CandidateCourses where CandidateId='$id' ";
$result2 = $sfconn->query($sql2);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> CourseId</th>
              <th> CollegeId</th>
              <th> YearOfPassing</th>
              <th> Score</th>
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result2->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['CourseId'];?></td>
                  <td><?php echo  $rows['CollegeId'];?></td>
                  <td><?php echo  $rows['YearOfPassing'];?></td>
                  <td><?php echo  $rows['Score'];?></td>

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div>
<div id="ExtraCurricular" class="tabcontent">
  
<?php $sql3 = " SELECT * FROM CandidateExtraCurricular where CandidateId='$id' ";
$result3 = $sfconn->query($sql3); 
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> Year</th>
              <th> Activity</th>
              
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result3->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['Year'];?></td>
                  <td><?php echo  $rows['Activity'];?></td>
                  

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div>

<div id="Hobbies" class="tabcontent">
<?php $sql4 = " SELECT * FROM CandidateHobbies where CandidateId='$id' ";
$result4 = $sfconn->query($sql4);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> Hobby</th>
              
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result4->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['Hobby'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div>

<div id="Inventions" class="tabcontent">
<?php $sql5 = " SELECT * FROM CandidateInventions where CandidateId='$id' ";
$result5 = $sfconn->query($sql5);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> InventionSummary</th>
              <th> InventionDetails</th>
              
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result5->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['InventionSummary'];?></td>
                  <td><?php echo  $rows['InventionDetails'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
  
</div>
<div id="Trainings" class="tabcontent">
<?php $sql7 = " SELECT * FROM CandidateTrainings where CandidateId='$id' ";
$result7 = $sfconn->query($sql7);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> Name</th>
              <th> Institute</th>
              
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result7->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['TrainingName'];?></td>
                  <td><?php echo  $rows['TrainingInstitute'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div>
<div id="Projects" class="tabcontent">
<?php $sql6 = " SELECT * FROM CandidateProjects where CandidateId='$id' ";
$result6 = $sfconn->query($sql6);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              
              <th> Title</th>
              <th> Role</th>
              
                
            </tr>
        </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result6->fetch_assoc())
                {
            ?>
            <tbody>

            <tr>
            
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  
                  
                  <td><?php echo  $rows['ProjectTitle'];?></td>
                  <td><?php echo  $rows['Role'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table><br>
        <a href='candidates.php'><button type="button" class="btn btn-primary">Primary</button></a>
</div><div id="Skills" class="tabcontent">

</div>
</div>
</div>


        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
function openCity(event, Details) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(Details).style.display = "block";
  event.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
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
