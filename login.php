<?php
include 'header.php';
include 'navi.php';
$rollnoErr=$emailErr=$genderErr=$passwordErr=$password=$email="";
function test_input($data)
     {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
	 $data= mysql_real_escape_string($data);
     return $data;
	 }
	 if(isset($_POST['submit'])||isset($_POST['fpass']))
	 {
	 
   if (empty($_POST["email"]))
     {
	 $emailErr = "Email is required<br>";
	 $passwordErr="Password is required";
	 }
   else
     {
	     if(isset($_POST['email']))
		 {
			 $tmpemail=$_POST['email'];
 			 	 require 'assets/lib/mysql.php';
			 $a=mysql_query("SELECT * FROM user WHERE email='$tmpemail'");
			 if($a)
			 { $r=mysql_fetch_array($a);
				 $rollno=$r['rollno'];
				 $email=$r['email'];
				 $fullname=$r['fullname'];
				 
			}
			else
			{
				$emailErr="E-mail is not found";
			}
	     }
	 }
	          
	 
	 if(empty($_POST['password']))
	 {
		 $passwordErr='password is required';
		 
	 }
	 else
	 {
		       if($email)
			 {
				 
		 $tmppassword=$_POST['password'];
		require 'assets/lib/mysql.php';
		 $b=mysql_query("SELECT password FROM user WHERE email='$email' AND password='$tmppassword' ");
		 if(mysql_num_rows($b)==1){
			 $password=$_POST['password'];
		    }
			else{
				$passwordErr="Incorrect Password";
			}
	     }
	 }
		
		 
		 
	 }
  

if(isset($_POST['submit']))
{
	
$submit=$_POST['submit'];
}
if($email!=""&&$password!=""&&$submit!="")
{
    session_start();
$_SESSION['authenticated']=True;
$_SESSION['email']=$email;	
$_SESSION['password']=$password;
header('Location: registration.php');
	
}
	 
?>




    
        <!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left">Login</h1>
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
							<form method="POST" action="register.php">
                                <div class="form-group name">
                                   
                                <div class="form-group email">
                                    <label for="email">Email<span class="required">*</span></label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Enter your email" required/>
                                </div><!--//form-group-->
                                <div class="form-group phone">
                                    <label for="phone">Password<span class="required">*</span></label>
                                    <input id="phone" type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div><!--//form-group-->
                                
                                <button type="submit" name="submit" class="btn btn-theme">Submit</button>
                            </form>                  
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