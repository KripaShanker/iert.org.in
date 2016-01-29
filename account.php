<?php
include_once 'header.php';

include 'connectdb.php';
if(!isset($_SESSION['user'])){
	header("location: login.php");
}

?>
<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left"><?php echo stripcslashes($row['name']); ?></h1>
		</header> 
		<div class="page-content">
			<div class="row page-row">
				<div class="course-wrapper col-md-8 col-sm-7">                         
					<!--############################Editabele Area######################### -->

					<?php 

					$row=mysql_fetch_array(mysql_query("SELECT * from users where username='$user'"));
					$email=$row['email'];
					$token=$row['password'];

					?>

					<div class="alert alert-success">
						<a class="btn btn-default"  href="registration.php">Edit Account info</a>
						<a class="btn btn-default" target="_blank" href=<?php echo "'./~$user'"; ?> >Web Profile</a>
						<a class="btn btn-default" target="_blank" href=<?php echo "'./~$user/filemanager.php'"; ?> >File Manager</a>&nbsp;&nbsp;
						<a class="btn btn-default"  href=<?php echo "'"."change_password.php?email=$email&token=$token&username=$user"."'"; ?> >Change Password</a>
						<a class="btn btn-default"  href="?logout=1">Logut</a>
					</div> 
					<div class="well">
						<div class="row">
							<div class="col-lg-3 col-lg-offset-9">
								<a class="btn btn-default"  href="registration.php">Edit Account info</a>
							</div>
							
						</div>
						<table class="table">
							<thead><th><b>Stuent's detail</b></th></thead>
							<tr>
								<td class="col-lg-4">username</td>
								<td><?php echo $user;?></td>

							</tr>
							<tr>
								<td class="col-lg-4">email</td>
								<td><?php echo $row['email'];?></td>

							</tr>
							<tr>
								<td class="col-lg-4">Roll no</td>
								<td><?php echo $row['rollno'];?></td>

							</tr>
							<tr>
								<td class="col-lg-4">Address</td>
								<td><?php echo $row['address'];?></td>

							</tr>
							<tr>
								<td class="col-lg-4">Year</td>
								<td><?php echo $row['year'];?></td>

							</tr>
						</table>
						<table class="table">

							<thead><th><b>Marksheet</b></th></thead>

							<tr>
								<td class="col-lg-4">1st semester</td>
								<td><?php echo $row['address'];?></td>

							</tr>
							<tr>
								<td class="col-lg-4">2nd semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">3rd semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">4th semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">5th semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">6th semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">7th semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">8th semester</td>
								<td><?php echo $row['address'];?></td>
								
							</tr>
						</table>
					</div>
					<!--#############################Editabele Area#########################-->                 
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