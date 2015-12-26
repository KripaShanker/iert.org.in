<?php


session_start();
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	//echo "reached here";
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Username or Password is empty";
	}
	
	else{
		$email=$_POST['email'];
		$password=$_POST['password'];
			
		include("../connectdb.php");

		$email = htmlspecialchars($email);
		$password = htmlspecialchars($password);
		$query="select * from admin where password='$password' AND username='$email'";
		//echo $query;
		$result = mysql_query($query);
		$rows=mysql_num_rows($result);
		//echo "rows".$rows;
		if ($rows == 1) {
			$_SESSION['email']=$email; 
			header("location: index.php"); // Redirecting To Other Page
		} else {
			$error = "Username or Password is invalid";
		}
		mysql_close($con); 
	}
	//echo "hello";	
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="image/photo.jpg">

	<title>Login IERT </title>

	<!-- Bootstrap core CSS -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>

  <body>

  	<div class="container">
  		<div class="rows">
  			<div class="col-lg-12" style="height:100px"></div>
  		</div>
  		<div class="rows">
  			<div class="col-lg-3"></div>
  			
  			<div class="col-lg-6">
  				<form class="form-signin" action="login.php" method="post">
  					<h2 class="form-signin-heading">Please sign in</h2><br/><br/>
  					<label for="inputEmail" >email</label><br/>
  					<input type="text" id="inputEmail" class="form-control" placeholder="1311010024" name="email"><br/><br/>
  					<label for="inputPassword">Password</label><br/>
  					<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
  					<?php 
  						if($error!='')
  							echo "<br><div class=\"alert alert-danger\" >$error</div>"; 
  						if(isset($_GET['status']) && $_GET['status']==1)
  							echo "<br><div class=\"alert alert-success\" >Successfully registered</div>";
              if(isset($_GET['status']) && $_GET['status']==2)
                echo "<br><div class=\"alert alert-danger\" >Session expired</div>";


  					?>
            			<br/><br/>
  					<div class="rows">
  						<div class="col-lg-6">
  							<button class="submit btn btn-primary btn-lg btn-block" name="submit">Sign In</button>

  						</div>
  						<div class="col-lg-6">
  						<a href="registration.php" class="btn btn-lg btn-primary btn-block" name="signup" >Sign up</a>
  						</div>
  			
  					
  						
  					</div>
  				
          		</form>		
  			</div>
  			
  			<div class="col-lg-3"></div>

  		</div>

  	</div> <!-- /container -->


  	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  	<script src="ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>

<?php
  if($con)
    mysql_close($con);
?>