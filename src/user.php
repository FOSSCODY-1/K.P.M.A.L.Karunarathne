<?php
    include "connect.php";
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header('Location: ./login.php');
    }
    else {
        $username = $_SESSION['username'];
    }
?>
