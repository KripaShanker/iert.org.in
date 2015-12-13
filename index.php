<?php 
/*
$file = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
	
}
else {
    $exists = true;
}
if($exists=='false' && $url!='IERTnew/index.php' && $url!='IERTnew/')
{
header("Location: 404.php");
}
elseif($url=='IERTnew/index.php' || $url=='IERTnew/')
{
include 'connectdb.php';
if($db)
{header("Location: home.php");
}else{
header("Location: home2.php");
}
}
else{
*/
?>
<?php 

include 'connectdb.php';
if($db)
{header("Location: home.php");
}else{
header("Location: home2.php");
}
?>
