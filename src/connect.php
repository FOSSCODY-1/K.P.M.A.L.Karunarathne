<?php
    $connection = mysqli_connect("localhost","root","","webpad");
    
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }
?> 