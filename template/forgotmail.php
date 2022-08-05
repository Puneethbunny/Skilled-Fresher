<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skilled Freshers Login</title>
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/icon.jpg" alt="logo">
              </div>
              <h4>Enter the otp sent to your mail and reset your password</h4>
              <form class="pt-3" action="forgotfinal.php" method="POST">
              <?php if (isset($_GET['error'])) { ?>
              <p style="color:red" class="error"><?php echo $_GET['error']; ?></p>
              <?php } ?>
              
                <div class="form-group">
                  <input type="otp" class="form-control form-control-lg" id="otp" name="otpp" placeholder="Enter 4 digit OTP"required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password1" placeholder="New Password"required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" name="password2" placeholder=" Confirm Password"required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="insert.php">Submit</button>
                </div> 
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
                 
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
