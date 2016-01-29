<?php 
include "header.php";

include "connectdb.php";
$error='';
$msg='';
$newmess='';
if(isset($_POST['submit']))
{
	$username=htmlspecialchars(mysql_real_escape_string($_POST['username']), ENT_QUOTES);
	$roll_no=htmlspecialchars(mysql_real_escape_string($_POST['roll_no']), ENT_QUOTES);
	$email=htmlspecialchars(mysql_real_escape_string($_POST['email']), ENT_QUOTES);
	$password=chr(rand(65,91)).chr(rand(65,91)).chr(rand(48,57)).chr(rand(65,91)).chr(rand(65,92)).chr(rand(48,57));



	$auth_link="http://www.iert.org.in/change_password.php?email=$email&roll_no=$roll_no&username=$username&token=$password";
	//$auth_link.="&roll_no=".$roll_no;
	//$auth_link.="&username=".$username;
	//$auth_link.="&token=$password";
	$message="Your temporary password is ".$password."\r\n";
	$message.="You can try login using this link.\r\n".$auth_link;
	$message.="\r\nThank you ".$username."\r\nRegards, Web Team IERT";
	
	$result=mysql_query("INSERT INTO users(username,email,password,rollno) values('$username','$email','$password','$roll_no')");
	if($result){
		$msg="Check your email for password and further instruction";
		$res=mail($email,"Password For iert.org.in",$message,'From: <admin@iert.org.in>');
		if($res){
			mkdir("~$username");
			if(!@copy('user/index.html',"~$username/index.html"))
			{
				$errors= error_get_last();
				echo "COPY ERROR: ".$errors['type'];
				echo "<br />\n".$errors['message'];
			}
			if(!@copy('user/filemanager.php',"~$username/filemanager.php"))
			{
				$errors= error_get_last();
				echo "COPY ERROR: ".$errors['type'];
				echo "<br />\n".$errors['message'];
			}
		}
	}else{
		$error=mysql_error($con);
	}	
	
	


}

?>



<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
		<?php if($msg==''){ ?>
			<h1 class="heading-title pull-left">New Registration</h1>
		<?php } ?>
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
					<?php if($msg==''){ ?>
					<p><span class="required">*</span>These fields are mandatory. </p>
					<form method="POST" action="signup.php">
						<!--
						<div class="form-group name">
							<label for="name">Full Name<span class="required">*</span></label>
							<input id="name" type="text" name="name" class="form-control" placeholder="Enter your name" required/>
						</div>--><!--//form-group-->
						<div class="form-group phone">
							<label for="phone">username<span class="required">*</span></label>
							<input id="phone" type="text" name="username" class="form-control" placeholder="e.g. ravi.singh" required/>
						</div>

						<div class="form-group email">
							<label for="email">UPTU Roll No.</label>
							<input id="email" type="text" name="roll_no" class="form-control" placeholder="Enter your UPTU Rollno">
						</div><!--//form-group-->
						<div class="form-group phone">
							<label for="phone">Email<span class="required">*</span></label>
							<input id="phone" type="email" name="email" class="form-control" placeholder="Enter your email" required/>
						</div><!--//form-group-->

						

						<div class="form-group phone">
							<label for="phone">password<span class="required">*</span></label>
							<input id="phone" type="password" name="password" class="form-control" placeholder="Enter your password" required/>
						</div>

						<button type="submit" class="btn btn-theme" name="submit">Submit</button>
					</form> 
					<?php } ?>  
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
