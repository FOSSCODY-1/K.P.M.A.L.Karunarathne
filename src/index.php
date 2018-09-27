<?php
    //user.php checks if a user is logged in. If not directed to login.php
    include "user.php";
    //Otherwise direct to browse.php
    header("Location: ./browse.php");
?>