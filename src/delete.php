<?php
	include 'connect.php';
    include 'user.php';
    if (isset($user)) {
        $user = $_GET["user"];
        $file = $_GET["file"];
    }
    else {
        header('Location: browse.php');
    }
	
    
    if ($_SESION['user'] != $user) {
        echo "Unauthorized action";
        exit();
    }

    $sql='delete from notes where user=$user and title=$title';
    $result = mysqli_query($con, $sql);
    header('Location: browse.php');
?>