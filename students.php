<?php
include_once 'header.php';

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
					<a class="btn btn-default" href="students.php?year=1">1st Year</a>
					<a class="btn btn-default" href="students.php?year=2">2st Year</a>
					<a class="btn btn-default" href="students.php?year=3">3st Year</a>
					<a class="btn btn-default" href="students.php?year=4">4st Year</a>
					
					<?php 
					if(isset($_GET['year'])){
						$year=htmlspecialchars($_GET['year']);					
						$result=mysql_query("SELECT username from users where year=$year");
						
						echo "<br>students list of $year year";
						echo "<ol type='1'>";

						while ($row=mysql_fetch_array($result)) {
							$username=$row['username'];
							echo "<li><a href='~$username'>$username</a></li> ";
						}
						echo "</ol>";

					
					}
					?>


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