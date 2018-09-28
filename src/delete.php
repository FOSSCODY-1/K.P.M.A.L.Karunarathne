<?php
    // Delete notes
	@ob_start();
	session_start();
	
	include_once 'connect.php';
	include_once 'user.php';

    $username = $_GET["username"];
    $filename = $_GET["filename"];
    
    // If current user is not the owner of the note which is going to be deleted, abort
    if ($current_user != $username) {
        echo "Unauthorized action!";
        exit();
    }

    unlink("files/$username/$filename"); //Delete file
    
    $query="DELETE FROM notes WHERE username='$username' AND filename='$filename'";
    $result = mysqli_query($connection, $query);
    
    header("Location: browse.php");
?>