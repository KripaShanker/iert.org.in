<?php
 	session_start();
 	if(!isset($_SESSION['email'])){
 		header("location: login.php?status=2");
 	}
 	
?>
<?php
include '../connectdb.php';
$id='';
$title='';
$body='';
$result='';
$msg='';
$error='';
$name='';
if(isset($_POST['title']))
	$title=addslashes(mysql_real_escape_string($_POST['title']));
if(isset($_POST['content']))
	$body=addslashes(mysql_real_escape_string($_POST['content']));
if(isset($_POST['page_id']) || isset($_GET['page_id'])){
	if(isset($_POST['page_id']))
		 $id=$_POST['page_id'];
	else if(isset($_GET['page_id']) )
			$id=$_GET['page_id'];
}
if(isset($_POST['name']))
	$name=$_POST['name'];
//echo $body;
//echo "page id $id";
$sql="SELECT * from pages where id='$id'";
//echo $sql;
$result=mysql_query($sql);
$num=mysql_num_rows($result);
//echo "numrow".$num;
if(isset($_POST['open']) || isset($_GET['open']) ){
	$row=mysql_fetch_array($result);
	$body=$row['body'];
	$title=$row['title'];
	$name=$row['name'];
}
$num=mysql_num_rows($result);

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
else if(isset($_POST['submit']) && $title!=''){
	$body=$_POST['content'];
	$title=$_POST['title'];
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
	
	<script>tinymce.init({
  selector: "textarea",  // change this value according to your HTML
  plugins: "code",
  //toolbar: "code",
});</script>	
</head>
<body>
	<div class="container">
		
			

		


		<div class="rows" role="form">
			
			   
			<div class="col-lg-12">
			<h1> Institute of Engineering and Rural Technology, Allahabad</h1>
			<div class="rows">
			
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Admin Panel Home</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li class=<?php if(isset($_GET['submit']) && $_GET['submit']=="show") echo '"active"';?>><a href="pages.php?submit=show" >Pages</a></li>
						<li class=<?php if(isset($_GET[add])) echo '"active"';?>><a href="pages.php?add=new">Add new</a></li>
						<li><a href="events.php?submit=show">Events</a></li>
						
					</ul>
				</div>
			</nav>

		</div>
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
						if(isset($_POST['delete']) or isset($_GET['submit']) and $_GET['submit']=="show"){

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
										$id_link=$row['id'];
									?>
									<tr>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['title'];?></td>
										<td><?php echo $row['name'];?></td>
										<td><a class="btn btn-danger" href=<?php echo 'pages.php?delete=delete&delete_id='.$id_link;?> >delete</a></td>
										<td><a class="btn btn-default" href=<?php echo 'pages.php?page_id='.$id_link."&open=open";?> >edit</a></td>
										
									</tr>
									<?php
								}
							}
							?>
						</table>
					</div>
				</div>
				<div class="rows">
					<div class="col-lg-8">
				<?php
				 	if(isset($_GET['page_id']) || isset($_POST['page_id']) || isset($_GET['add'])){

				 	?>
						<form action="#" method="POST" class="form-horizontal">
							<div class="form-group">
								<label>Page id:  <input type="text" class="form-control disabled" id="page_id"  name="page_id" <?php if(isset($_GET['add']) || isset($_POST['page_id'])) echo "readonly" ; ?> value=<?php echo '"'.$id.'"'; ?>  placeholder="enter page id">
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

			
			</div>

		</div>
	</body>
	</html>