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
					?>
					<?php 
							if(isset($_GET['submit'])){
								$sql="UPDATE users
								set year='$year',address='$address',1st=$1st,2nd=$2nd,3rd=$3rd,4th=$4th,5th=$5th,6th=$6th,7th=$7th,8th=$8th
								where username='$user' ";
								$res=mysql_query($sql);
							}
					?>
					<div class="well">
						<form class="form" method="get" action="#">
						<table class="table">
							<thead><th><b>Change your detail</b></th></thead>
							<tr>
								<td class="col-lg-4">username</td>
								<td><input class="form-control" type="" name="" placeholder="" value=<?php echo "$user"; ?>  disabled></tr>
							<tr>
								<td class="col-lg-4">email</td>
								<td><input class="form-control" type="" name="" placeholder="" value=<?php echo "'".$row['email']."'"; ?> disabled></td>

							</tr>
							<tr>
								<td class="col-lg-4">Roll no</td>
								<td><input class="form-control" type="" name="" placeholder="" value=<?php echo "'".$row['rollno']."'"; ?> disabled ></td>

							</tr>
							<tr>
								<td class="col-lg-4">Address</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 26 chantham lines,Allahabad,U.P. Pin-211002" value=<?php echo "'".$row['address']."'"; ?> ></td>

							</tr>
							<tr>
								<td class="col-lg-4">Year</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 3" value=<?php echo "'".$row['year']."'"; ?> ></d>

							</tr>
						</table>
						<table class="table">

							<thead><th><b>Marksheet</b></th></thead>

							<tr>
								<td class="col-lg-4">1st semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['1st']."'"; ?> ></td>

							</tr>
							<tr>
								<td class="col-lg-4">2nd semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['2nd']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">3rd semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['3rd']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">4th semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['4th']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">5th semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['5th']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">6th semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['6th']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">7th semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['7th']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td class="col-lg-4">8th semester</td>
								<td><input class="form-control" type="" name="" placeholder="e.g. 67.32" value=<?php echo "'".$row['8th']."'"; ?> ></td>
								
							</tr>
							<tr>
								<td><input type="submit" name="submit" value="submit"> </td>
							</tr>
						</table>
						</form>


					</div><!--End of well   -->
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