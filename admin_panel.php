<!DOCTYPE HTML>
<html>
<?php
session_start();
if(isset($_SESSION['authenticated']))
{
if($_SESSION['authenticated']==True)
  {
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
include 'header2.php';
include 'navi2.php';
?>
<body>
	<h1 style="text-transform:uppercase;color:#000;text-decoration:underline;" align="center">Admin Dashboard</h1>
 <!--ICONS---->
 <div style="text-align:center;">
 <ul class="speciallist" style="color:#2f506c;font-weight:bold;font-size:1.2em;">
 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<table align="center" cellpadding="10" cellspacing="10">
										<tr><td><li><a href="addpic.php" class="fa1 fa-picture-o solo" id="pic_gal" title="Picture Gallery"><span></span></a></li></td>
										<td><li><a href="addvid.php" class="fa1 fa-youtube-play solo" id="vid_gal" title="Video Gallery"><span></span></a></li></td>
										<td><li><a href="addnews.php" class="fa1 fa-globe solo" id="newsnupdates" title="News"><span></span></a></li></td>
										<td><li><a href="addevent.php" class="fa1 fa-dribbble solo" id="events" title="Events"><span></span></a></li></td></tr>
                                        <tr><td>Picture Gallery</td><td>Video Gallery</td><td>News Updates</td><td>Events</td></tr>
										<tr><td>&nbsp;</td></tr>
										<tr><td><li><a href="addslider.php" class="fa1 fa-camera solo" id="slider_img" title="Slider Images"><span></span></a></li></td>
										<td><li><a href="addtestimonial.php" class="fa1 fa-file-text solo" id="testimonials" title="Testimonials"><span></span></a></li></td>
										<td><li>
										<a href="logout.php" class="fa1 fa-power-off solo" id="logout" title="Log Out"><span></span></a></li></td>
										<td><li><a href="settings.php" class="fa1 fa-cog solo" id="settings" title="Settings"><span></span></a></li></td></tr>
                                        <tr><td>Slider Images</td><td>Testimonials</td><td>Log Out</td><td>Account Settings</td></tr>
						</table></ul></div>
  <!--ICONS---->
   	
    </div>
    <div style="margin-top:2em;">
<?php
include_once 'footer.php';
?>
</div>
</body>
</html>
<?php
}}
else{
header('Location: admin.php');
}
?>