<?php
include "connection.php";
session_start();  
  
if(!$_SESSION['Email'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}

$id= $_GET['id'];
$sql = " insert into CandidateLikes(CandidateId) values('$id');";
$result = $sfconn->query($sql);
if($result){
    header('location:candidates.php');
}
else{
  echo mysqli_error($sfconn);
}

?>