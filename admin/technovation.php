<?php
 	session_start();
 	if(!isset($_SESSION['email'])){
 		header("location: login.php?status=2");
 	}
 	
?>
<?php
	include "../connectdb.php";
	$res=mysql_query("SELECT * from event");
	if(isset($_GET['update'])){
		$timestamp=addslashes( $_GET['timestamp']);
		$name=addslashes( $_GET['name']);
		$desc=addslashes( $_GET['desc']);
		$motivation=addslashes( $_GET['motivation']);
		$rules=addslashes( $_GET['rules']);
		$timestamp=addslashes( $_GET['timestamp']);
		$member1_image=$_GET['member1_image'];
		$member2_image=$_GET['member2_image'];
		$member3_image=$_GET['member3_image'];
		$member4_image=$_GET['member4_image'];
		$member5_image=$_GET['member5_image'];
		$sql="update event set name='$name', motivation='$motivation', rules='$rules' , `desc`='$desc', member1_image='$member1_image',member2_image='$member2_image',member3_image='$member3_image',member4_image='$member4_image',member5_image='$member5_image' where timestamp='$timestamp'";
		//echo $sql;;
		$res=mysql_query($sql);
		if($res)
			echo "updated";
		else
			echo "\nerror".mysql_error();
	}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	
	<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({
  		selector: "textarea",  // change this value according to your HTML
  		plugins: "code",content_css : "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
  		//toolbar: "code",
		});</script>	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
</head>
<body>
<div class="container">
	<div class="rows">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 well">
			

		<?php
			if(isset($_GET['name'])){
				echo "<h3 align=\"center\">".$_GET['name']."</h3>";
				$name=$_GET['name'];
				$res=mysql_query("SELECT * from event where name='$name'");
				echo mysql_num_rows($res);
				$row=mysql_fetch_array($res);

?>
		<a href="technovation.php" class="btn btn-default">home</a><a href="logout.php" class="btn btn-default">logout</a>
		<form action="#" method="get">
			Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" style="width:100%"><br><br>
			Desc: <input type="text" name="desc" value="<?php echo $row['desc']; ?>" style="width:100%"><br><br>
			Motivation: <input type="text" name="motivation" value="<?php echo $row['motivation']; ?>" style="width:100%"><br><br>
			Rules and Regulations:<br><br> 
			<textarea name="rules">
				<?php
					echo stripslashes($row['rules']);
				?>
			</textarea><br><br>
			Member1 <input type="text" name="member1_image" value="<?php echo $row['member1_image']; ?>" style="width:100%"><br><br>
			Member2 <input type="text" name="member2_image" value="<?php echo $row['member2_image']; ?>" style="width:100%"><br><br>
			Member3 <input type="text" name="member3_image" value="<?php echo $row['member3_image']; ?>" style="width:100%"><br><br>
			Member4 <input type="text" name="member4_image" value="<?php echo $row['member4_image']; ?>" style="width:100%"><br><br>
			Member5 <input type="text" name="member5_image" value="<?php echo $row['member5_image']; ?>" style="width:100%"><br><br>
			<input type="hidden" value="<?php echo $row['timestamp']; ?>" name="timestamp">
			<input type="submit" name="update" class="btn btn-primary">
			

		</form>

		<?php



			}else{
		?>
			<h3>List of events</h3>
			<table class="table">
			<?php
				while ($row=mysql_fetch_array($res)) {
					echo "<tr> <td>".$row['name']."</td> <td>".$row['lead']."</td><td><a class=\"btn btn-primary\" href='technovation.php?name=$row[name]'>edit</a></td> </tr>";
				}
			?>
			</table>
			<?php
			}
			?>

		</div>
		<div class="col-lg-3"></div>
		
	</div>
	
</div>

</body>
</html>