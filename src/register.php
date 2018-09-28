<!--
Login interface
Functionality is provided by action.php
-->

<?php
	include 'connect.php';
	session_start();
	
	// If current user is not the owner of the note which is going to be deleted, abort
    if (isset($_SESSION['username'])) {
		echo "Already logged in!";
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>
			Webpad
		</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/item.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="./">Webpad</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Log in</a>
						</li>
                        <li class="nav-item active">
							<a class="nav-link" href="register.php">Register</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h1 class="my-4">Register</h1>
					<div class="list-group">
						Create an account on Webpad to continue enjoy the limitless experience<p><p>
						<a href="login.php" class="btn btn-md btn-info" role="button" aria-pressed="true">Have an account? <strong>Log in</strong></a>
					</div>
				</div>
				<!-- /.col-lg-3 -->

				<div class="col-lg-9">
					<div class="card mt-4">
						<form class="form-horizontal" method='post' action='action.php?check=register'>
							<fieldset>
								<!-- Form Name -->
								<legend></legend>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="name">Name</label>  
									<div class="col-md-4">
										<input id="name" name="name" type="text" placeholder="John Doe" class="form-control input-md" required="">
									</div>
								</div>
						
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="username">Username</label>  
									<div class="col-md-4">
										<input id="username" name="username" type="text" placeholder="john_doe" class="form-control input-md" required="">   
									</div>
								</div>
						
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">Email</label>  
									<div class="col-md-4">
										<input id="email" name="email" type="text" placeholder="johndoe@example.com" class="form-control input-md" required="">
									</div>
								</div>
						
								<!-- Password input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="password">Password</label>
									<div class="col-md-4">
										<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
									</div>
								</div>
						
								<!-- Button (Double) -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="save"></label>
									<div class="col-md-8">
										<button id="save" name="save" class="btn btn-success">Register</button>
										<button id="clear" name="clear" class="btn btn-warning">Reset</button>
									</div>
								</div>
						
							</fieldset>
						</form>

					</div>
					<!-- /.card -->
					<p><p>
				</div>
				<!-- /.col-lg-9 -->
			</div>

		</div>
		<!-- /.container -->
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>