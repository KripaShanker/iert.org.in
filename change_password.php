<?php
include_once 'header.php';
$error="";
include 'connectdb.php';
if(isset($_POST['submit'])){
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	if($password1!=$password2)
		$error="password do not matched";
	else if($password1=="" || $password2=="")
		$error="empty password";
	else{
		$res=mysql_query("UPDATE users set password='$password1' where user='$username'");
		if($res){
			$success="Password Changed successfully";
		}else
			$error="error is".mysql_error($con);
	}
}

?>


<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left">change password</h1>
		</header> 
		<div class="page-content">
			<div class="row page-row">
				<div class="course-wrapper col-md-8 col-sm-7">                         
					                         
				Dear <b><?php echo $_GET['username']; ?></b>,
				&nbsp;&nbsp;&nbsp;Please Change your Password

				<form method="POST" action="#">
						<div class="form-group name">
						
							<div class="form-group email">
								<label for="password">New password<span class="required">*</span></label>
								<input id="email" type="password" name="password2" class="form-control" placeholder="Enter your new password" required/>
							</div><!--//form-group-->
							<div class="form-group phone">
								<label for="phone">Re enter your password<span class="required">*</span></label>
								<input id="phone" type="password" name="password1" class="form-control" placeholder="re enter your password" required/>
							</div><!--//form-group-->

							<input type="submit" name="submit" class="btn btn-theme"></input>
							<?php if($error!="") {echo '<div class="alert alert-danger">'.$error.'</div>'; unset($error);}?> 
							<?php if($success!="") {echo '<div class="alert alert-success">'.$success.'</div>'; unset($error);}?> 
						</form>  

				</div><!--//course-wrapper-->
				<aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">     
					<?php
					include_once 'quick.php';
					include_once 'testimonials.php';
					?>
				</aside>
			</div><!--//page-row-->
		</div><!--//page-content-->
	</div><!--//page--> 
</div><!--//content-->
</div><!--//wrapper-->


<?php include_once "footer.php";?>