<?php 
include "connection.php";
session_start(); 
if ($_POST['otpp']!=$_SESSION['otp']) {
    header("Location: forgotmail.php?error=Incorrect OTP");
    exit();
}
$vmail=$_SESSION[$temp];
$OTP=$_POST['otpp'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];
if ($pass1!=$pass2){
    header("Location: forgotmail.php?error=Passwords does not match");
    exit();
}
    $sql = "UPDATE Corporates SET Password='$pass1' where Email='$vmail' ";
    $result1 = mysqli_query($sfconn, $sql);
    if ($result1 === FALSE) {
      die(mysqli_error($sfconn));
    }else{
        header("location: login.php");
    }
    
