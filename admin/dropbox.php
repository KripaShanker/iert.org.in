<?php
$url='';
$public='';
if(isset($_GET['submit'])){
	$url=$_GET['url'];
	$i=0;
	$len=strlen($url);
	while($i+1< $len and !($url[$i]=='s' and $url[$i+1]=='/') )
		$i++;
	$id= substr($url, $i+2,-5);
	$public="https://dl.dropboxusercontent.com/s/".$id;
}


?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="this page generate a public link accessible through web">
    <meta name="author" content="kripa shanker">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
     <link href="https://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
     
     <title>Dropbox public link Generator</title>

    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dropox</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Dropbox Public link Generator</h1>
        <p class="lead">Use this page as a way to quickly 
                generate public link for content like images 
            etc on dropbox to be accessible directly from web.</p>
      </div>
      
      <form action="#" method="GET">
          <div class="form-group">
		<input type="text" name="url" class="form-control" placeholder="enter the url of shared link from dropbox" required autofocus><br>
		<input type="submit" name="submit" class="form-control" style="width:200px;" >
          </div>
	</form>
	<div class="rows">
		<?php 
			if($public!=''){


		 ?>
		<a href=<?php echo '"'.$public.'"'; ?> >Link Location</a>
		<p><?php echo $public; ?></p>

		<object  data=<?php echo '"'.$public.'"'; ?> >
		</object>
		<?php
			}
		?>
	</div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
   
  </body>
</html>
