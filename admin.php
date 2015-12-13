 <?php

 include 'connectdb.php';
 $username=$password=$message=$tmp_password="";
 
 if(isset($_POST['submit']))
 {
 
 if(isset($_POST['username']))
 {
 $username=$_POST['username'];
 }
 if(empty($_POST['username']))
 {
$message="Username is required!";
 }

 if(empty($_POST['password']))
 {
$message="Password is required!";
 }

 if($username)
 {
  $tmp_password=$_POST['password'];
  require 'connectdb.php';
  $sql=mysql_query("SELECT * FROM `admin` WHERE username='$username' AND password='$tmp_password'");
  if(mysql_num_rows($sql)==1)
  {
  $password=$_POST['password'];
  session_start();
$_SESSION['authenticated']=True;
$_SESSION['username']=$username;	
$_SESSION['password']=$password;
header('Location: admin_panel.php');
  }
 }
 else
 {
 $message="Incorrect Username or Password!";
 }
 
 }
 
 
 /*
 
 if(isset($_POST['submit']))
{
	
$submit=$_POST['submit'];
}
if($username!=""&&$password!=""&&$submit!="")
{

}*/
?>


<!DOCTYPE html>
<html lang="en">
    <head>
	     <script src="assets/js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/form1.css" />
	    </head>
    <body>
        <div class="container">
		
			
			
			<header>
			
				<h1><strong>Administrator Login</strong></h1>
			
				
					<div class="support-n ote">
					<span class="note-ie" align="center" style="color:red;"><?php echo $message;?></span>
				</div>
				
			</header>
			<script type="text/javascript">
			function emailfunc() {
			$("#rty").css("background","url(assets/images/misc/user_hover.png) no-repeat center");
            };
			function email_func() {
			$("#rty").css("background","url(assets/images/misc/user.png) no-repeat center");
            };
			function passfunc() {
			$("#rtx").css("background","url(assets/images/misc/password_hover.png) no-repeat center");
            };
			function pass_func() {
			$("#rtx").css("background","url(assets/images/misc/password.png) no-repeat center");
            };
			</script>
			<section class="main">
				<form class="form-1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<p class="field">
						<input type="text" name="username" placeholder="Username" onmouseover="emailfunc();" onmouseout="email_func();" required/>
						<i id="rty" style="background:url(assets/images/misc/user.png) no-repeat center;" ></i>
					</p>
						<p class="field">
							<input type="password" name="password" placeholder="Password" onmouseover="passfunc();" onmouseout="pass_func();" required/>
							<i id="rtx" style="background:url(assets/images/misc/password.png) no-repeat center;" ></i>
					</p>
					<p class="submit">
						<button type="submit" name="submit" style="">
						<i class="" style=""></i></button>
					</p>
				</form>
			</section>
        </div>
    </body>
</html>
