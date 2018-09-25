<?php
    include 'user.php';

    $user = $_GET["user"];
    $file = $_GET["file"];
	
    if ($_SESSION['user'] != $user) {
        echo "Unauthorized action!";
        exit();
    }

    $sql="delete from notes where username=\"$user\" and filename=\"$file\"";
    unlink("files/$user/$file");
    $result = mysqli_query($con, $sql);
    header("Location: browse.php");
?>