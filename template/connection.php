<?php
  $servername="63.250.60.129";
  $username="vce1"; 
  $password="!ntern\$hip2022"; 
  $database="SF2";

  $sfconn=new mysqli($servername, $username, $password, $database);
  if($sfconn->connect_error){
    die("connection failed: " . $sfconn->connect_error);
  }
?>