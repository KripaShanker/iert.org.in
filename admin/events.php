<?php
 	session_start();
 	if(!isset($_SESSION['email'])){
 		header("location: login.php?status=2");
 	}
 	
?>

<?php
include '../connectdb.php';
/*declaring global variable*/
$id='';
$place='';
$date='';
$month='';
$data='';
$time='';
$result='';
$msg='';
$error='';
$name='';
/*initializing values from form*/
if(isset($_POST['name']))
	$name=addslashes(mysql_real_escape_string($_POST['name']));
if(isset($_POST['place']))
	$place=addslashes(mysql_real_escape_string($_POST['place']));
if(isset($_POST['event_id']) || isset($_GET['event_id'])){
	if(isset($_POST['event_id']))
		$id=$_POST['event_id'];
	else if(isset($_GET['event_id']) )
		$id=$_GET['event_id'];
}
if(isset($_POST['content']))
	$data=$_POST['content'];
if(isset($_POST['time']))
	$time=$_POST['time'];
if(isset($_POST['date']))
	$date=$_POST['date'];
if(isset($_POST['month']))
	$month=$_POST['month'];
$sql="SELECT * from events where id=$id";
$result=mysql_query($sql);
//echo $sql;
/*initializing values from tables if no data is found in GET*/
if(isset($_POST['open']) || isset($_GET['open']) ){
	$row=mysql_fetch_array($result);
	$data=$row['data'];
	$place=$row['place'];
	$name=$row['name'];
	$time=$row['time'];
	$date=$row['date'];
	$month=$row['month'];


}
//echo "data is ".$data;
if(@mysql_num_rows($result)==0 && $data!=''){
	/* Insert event if event_id not present*/
	$sql="INSERT INTO events values('$id','$name','$month','$date','$time','$place','$data')";
//	echo $sql;
//	echo "num rows are zero";
	$insert=mysql_query($sql);
	if($insert){
		$msg="page added";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}
else if(isset($_POST['submit']) && $place!=''){
	$data=$_POST['content'];
	$place=$_POST['place'];
	$name=$_POST['name'];
	$month=$_POST['month'];
	$time=$_POST['time'];
	$place=$_POST['place'];
	$date=$_POST['date'];
	$sql="UPDATE events set data='$data',name='$name',place='$place',month='$month',time='$time' where id=$id";
	//echo $sql;
	$update=mysql_query($sql);
	if($update){
		$msg="event updated";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}

if(isset($_GET['delete']) && $_GET['delete']=="delete"){
	$delete=$_GET['delete_id'];
	$sql="DELETE from events where id=$delete";
	//echo $sql;
	if(mysql_query($sql)){
		$msg="event deleted";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin IERT</title>
	<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css">
	<script src="../assets/js/tinymce/tinymce.min.js"></script>
	
	<script>tinymce.init({
  		selector: "textarea",  // change this value according to your HTML
  		plugins: "code",
  		//toolbar: "code",
		});</script>	

</head>
<body>
	<div class="container">
		<div class="rows">
			<h1>Institute of Engineering & Rural Technology,Allahabad</h1>
		</div>

		<div class="rows">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Admin Panel</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li class=""><a href="pages.php?submit=show">Pages</a></li>
						<li  class=<?php if(isset($_GET['submit']) && $_GET['submit']=="show") echo '"active"';?>><a href="events.php?submit=show">Events</a></li>
						<li  class=<?php if(isset($_GET['add'])) echo '"active"';?>><a href="events.php?add=new">Add Events</a></li>
						
					</ul>
				</div>
			</nav>

		</div>
		<div class="rows">
		<div class="rows">

				<div class="rows">
					<div class="col-lg-12"> 
						<?php if($error!=''){
							?>
							<div class="alert alert-danger"> <?php echo $error; ?> </div>
							<?php
						}
						if($msg!=''){
							?>
							<div class="alert alert-success"> <?php echo $msg; ?> </div>
							<?php
						}
						$msg='';
						$error='';
						?>
					</div>
				</div>
			<div class="rows">
				<div class="col-lg-12"><?php
					if(isset($_GET['submit']) && $_GET['submit']=="show" || isset($_GET['delete'])){

						?>
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Page Title</th>
									<th>Page Name</th>
								</tr>
							</thead>>

							<?php

							$result=mysql_query("SELECT * from events");
							while($row=mysql_fetch_array($result)){
								$id_link=$row['id'];
								?>
								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['place'];?></td>
									
									<td><a class="btn btn-danger" href=<?php echo 'events.php?delete=delete&delete_id='.$id_link;?> >delete</a></td>
									<td><a class="btn btn-default" href=<?php echo 'events.php?event_id='.$id_link."&open=open";?> >edit</a></td>

								</tr>
								<?php
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<div class="rows">
			<div class="col-lg-8">
				<?php
				if(isset($_GET['event_id']) || isset($_POST['event_id']) || isset($_GET['add'])){

					?>
					<form action="#" method="POST" class="form-horizontal">
						<div class="form-group">
							<label>Event id:  <input type="text" class="form-control disabled" id="event_id"  name="event_id" <?php if(isset($_GET['add']) || isset($_POST['event_id']) || isset($_GET['open'])) echo "readonly" ; ?> value=<?php echo '"'.$id.'"'; ?>  placeholder="enter page id">
							</label>
							
							<label>Unique name:  <input type="text" class="form-control" id=""  name="name"   <?php if(!isset($_GET['add'])) echo "readonly" ; ?> value=<?php echo '"'.$name.'"'; ?>  placeholder="unique name without space">
							</label>

							<label>place:
								<input type="text" class="form-control" value=<?php	echo  '"'.$place.'"'; ?> name="place"  placehlder="place">
							</label>
							<label>date:
								<input type="text" class="form-control" value=<?php	echo  '"'.$date.'"'; ?> name="date"  placehlder="place">
							</label>
							<label>month:
								<input type="text" class="form-control" value=<?php	echo  '"'.$month.'"'; ?> name="month"  placehlder="place">
							</label>
							<label>Time:
								<input type="text" class="form-control" value=<?php	echo  '"'.$time.'"'; ?> name="time"  placehlder="time eg 12:30">
							</label>

							</div>

							<div class="form-group"> <label for="content col-lg-5" >Content</label><br>     

								<textarea name="content" cols="15"><?php echo $data; ?></textarea>
							</div>


							<div class="form-group">

								<input type="submit" name="submit" value=<?php if(isset($_GET['add'])) echo '"add"'; else echo "'update'"; ?> class="btn btn-primary" >

							</div>



						</form>
					</div>
					<?php
				}
				?>
				<div class="col-lg-2">

				</div>
				<div class="col-lg-2">

				</div>

			</div>





		</div>
	</body>
	</html>

	<?php
	if($con)
		mysql_close($con);
?>