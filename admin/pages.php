<?php
include '../connectdb.php';
$id='';
$title='';
$body='';
$result='';
$msg='';
$error='';
$name='';
if(isset($_GET['title']))
	$title=$_GET['title'];
if(isset($_GET['content']))
	$body=mysql_real_escape_string($_GET['content']);
if(isset($_GET['page_id']))
	$id=$_GET['page_id'];
if(isset($_GET['name']))
	$name=$_GET['name'];
//echo $body;
$sql="SELECT * from pages where id='$id'";

$result=mysql_query($sql);
if(isset($_GET['open'])){
	$row=mysql_fetch_array($result);
	$body=$row['body'];
	$title=$row['title'];
	$name=$row['name'];
}

if(mysql_num_rows($result)==0 and $title!='' and $body!='' ){
	$sql="INSERT INTO pages values('$id','$title','$body','$name')";
	//echo $sql;
	echo "num rows are zero";
	$insert=mysql_query($sql);
	if($insert){
		$msg="page added";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}
else if(isset($_GET['submit']) && $title!=''){
	$sql="UPDATE pages set body='$body',title='$title' where id=$id";
	//echo $sql;
	$update=mysql_query($sql);
	if($update){
		$msg="page updated";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}

if(isset($_GET['delete']) && $_GET['delete']=="delete"){
	$delete=$_GET['delete_id'];
	$sql="DELETE from pages where id=$delete";
	//echo $sql;
	if(mysql_query($sql)){
		$msg="page deleted";
	}else
	{
		$error= "$sql error ".mysql_error($con);
	}	
}


//echo "body is".$body;


?>
<!DOCTYPE html>
<html>
<head>
	<title>Page | admin</title>
	<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css">
	<script src="../assets/js/tinymce/tinymce.min.js"></script>
	
	<script>tinymce.init({ selector:'textarea' });</script>	
</head>
<body>
	<div class="container">
		<h1> Institute of Engineering and Rural Technology, Allahabad</h1>
		<h2>Page Management <a href="pages.php" class="btn btn-default">Home</a> | <a href="pages.php?add=new" class="btn btn-default">Add</a> | update | delete </h2></div>
		<div class="rows" role="form">
			<div class="col-lg-1"></div>    
			<div class="col-lg-10">
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
					<div class="col-lg-12">
						<?php
						if(isset($_GET['delete']) or isset($_GET['submit']) and $_GET['submit']=="show"){

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

								$result=mysql_query("SELECT id,title,name from pages");
								while($row=mysql_fetch_array($result)){
									echo "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['name']."</tr>";
								}
							}
							?>
						</table>
					</div>
				</div>
				<div class="rows">
					<div class="col-lg-8">
						<form action="#" method="GET" class="form-horizontal">
							<div class="form-group">
								<label>Page id:  <input type="text" class="form-control disabled" id="page_id"  name="page_id" <?php if(isset($_GET['add']) || isset($_GET['page_id'])) echo "readonly" ; ?> value=<?php echo '"'.$id.'"'; ?>  placeholder="enter page id">
								</label>
								<input type="submit" name="open" value="open">
								<label>Unique name:  <input type="text" class="form-control" id=""  name="name"   <?php if(!isset($_GET['add'])) echo "readonly" ; ?> value=<?php echo '"'.$name.'"'; ?>  placeholder="unique name without space">
								</label>
								
								<label>Title:
									<input type="text" class="form-control" value=<?php	echo  '"'.$title.'"'; ?> name="title"  placehlder="title">
								</label></div>

								<div class="form-group"> <label for="content col-lg-5" >Content</label><br>     

									<textarea name="content" cols="15"><?php echo $body; ?></textarea>
								</div>
								  

								<div class="form-group">

									<input type="submit" name="submit" value="update" class="btn btn-primary" >

								</div>



							</form>
						</div>
						<div class="col-lg-2">
							<a href="pages.php?add=new" class="btn btn-default">Add new</a>
						</div>
						<div class="col-lg-2">
							<a href="pages.php?submit=show" class="btn btn-default">show pages</a>
						</div>

					</div>
					<div class="rows">
						
						<div class="col-lg-12">
							<form method="GET" action="#">
								<input type="text" class="form-control col-md-2 form-group" name="delete_id" placeholder="enter id of page to be deleted"><br>
								<input type="submit" class="btn btn-danger form-group" name="delete" value="delete">
							</form>
						</div>
					</div>



				</div>

				<div class="col-lg-1"></div>    
			</div>

		</div>
	</body>
	</html>