<?php        
    // Checks if user is logged in or not.
    // If not, direct to login.php
    // If yes, then continue without interruption

    if (!isset($_SESSION['username'])) {
        header('Location: ./login.php');
    }
    else {
        $current_user = $_SESSION['username'];
    }
?>
