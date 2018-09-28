<?php
    // Manages database connection

    // $connection = mysqli_connect("DATABASE_HOST","DATABASE_USERNAME","DATABASE_PASSWORD","DATABASE_NAME");
    $connection = mysqli_connect("localhost","root","","webpad");
    
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }
?> 
