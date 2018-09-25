<?php
	include 'user.php';

    if (isset($_POST['title'])) {
        //New file
        $title = htmlspecialchars($_POST['title']);
        $body  = htmlspecialchars($_POST['body']);
        $user = htmlspecialchars($_GET['user']);        
        $file = preg_replace('/\s*/', '', $title);
        // convert the string to all lowercase
        $file = strtolower($file).".txt";

        $f = fopen("./files/".$user."/".$file, "w");
        fwrite($f, $body);
        
        $sql = "insert into notes values (\"$user\",\"$file\",\"$title\");";
        $result = mysqli_query($con, $sql);
        
        header("Location: browse.php");
        //Redirect to browse.php
    }
    else {
        //Save file
        $body  = htmlspecialchars($_POST['body']);

        $user = htmlspecialchars($_GET['user']);
        $file = htmlspecialchars($_GET['file']);

        echo "save file";
        echo $body;
        echo $user;
        echo $file;

        //Save data to file
        //Redirect to browse.php
    }
?>