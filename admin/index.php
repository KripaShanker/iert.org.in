<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location: login.php?status=2");
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin IERT</title>
	<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css">
</head>
<body>
	<div class="container">
		<div class="rows">
			<h1>Institute of Engineering & Rural Technology,Allahabad</h1>
		</div>
		<div class="rows">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Admin Panel</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="pages.php?submit=show">Pages</a></li>
						<li><a href="events.php?submit=show">Events</a></li>

						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class=""><a href="logout.php">Logout</a></li>
						
						
						
					</ul>
				</div>
			</nav>

		</div>
		<div class="rows">
			<div class"col-md-5">
				<a href="events.php?submit=show" class="btn btn-success">Events</a> Click for list of event<br>
				<br>
			</div>
			<div class"col-md-5">
				<br><br>
				<a href="pages.php?submit=show" class="btn btn-success">Pages</a> click for pages
			</div>



		</div>





	</div>
</body>
</html>