<?php
	// Shows complete note

	@ob_start();
	session_start();
	
	include_once 'connect.php';
	include_once 'user.php';

	$username = $_GET["username"];
	$filename = $_GET["filename"];
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
							<a class="nav-link" href="logout.php">Log out</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h1 class="my-4">My notes</h1>
					<div class="list-group">
					<?php
							$query = "SELECT username,filename,title FROM notes WHERE username='$username'";
							$result = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    							echo "<a href='view.php?username=$row[0]&filename=$row[1]' class='list-group-item'>$row[2]</a>";
							}
					?>
						<a href="new.php" class="btn btn-md btn-info" role="button" aria-pressed="true">+ New note</a>
					</div>
				</div>
				<!-- /.col-lg-3 -->

				<div class="col-lg-9">
					<div class="card mt-4">
						<div class="card-body">
							<h3 class="card-title">
							<?php
								$titleQuery="SELECT title FROM notes WHERE filename='$filename'";
								$result=mysqli_query($connection, $titleQuery);
								$row=mysqli_fetch_array($result, MYSQLI_NUM);
								echo $row[0];
							?>
							</h3>
							<div class="form-group">
									<p>
										<?php
											$file = fopen("files/$username/$filename", 'r');
											$text = fread($file, 10000);
											echo nl2br($text);
											echo "<p>
											<a href='./edit.php?username=$username&filename=$filename' class='btn btn-primary' role='button' aria-pressed='true'>Edit</a>
											<a href='./delete.php?username=$username&filename=$filename' class='btn btn-danger' role='button' aria-pressed='true'>Delete</a>
											";
										?> 
									</p>
							</div>
						</div>
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