<?php
    include 'user.php';

    $username = $_GET["username"];
    $filename = $_GET["filename"];
	
    if ($_SESSION['username'] != $username) {
        echo "Unauthorized action";
        exit();
    }

    $query="DELETE FROM notes WHERE username='$username' AND filename='$filename'";

    unlink("files/$username/$filename");
    $result = mysqli_query($connection, $query);
    
    header("Location: browse.php");
?>