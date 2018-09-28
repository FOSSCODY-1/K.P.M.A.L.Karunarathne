<?php
    @ob_start();
    session_start();
    
    session_destroy();

    unset($current_user);
    unset($_SESSION['username']);

    header('Location: ./login.php');
?>