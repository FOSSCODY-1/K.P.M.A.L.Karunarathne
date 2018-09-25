<?php
	include 'connect.php';
	include 'user.php';
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
						<li class="nav-item active">
						<li class="nav-item">
							<a class="nav-link" href="./logout.php">Log out</a>
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
								$sql="SELECT filename,title FROM notes";
								$result=mysqli_query($con,$sql);
								while ($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
									echo "<a href=view.php?user=".$_SESSION["user"]."&file=".$row[0]." class=\"list-group-item\">".$row[1]."</a>";
								}
							?>
							<a href="new.php" class="btn btn-md btn-info" role="button" aria-pressed="true">+ New note</a>
					</div>
				</div>
				<!-- /.col-lg-3 -->

				<div class="col-lg-9">
						<?php
							$sql="SELECT username,filename,title FROM notes";
							$result=mysqli_query($con,$sql);
							while ($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
								$user = $row[0];
								$file = $row[1];
								$title = $row[2];
								$fh = fopen("files/".$user."/".$file, 'r');
								$text = fread($fh, 250);
								echo "
									<div class=\"card mt-4\">
										<img class=\"card-img-top img-fluid\" src=\"http://placehold.it/900x400\" >
										<div class=\"card-body\">
											<h3 class=\"card-title\">".$title."</h3>
											<p class=\"card-text\">".nl2br($text).
											"...</p>
											<a href=\"./view.php?user=".$user."&file=".$file."\" class=\"btn btn-info\" role=\"button\" aria-pressed=\"true\">Read more</a>
											<a href=\"./edit.php?user=".$user."&file=".$file."\" class=\"btn btn-primary\" role=\"button\" aria-pressed=\"true\">Edit</a>
											<a href=\"./delete.php?user=".$user."&file=".$file."\" class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\">Delete</a>
										</div>
									</div>";
							}
						?>
					<!-- /.card -->
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
