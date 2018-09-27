<!--
	Checks if user is logged in or not.
    If not, direct to login.php
    If yes, then conntinue without interruption
-->

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
