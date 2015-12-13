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
include 'connectdb.php';
$sq1=mysql_query("select max(id) as std from updates"); 
$val=mysql_fetch_array($sq1);
$sq=$val['std'];
$id=$sq+1;
$error=$res=$name=$date=$desc="";
	
if(isset($_POST['submit'])){
     $name =htmlspecialchars(mysql_real_escape_string($_POST['name']),ENT_QUOTES);
     $date=htmlspecialchars(mysql_real_escape_string($_POST['date']),ENT_QUOTES);
	 $desc=htmlspecialchars(mysql_real_escape_string($_POST['desc']),ENT_QUOTES);
	 
	 if($name=="" || $date=="" || $desc="")
   {$error="Empty Feild";}
	 else{
	$sql="INSERT INTO `updates` (`heading`,`description`) VALUES ('$name','$date','$desc')"; 
	
	if(isset($_POST['img']))
	{
	//properties of the uploaded file
	$name= $_FILES["img"]["name"];
	$type= $_FILES["img"]["type"];
	$size= $_FILES["img"]["size"];
	$temp= $_FILES["img"]["tmp_name"];
	$error= $_FILES["img"]["error"];
	$path="assets/images/news/";
	list($txt, $ext) = explode(".", $name);
	$actual = $id.$ext;
	move_uploaded_file($temp,$path.$actual);	
	$result=mysql_query($sql);
	if($result)
	$res="inserted";
	}
}}
include 'navi2.php';
?>
<!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left">Add News</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><button class="btn btn-theme" >Logout</button></a>
				</header>
                <div class="page-content">
                    <div class="row">
                        <article class="contact-form col-md-8 col-sm-7  page-row">                            
                          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group name">
                                    <label for="name">Topic</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter topic of news">
                                </div><!--//form-group-->
                                <div class="form-group date">
                                    <label for="date">Date<span class="required">*</span></label>
                                    <input id="date" type="date" name="date" class="form-control" placeholder="Enter Date  of news">
                                </div><!--//form-group-->
                                <div class="form-group file">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" name="img"  class="form-control" placeholder="select the image">
                                </div><!--//form-group-->
                                <div class="form-group message">
                                    <label for="desc">Description<span class="required">*</span></label>
                                    <textarea id="desc" class="form-control" name="desc" rows="6" placeholder="Enter description of news here..."></textarea>
                                </div><!--//form-group-->
                                <button type="submit" class="btn btn-theme" name="submit">Insert</button>
								<a href="newssection.php"><button class="btn btn-theme">Back to news section</button></a>
                            </form>   
                            							
                        </article><!--//contact-form-->
                        <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                        <?php
						include_once 'quick.php';
					    include_once 'testimonials.php';
						?>
                        </aside><!--//page-sidebar-->
                    </div><!--//page-row-->
                 </div><!--//page-content-->
            </div><!--//page-wrapper--> 
        </div><!--//content-->
    </div><!--//wrapper-->
<?php
include 'footer.php';
}}
else{
header('Location: admin.php');
}
?>