<?php
  $servername="63.250.60.129";
  $username="vce1"; 
  $password="!ntern\$hip2022"; 
  $database="SF2";

  $sfconn=new mysqli($servername, $username, $password, $database);
  if($sfconn->connect_error){
    die("connection failed: " . $sfconn->connect_error);
  }
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $corporatename=$_POST['corporatename'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql_e = "SELECT * FROM Corporates WHERE email='$email'";
  $res_e = mysqli_query($sfconn, $sql_e);
  if(mysqli_num_rows($res_e) > 0){
      header("Location: register.php?error=Email ID in use ");
      exit();
  }
  else{
   $sql = "INSERT INTO Corporates (firstname, lastname, corporatename, email, password) VALUES ('$firstname', '$lastname', '$corporatename', '$email', '$password')";
   if (mysqli_query($sfconn, $sql)) {
    header("Location: reg2.php?error=404 Not found");
    exit();
   }
   else {
      echo "Error: " . $sql . "<br>" . mysqli_error($sfconn);
   }
  }
  mysqli_close($sfconn);
?>
