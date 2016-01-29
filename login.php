<?php
include 'header.php';
session_start();
if(isset($_SESSION['user']))
	$user=$_SESSION['user'];
$password=$error='';
if(isset($_POST['submit']))
{

	if (empty($_POST["email"]) || empty($_POST['password']))
	{
		$error="either email or password empty";
	}
	else
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$res=mysql_query("SELECT * FROM users WHERE email='$email' and password='$password' ");
		if(mysql_num_rows($res)){
			
			$row=mysql_fetch_array($res);
			$_SESSION['user']=$row['username'];
			$user=$row['username'];
			$success="loged in successfully";
			header("location: index.php");
			

		}else
		$error="incorrect login details";

		
	}
}


?>





<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<?php if(!isset($user)){?>
			<h1 class="heading-title pull-left">Login</h1>
			<?php } else echo '<h1 class="heading-title pull-left">Hello, <b>'.$user.'</b></h1>'; ?>
			<div class="breadcrumbs pull-right">
				<ul class="breadcrumbs-list">
					<li class="breadcrumbs-label">You are here:</li>
					<li><a href="index-2.html">Home</a><i class="fa fa-angle-right"></i></li>
					<li class="current">Login</li>
				</ul>
			</div><!--//breadcrumbs-->
		</header> 
		<div class="page-content">
			<div class="row">
				<article class="contact-form col-md-8 col-sm-7  page-row">  
					<?php if(!isset($user)){ ?>
					<form method="POST" action="#">
						<div class="form-group name">
							
							<div class="form-group email">
								<label for="email">Email<span class="required">*</span></label>
								<input id="email" type="email" name="email" class="form-control" placeholder="Enter your email" required/>
							</div><!--//form-group-->
							<div class="form-group phone">
								<label for="phone">Password<span class="required">*</span></label>
								<input id="phone" type="password" name="password" class="form-control" placeholder="Password" required/>
							</div><!--//form-group-->

							<input type="submit" name="submit" class="btn btn-theme"></input>
							<?php if($error!="") {echo '<div class="alert alert-danger">'.$error.'</div>'; unset($error);}?> 
						</form>  
						<?php } ?>

						<?php if(isset($success) || isset($user)){ ?> 
						<div class="alert alert-success">
							
							<a class="btn btn-default" href="registration.php">My account</a>
							<a class="btn btn-default" href=<?php echo "'./~$user'"; ?> >Web Profile</a>
							<a class="btn btn-default" href=<?php echo "'./~$user/filemanager.php'"; ?> >File Manager</a>&nbsp;&nbsp;
							<a class="btn btn-default" href="?logout=1">Logut</a>
						</div> 
						<?php } ?>                
					</article><!--//contact-form-->
					<aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
						<?php
						include_once 'quick.php';
						include_once 'testimonials.php';
						?>
					</aside><!--//page-sidebar-->
				</div><!--//page-row-->

			</div><!--//page-content-->
		</div><!--//page-wrapper--> 
	</div><!--//content-->
</div><!--//wrapper-->

<?php include "footer.php";?>