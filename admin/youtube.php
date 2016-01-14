
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<title>YoutubeEmbeded</title>
	<script>
		function focused(){

			document.getElementById("FM").focus();
		}
	</script>
	<style type="text/css">
		@CHARSET "UTF-8";
body{
	
	margin:0 ;
}
input,input:focus{
	width:100%;
	margin:0px;
	border:0px;	
}

label{
	text-align:centre;
}

submit{
	border:0px;
}

#container{
	background-color:#bbb;
	height: 100%
	
}
#header{
	height:120px;
	padding-top:1px;
	background-color:#ddd;
}
#footer{
	height:30px;
	position: absolute;
	bottom: 5px;
	
}
#form{
	border:solid 0px;
	background-color:#AAA;
	width:50%;margin:auto;
	
	padding:5px; 
}

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body onload="focused()">

	<div id="container">
		<div id="header">
			<h1 class="pad5" align="center">Welcome to youtubeEmbeded</h1>
		</div>

		<div class="rows">
			<div class="col-lg-3"></div>
			

			<div class="col-lg-6">
				<form action="#" method="get" role="form">
					<div class="input-group">
						<input type="text" class="format-control input-lg input-block"
						id="FM" name="url" /> 
						<span class="input-group-btn">
							<button class="btn btn-default btn-lg" type="submit" name="frm">Go!</button>
						</span>
					</div>
				</form>
			</div>




			<div class="col-lg-3"></div>
		</div>
		<div class="clearfix"></div>
		<div class="rows">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<?php
				if(isset($_GET['url'])){
					$url=$_GET['url'];
					echo "<b>$url</b>";
				}
				?>
			</div>
			<div class="col-lg-3"> </div>
		</div>
		<div class="clearfix"></div>
		<div class="rows">
			<div class="col-lg-3"> </div>

			<div class="col-lg-6">
			
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
					echo htmlspecialchars('<iframe width="560" height="315" src="'.$url.'?vq=small&rel=0&autoplay=1&loop=1&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>'	);
					echo "<br>";
					echo '<iframe width="560" height="315" src="'.$url.'?vq=small&rel=0&autoplay=1&loop=1&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>';	

					unset($_GET['frm']);
					unset($_GET['url']);

				}
				?>

			</div>
			<div class="col-lg-3"></div>
		</div>
		<div id="footer">footer</div>
	</div>
</body>
</html>
