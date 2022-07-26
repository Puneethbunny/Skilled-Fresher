<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['corporatename']) && isset($_POST['email']) &&
        isset($_POST['password'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $corporatename = $_POST['corporatename'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $servername="63.250.60.129";
        $username="vce1"; 
  		$password="!ntern\$hip2022"; 
  		$database="SF2";

  		$sfconn=new mysqli($servername, $username, $password, $database);
  		if($sfconn->connect_error){
    		die("connection failed: " . $sfconn->connect_error);
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(firstname, lastname, corporatename, email, password) values(?, ?, ?, ?, ?)";

            $stmt = $sfconn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $sfconn->prepare($Insert);
                $stmt->bind_param("ssssi",$firstname, $lastname, $corporatename, $email, $password);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>