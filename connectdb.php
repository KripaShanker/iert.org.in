<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("iert",$con);
error_reporting(E_ALL ^ E_DEPRECATED);
?>