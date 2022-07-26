<?php 

session_start(); 

include "connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=password is required");

        exit();

    }else{

        $sql = "SELECT * FROM Corporates WHERE Email='$uname' AND Password='$pass'";

        $result = mysqli_query($sfconn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Email'] === $uname && $row['Password'] === $pass) {

                echo "Logged in!";

                $_SESSION['Email'] = $row['Email'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: indexx.php");

                exit();

            }else{

                header("Location: login.php?error=Incorrect User name or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorrect User name or password");

            exit();

        }

    }

}else{

    header("Location: login.php");

    exit();

}
?>