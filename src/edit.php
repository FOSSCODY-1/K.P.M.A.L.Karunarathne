<?php
	include 'user.php';
	$user = $_GET["user"];
	$file = $_GET["file"];
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
					<div class="card mt-4">
						<div class="card-body">
							<h3 class="card-title">
							<?php
							$titleQuery="SELECT title FROM notes where filename=\"".$file."\"";
							$result=mysqli_query($con,$titleQuery);
							$row=mysqli_fetch_array($result, MYSQLI_NUM);
							echo $row[0];
							?>
							</h3>
							<form action="./save.php?user=test&file=test" method="post">
								<div class="form-group">
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="body">
										<?php
											echo file_get_contents("files/".$user."/".$file);
										?> 
									</textarea>
									<p><p>
									<button type="submit" class="btn btn-success">Save</button>
									<a href="./browse.php" class="btn btn-warning" role="button">Discard</a>
									<?php
										echo "<a href=\"./delete.php?user=".$user."&file=".$file."\" class=\"btn btn-danger\" role=\"button\">Delete</a>";
									?>
								</div>
							</form>
						</div>
					</div>
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