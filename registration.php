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
					if(isset($_GET['submit'])){
						$year=htmlspecialchars($_GET['year']);
						$address=htmlspecialchars($_GET['address']);
						$st1=htmlspecialchars($_GET['1st']);
						$nd2=htmlspecialchars($_GET['2nd']);
						$rd3=htmlspecialchars($_GET['3rd']);
						$th4=htmlspecialchars($_GET['4th']);
						$th5=htmlspecialchars($_GET['5th']);
						$th6=htmlspecialchars($_GET['6th']);
						$th7=htmlspecialchars($_GET['7th']);
						$th8=htmlspecialchars($_GET['8th']);
						$about=addslashes(htmlspecialchars($_GET['about']));
						$sql="UPDATE users
						set year='$year',address='$address',about='$about',1st=$st1,2nd=$nd2,3rd=$rd3,4th=$th4,5th=$th5,6th=$th6,7th=$th7,8th=$th8
						where username='$user' ";
							//	echo $sql;
						$res=mysql_query($sql);
						if($res)
							header("location: account.php");
						else "<div class='alert alert-danger' >Error is".mysql_error($con)."</div>";
					}
					?>
					<?php 
					$row=mysql_fetch_array(mysql_query("SELECT * from users where username='$user'"));
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
											<td><input class="form-control" type="" name="address" placeholder="e.g. 26 chantham lines,Allahabad,U.P. Pin-211002" value=<?php echo "'".$row['address']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">Year</td>
											<td><!-- <input class="form-control" type="" name="year" placeholder="e.g. 3" value=<?php echo "'".$row['year']."'"; ?> >  -->
												<select class="form-control" name="year">
													<option <?php if($row['year']=='1') echo "selected";?> value="1">1st year</option>
													<option <?php if($row['year']=='2') echo "selected";?> value="2">2nd year</option>
													<option <?php if($row['year']=='3') echo "selected";?> value="3">3rd year</option>
													<option <?php if($row['year']=='4') echo "selected";?> value="4">4th year</option>
												</select>
											</td>

										</tr>
										<tr>
											<td class="col-lg-4">About Me</td>
											<td><textarea class="textarea col-lg-12" rows="4" name="about"><?php echo stripslashes($row['about']); ?></textarea> </td>

										</tr>
									</table>
									<table class="table">

										<thead><th><b>Marksheet</b></th></thead>

										<tr>
											<td class="col-lg-4">1st semester</td>
											<td><input class="form-control" type="" name="1st" placeholder="e.g. 67.32" value=<?php echo "'".$row['1st']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">2nd semester</td>
											<td><input class="form-control" type="" name="2nd" placeholder="e.g. 67.32" value=<?php echo "'".$row['2nd']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">3rd semester</td>
											<td><input class="form-control" type="" name="3rd" placeholder="e.g. 67.32" value=<?php echo "'".$row['3rd']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">4th semester</td>
											<td><input class="form-control" type="" name="4th" placeholder="e.g. 67.32" value=<?php echo "'".$row['4th']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">5th semester</td>
											<td><input class="form-control" type="" name="5th" placeholder="e.g. 67.32" value=<?php echo "'".$row['5th']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">6th semester</td>
											<td><input class="form-control" type="" name="6th" placeholder="e.g. 67.32" value=<?php echo "'".$row['6th']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">7th semester</td>
											<td><input class="form-control" type="" name="7th" placeholder="e.g. 67.32" value=<?php echo "'".$row['7th']."'"; ?> ></td>

										</tr>
										<tr>
											<td class="col-lg-4">8th semester</td>
											<td><input class="form-control" type="" name="8th" placeholder="e.g. 67.32" value=<?php echo "'".$row['8th']."'"; ?> ></td>

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