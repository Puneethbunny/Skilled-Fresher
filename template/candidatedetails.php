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
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
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
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
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
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
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
          
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Candidates Table</p>
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
  <button class="tablinks" onclick="openCity(event, 'Likes')">Likes</button>
  <button class="tablinks" onclick="openCity(event, 'Skills')">Skills</button>
  
</div>

<!-- Tab content -->
<div id="Details" class="tabcontent">
  
   <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                <td><?php echo $rows['Id'];?></td>
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
            
        </table>
</div>

<div id="Awards" class="tabcontent">
  <?php $sql1 = " SELECT * FROM CandidateAwards where CandidateId='$id' ";
$result1 = $sfconn->query($sql1); ?>
  
<table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['AwardName'];?></td>
                  <td><?php echo  $rows['YearAwarded'];?></td>
                  <td><?php echo  $rows['Description'];?></td>
               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
  
</div>

<div id="Courses" class="tabcontent">
<?php $sql2 = " SELECT * FROM CandidateCourses where CandidateId='$id' ";
$result2 = $sfconn->query($sql2);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['CourseId'];?></td>
                  <td><?php echo  $rows['CollegeId'];?></td>
                  <td><?php echo  $rows['YearOfPassing'];?></td>
                  <td><?php echo  $rows['Score'];?></td>

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
</div>
<div id="ExtraCurricular" class="tabcontent">
  
<?php $sql3 = " SELECT * FROM CandidateExtraCurricular where CandidateId='$id' ";
$result3 = $sfconn->query($sql3); 
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['Year'];?></td>
                  <td><?php echo  $rows['Activity'];?></td>
                  

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
</div>

<div id="Hobbies" class="tabcontent">
<?php $sql4 = " SELECT * FROM CandidateHobbies where CandidateId='$id' ";
$result4 = $sfconn->query($sql4);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['Hobby'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
</div>

<div id="Inventions" class="tabcontent">
<?php $sql5 = " SELECT * FROM CandidateInventions where CandidateId='$id' ";
$result5 = $sfconn->query($sql5);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['InventionSummary'];?></td>
                  <td><?php echo  $rows['InventionDetails'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
  
</div>
<div id="Trainings" class="tabcontent">
<?php $sql7 = " SELECT * FROM CandidateTrainings where CandidateId='$id' ";
$result7 = $sfconn->query($sql7);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['TrainingName'];?></td>
                  <td><?php echo  $rows['TrainingInstitute'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
</div>
<div id="Likes" class="tabcontent">
  <h3></h3>

  
  <p>London is the capital city of England.</p>
</div>
<div id="Projects" class="tabcontent">
<?php $sql6 = " SELECT * FROM CandidateProjects where CandidateId='$id' ";
$result6 = $sfconn->query($sql6);
 ?>
 
  <table  id="eexample"  class="table table-striped table-bordered" style="width:100%">
                      <thead>
            <tr>
              <th> Id</th>
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
                  
                  <td><?php echo  $rows['CandidateId'];?></td>
                  <td><?php echo  $rows['ProjectTitle'];?></td>
                  <td><?php echo  $rows['Role'];?></td>
                 

               
            </tr>
            <?php
                }
            ?>
            </tbody>
            
        </table>
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
