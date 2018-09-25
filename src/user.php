<!--
    Check if user is already logged in
    If not, redirect to user login page
    If yes, continue without interruption
-->

<?php
    session_start();
    //Sample code for skipping user registratin process for now
    $_SESSION['user'] = 'test';
    $_SESSION['name'] = 'Test user';
?>
