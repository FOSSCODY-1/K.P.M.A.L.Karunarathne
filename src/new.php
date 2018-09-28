<?php
	// Interface for creating new notes

	@ob_start();
	session_start();
	
	include_once 'connect.php';
	include_once 'user.php';
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
							<a class="nav-link" href="./">Home</a>
						</li>
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
							$query = "SELECT username,filename,title FROM notes WHERE username='$current_user'";
							$result = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    							echo "<a href='view.php?username=$row[0]&filename=$row[1]' class='list-group-item'>$row[2]</a>";
							}
						?>
						<button type="button" class="btn btn-md btn-info">+ New note</button>
					</div>
				</div>
				<!-- /.col-lg-3 -->

				<div class="col-lg-9">
					<div class="card mt-4">
						<div class="card-body">
							<?php
								echo "<form action='save.php?username=$current_user&method=new' method='post'>";
							?>
								<div class="form-group">
									<label class="col-mt-4 control-label" for="title">Title</label>  
									<input type="text" class="form-control" name="title">
									<p><p>
									<label class="col-mt-4 control-label" for="title">Body</label>  
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="body"></textarea>
									<p><p>
									<button type="submit" class="btn btn-success">Save</button>
									<a href="./browse.php" class="btn btn-warning" role="button">Discard</a>
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