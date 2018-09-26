<!--
    Check if user is already logged in
    If not, redirect to user login page
    If yes, continue without interruption
-->

<?php
    include "connect.php";
    session_start();
    ob_start();
    
    //Sample user for skipping user registration process for now
    if (!isset($_SESSION)) {
        header('Location: ./login.php');
    }
    //$_SESSION['user'] = 'test';
    //$_SESSION['name'] = 'Test user';
?>
