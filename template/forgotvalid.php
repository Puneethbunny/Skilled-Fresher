<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
session_start(); 
error_reporting(0);
include "connection.php"; 
$_SESSION[$temp]= $_POST['femail'];
if (isset($_SESSION[$temp]) ) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $email = validate($_POST['femail']);
    if (empty($email)) {
        header("Location: forgot.php?error=Enter your email Id");
        exit();
    }
    else{
        $sql = "SELECT * FROM Corporates WHERE Email='$email'";
        $result = mysqli_query($sfconn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $email) {
                $_SESSION['Email'] = $row['Email'];                 //mana mail code
                $_SESSION['otp']=rand(99999,999999);
                $otp=$_SESSION['otp'];
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "puneethsai.15@gmail.com";
//Set gmail password
	$mail->Password = "pnlelanlhpcxqjwy";
//Email subject
	$mail->Subject = "Skilled-Frehser password reset OTP";
//Set sender email
	$mail->setFrom('puneethsai.15@gmail.com');
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>OTP to reset your Skilled-Fresher account password is $otp</h1></br><p>This is html paragraph</p>";
    
    //$mail->Body = $row['Password'];
//Add recipient
	$mail->addAddress($email);
	if ( $mail->send() ) {
        $tempp=$_SESSION[$temp];
		?>
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
                      <h4>Enter the OTP sent to your mail and reset your password</h4>
                      <form class="pt-3" action="forgotfinal.php" method="POST">
                      <?php if (isset($_GET['error'])) { ?>
                      <p style="color:red" class="error"><?php echo $_GET['error']; ?></p>
                      <?php } ?>
                      
                        <div class="form-group">
                          <input type="otp" class="form-control form-control-lg" id="otp" name="otpp" placeholder="Enter 6 digit OTP"required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password1" placeholder="New Password"required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" name="password2" placeholder=" Confirm Password"required>
                        </div>
                        <div class="text-left mt-4 font-weight-light">
                          <a href="forgotvalid.php" class="text-primary">Resend OTP</a>
                        </div><br>
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
	<?php
    }else{
		echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
	}
	$mail->smtpClose();
                exit();
            }else{
                header("Location: forgot.php?error=Invalid Email ID");
                exit();
            }
        }else{
            header("Location: forgot.php?error=Invalid Email ID");
            exit();
        }
    }
}else{
    header("Location: forgot.php");
    exit();
}
?>
