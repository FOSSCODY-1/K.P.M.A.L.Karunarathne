<?php
	// Save notes or create new notes

	@ob_start();
	session_start();
	
	include_once 'connect.php';
	include_once 'user.php';

    if ($_GET['method']=='new') {
        //Create a new file
        $title = htmlspecialchars($_POST['title']);
        $body  = htmlspecialchars($_POST['body']);

        $username = htmlspecialchars($_GET['username']);   

        // Generate a suitable filename using the title
        $filename = preg_replace('/\s*/', '', $title);
        // Convert the string to all lowercase
        $filename = strtolower($filename).".txt";

        $file = fopen("files/$username/$filename", "w");
        fwrite($file, $body);
        
        $query = "INSERT INTO notes VALUES ('$username','$filename', '$title');";
        $result = mysqli_query($connection, $query);
        
        header("Location: browse.php");
    }
    else if ($_GET['method']=='old') {
        //Save into existing file
        $body  = htmlspecialchars($_POST['body']);

        $username = htmlspecialchars($_GET['username']);
        $filename = htmlspecialchars($_GET['filename']);

        $file = fopen("files/$username/$filename", "w");
        fwrite($file, $body);

        header("Location: browse.php");
    }
?>