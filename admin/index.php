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
	  <!-- Global CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">   
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
						<li class=""><a href="logout.php" class="btn btn-info"><strong>Logout</strong> </a></li>
						
						
						
					</ul>
				</div>
			</nav>

		</div>
		<div class="rows">
			<div class="col-lg-6">
				<a href="events.php?submit=show" class="btn btn-success">Events</a> Click for list of event
				<p>Events are those which appear on left sidebar on home page. </p>
				<p>You can do the following
				<ul>
					<li>View current events</li>
					<li>Add event</li>
					<li>edit event</li>
					<li>Delete event</li>
				</ul>
				</p>
				<p>
					<strong>Note:</strong> A unique name has to be given to every event as it act similar to primary key.
					These events will be automatically added to home page events.
				</p>
			</div>
			<div class="col-lg-6">
				
				<a href="pages.php?submit=show" class="btn btn-success">Pages</a> click for pages
				<p>Pages are those which appear on navigation bar. </p>
				<p>You can do the following
				<ul>
					<li>View All pages</li>
					<li>Add new page</li>
					<li>edit page</li>
					<li>Delete page</li>
				</ul>
				</p>
				<p>
					<strong>Note:</strong> A unique name has to be given to every page as it act similar to primary key.<br>
					navigation menu has to be manually edited for page added otherwise it wouldn't be visible.
				</p>
			</div>



		</div>
		<div class="rows">
			<div class="col-lg-6">
			<a href="dropbox.php" target="_blank" class="btn btn-success">dropbox</a> Click to genreate dropbox public link.
			<p>
				As dropbox will be used to host images and videos a public link need to be generated which is usable on website.
			</p>
			</div>
			<div class"col-lg-6">
				<a href="youtube.php" target="_blank" class="btn btn-success">youtube embeded url</a>
				For embeding videos in site, <br>use this tool generate embeded code.
			</div>
		</div>





	</div>
</body>
</html>

<?php
	if($con)
		mysql_close($con);
?>