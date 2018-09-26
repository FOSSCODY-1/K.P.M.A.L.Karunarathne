<?php
	include 'user.php';

    if ($_GET['method']=='new') {
        //New file
        $title = htmlspecialchars($_POST['title']);
        $body  = htmlspecialchars($_POST['body']);

        $username = htmlspecialchars($_GET['username']);   

        $filename = preg_replace('/\s*/', '', $title);
        // convert the string to all lowercase
        $filename = strtolower($filename).".txt";

        $file = fopen("files/$username/$filename", "w");
        fwrite($file, $body);
        
        $query = "INSERT INTO notes VALUES ('$username','$filename', '$title');";
        $result = mysqli_query($connection, $query);
        
        header("Location: browse.php");
    }
    else if ($_GET['method']=='old') {
        //Save file
        $body  = htmlspecialchars($_POST['body']);

        $username = htmlspecialchars($_GET['username']);
        $filename = htmlspecialchars($_GET['filename']);

        $file = fopen("files/$username/$filename", "w");
        fwrite($file, $body);

        header("Location: browse.php");
    }
    else {
        echo "Error!";
    }
?>