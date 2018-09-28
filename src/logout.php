<?php
    session_start();
    session_destroy();
    unset($current_user);
    unset($_SESSION['username']);
    header('Location: ./login.php');
?>