<?php
	@ob_start();
	session_start();
	
	include_once 'connect.php';
    
    //user.php directs if user is not logged in
    include_once 'user.php';

    //Otherwise,
    header("Location: ./browse.php");
?>