<?php 
include "header.php";
include "navi.php";
include "connectdb.php";
$error='';
$msg='';
$newmess='';
if(isset($_POST['submit']))
{
	$name=htmlspecialchars(mysql_real_escape_string($_POST['name']), ENT_QUOTES);
	$roll_no=htmlspecialchars(mysql_real_escape_string($_POST['roll_no']), ENT_QUOTES);
	$email=htmlspecialchars(mysql_real_escape_string($_POST['email']), ENT_QUOTES);
	$password=chr(rand(65,91)).chr(rand(65,91)).chr(rand(48,57)).chr(rand(65,91)).chr(rand(65,92)).chr(rand(48,57));



	$auth_link="http://www.iert.org.in/pass_change.php?email=".$email;
	$auth_link.="&roll_no=".$roll_no;
	$auth_link.="&name=".$name;
	$message="Your temporary password is ".$password."\r\n";
	$message.="You can try login using this link.\r\n".$auth_link;
	$message.="\r\nThank you".$name."\r\nRegards, Web Team IERT";
	mail($email,"Password For iert.org.in",$message,'From: <admin@iert.org.in>');
	$result=mysql_query("INSERT INTO users values('','$email','$password','$roll_no')");
	if($result){
		$msg="Check your email for password and further instruction";
	}else{
		$error=mysql_error($con);
	}	


}

?>



<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left">New Registration</h1>
			<div class="breadcrumbs pull-right">
				<ul class="breadcrumbs-list">
					<li class="breadcrumbs-label">You are here:</li>
					<li><a href="index-2.html">Home</a><i class="fa fa-angle-right"></i></li>
					<li class="current">Contact</li>
				</ul>
			</div><!--//breadcrumbs-->
		</header> 
		<div class="page-content">
			<div class="row">
				<article class="contact-form col-md-8 col-sm-7  page-row">  
					<br/>					
					<p><span class="required">*</span>These fields are mandatory. </p>
					<form method="POST" action="signup.php">
						<div class="form-group name">
							<label for="name">Full Name<span class="required">*</span></label>
							<input id="name" type="text" name="name" class="form-control" placeholder="Enter your name" required/>
						</div><!--//form-group-->
						<div class="form-group email">
							<label for="email">UPTU Roll No.</label>
							<input id="email" type="text" name="roll_no" class="form-control" placeholder="Enter your UPTU Rollno">
						</div><!--//form-group-->
						<div class="form-group phone">
							<label for="phone">Email<span class="required">*</span></label>
							<input id="phone" type="email" name="email" class="form-control" placeholder="Enter your email" required/>
						</div><!--//form-group-->

						<button type="submit" class="btn btn-theme" name="submit">Submit</button>
					</form>   
					<?php
						if($error!=''){
					?>
					<div class="alert alert-danger"><?php echo $error; ?></div>
					<?php
					}else if($msg!=''){
					?>
					 <div class="alert alert-success"><?php echo $msg; ?></div>
					<?php
					}
					?>             
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