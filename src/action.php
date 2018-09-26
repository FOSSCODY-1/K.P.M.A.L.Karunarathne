<?php 
    include 'connect.php';
    session_start();

    if (isset($_GET) && $_GET['check']=='login') {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']); 
      
        $sql = "SELECT username FROM user WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$active = $row['active'];
      
        $count = mysqli_num_rows($result);
      
        // If result matched $myusername and $mypassword, table row must be 1 row
		
        if ($count == 1) {
            //session_register("username");
            $_SESSION['user'] = $username;
            header("location: index.php");
        }
        else {
         $error = "Please try again";
         echo $error;
        }
    }
    else if (isset($_GET) && $_GET['check']=='register') {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']); 
      
        $sql = "insert into user values ('$username', '$password')";
        $result = mysqli_query($con, $sql);

        header("location: login.php");
       
    }
?>