<?php
include_once 'header.php';
include_once 'navi.php';

?>

<!-- ******CONTENT****** --> 
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left">youtubeEmbeded</h1>
		</header> 
		<div class="page-content">
			<div class="row page-row">
				<div class="course-wrapper col-md-8 col-sm-7">                         
			<!-- ********************************************************************** --> 		

		<div class="rows">
			<div class="col-lg-12">
				<form action="#" method="get" role="form">
					<div class="input-group">

						<span class="input-group-btn">
							<input type="text" placeholder="enter the url of youtube video here" required autofocus class="format-control input-lg input-block"id="FM" name="url" /><button class="btn btn-default btn-lg" type="submit" name="frm">Go!</button>
						</span>
					</div>
				</form>
			</div>
			
		</div>



		<div class="rows">
			
				<?php
				if(isset($_GET['url'])){
					$url=$_GET['url'];
					echo "<b>$url</b>";
				}
				?>
			
		</div>



		<div class="rows">
			<div style="background:#000;">

			
			
				<?php
				if(isset($_GET['frm'])){
					$url = $_GET ['url'];
		//if ($id [0] == w)
			//$temp = substr ( $id, 24 );
		//else
			//$temp = substr ( $id, 32 );
					$len=strlen($url);

					for($i=0,$k=0;$i<$len;$i++)
					{
						if($url[$i]=='v' )
						{
							$i+=2;
							break;
						}
					}
					$temp=" ";
					for(;$url[$i]!='&' && $i<$len;$i++,$k++)
						$temp[$k]=$url[$i];
		//echo $temp.' ' ;
					$url = "https://www.youtube.com/embed/".$temp;;
	//echo $url;	
					echo "<br>";	
					echo '<iframe width="560" height="315" src="'.$url.'?vq=small&rel=0&autoplay=1&loop=1&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>';	

					unset($_GET['frm']);
					unset($_GET['url']);

				}
				?>

			</div>
			
		</div>





			<!-- ************************************************************************* --> 

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
	include "footer.php";

?>