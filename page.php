<?php
include_once 'header.php';

include 'connectdb.php';
$name=htmlspecialchars(mysql_escape_string($_GET['name']));
$result=mysql_query("SELECT body,title,name from pages where name='$name'");

$row=mysql_fetch_array($result)

?>


<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left"><?php echo stripcslashes($row['title']); ?></h1>
		</header> 
		<div class="page-content">
			<div class="row page-row">
				<div class="course-wrapper col-md-8 col-sm-7">                         
					<?php

					
					echo stripcslashes($row['body']);
        
					?>                               
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


<?php
        
    include_once "footer.php";?>