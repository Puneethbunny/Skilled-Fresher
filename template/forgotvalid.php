<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
session_start(); 
include "connection.php";
if (isset($_POST['email']) ) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $email = validate($_POST['email']);
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
                $email=$_POST['email'];
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
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('puneethsai.15@gmail.com');
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>denama jeevitham</h1></br><p>This is html paragraph</p>";
//Add recipient
	$mail->addAddress($email);
	if ( $mail->send() ) {
		header("Location: forgotmail.php");
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