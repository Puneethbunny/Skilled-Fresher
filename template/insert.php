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
  $file=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $path= "logo/".$file;;
    $query="INSERT INTO Corporates (firstname, lastname, corporatename, email, password,Logo) VALUES ('$firstname', '$lastname', '$corporatename', '$email', '$password','$file')";
    $run= mysqli_query($sfconn,$query);
    if($run){
        move_uploaded_file($fileTmpName,$path);
        header("Location: reg2.php?error=404 Not found");
    exit();
       
  }
  else{
    echo "Error: " . $sql . "<br>" . mysqli_error($sfconn);
  }
  
  mysqli_close($sfconn);
?>
