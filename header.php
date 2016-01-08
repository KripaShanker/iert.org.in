<?php
include "connectdb.php";
$row='';
$name='';
if(basename($_SERVER['PHP_SELF'])=="page.php" && isset($_GET['name'])){
  $name=$_GET['name'];
  $row=mysql_fetch_array(mysql_query("SELECT body,title,name from pages where name='$name'"));
}

else if(basename($_SERVER['PHP_SELF'])=="event.php"){
  $name=$_GET['name'];
  $row=mysql_fetch_array(mysql_query("SELECT * from events where name='$name'"));

  
}

?>

<!DOCTYPE html>
<head>
    <title> <?php if(isset($_GET['name'])) echo $_GET['name']." | "; ?> IERT Allahabad</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="alternate" hreflang="en-US" href=<?php $name_meta='' ;if(isset($_GET['name'])) $name_meta=$_GET['name'];echo "\"".$_SERVER['PHP_SELF']."?name=".$name_meta."\""; ?> />
  <meta name="keywords" content="IERT, Allahabad, IERT Polytechnic, Placement, Result, Fee Structure,IERT Examination">
  <?php
    if(basename($_SERVER['PHP_SELF'])=="index.php" ){
  ?>
  <meta name="description" content="Institute of Engineering & Rural Technology IERT is one of the top engineering colleges in Allahabad among all Engineering Colleges in Uttar Pradesh and Allahabad. IERT has a long standing traditions of churning out industry stalwarts. The students at IERT are bright, ambitious, team players and serious about their academic progress.">
  <?php
    }
  ?>
  <meta name="author" content="WebTeam, IERT">  
  <link rel="shortcut icon" href="assets/images/iert1.png">  

  <!-- Global CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">   
  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <!-- this is jquery from cdn remove comment when it is required
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
 -->
 
 <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
  <link rel="stylesheet" href="assets/plugins/pretty-photo/css/prettyPhoto.css"> 

  <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">

  <meta property="og:type"            content="Website" /> 
  <meta property="og:site_name"           content="Institute of Engineering and Rural Technology, Allahabad" /> 
  <meta property="og:title"       content= "Institute of Engineering and Rural Technology, Allahabad" />
  

<?php
  if(basename($_SERVER['PHP_SELF'])=="page.php" and isset($_GET['name'])){
    echo "<meta property=\"og:description\"            content=\"   ".substr(htmlspecialchars(strip_tags($row['body'])),0,300)."   \" /> ";
    echo "<meta name=\"description\" content=\"".substr(htmlspecialchars(strip_tags($row['body'])),0,300)."\"/>";
    
  }
    else if(basename($_SERVER['PHP_SELF'])=="event.php"){
    echo "<meta property=\"og:description\"            content=\"".substr(htmlspecialchars( strip_tags($row['data'])),0,300)." \" /> ";
    echo "<meta name=\"description\" content=\"".substr(htmlspecialchars(strip_tags($row['data'])),0,300)."\"/>";
    
    }
    ?>


  <meta property="fb:app_id"          content="720122941420544" /> 
  <?php include "analytics.php"; ?>
  <!--
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '720122941420544',
        xfbml      : true,
        version    : 'v2.5'
      });
    };

    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  </script>
-->
</head> 

<body class="home-page">
  <div class="wrapper">
    <!-- ******HEADER****** --> 
    <header class="header">  
      <div class="top-bar">

        <div class="container">              
                   <!-- <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                        <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>         
                      </ul> -->
                      <form class="pull-right search-form" role="search">
                        <button class="btn "><a href="login.php">Login</a></button>&nbsp;&nbsp;
                        <button class="btn "><a href="signup.php">Signup</a></button>
                      </form>        
                    </div>      
                  </div><!--//to-bar-->
                  <div class="header-main container">
                    <div class="info col-md-12 col-sm-12">

                      <br />
                      <div class="contact pull-right ">
                        <p class="email"><i class="fa fa-envelope"></i><a href="mailto:admin@iert.org.in">admin@iert.org.in</a></p>
                      </div><!--//contact-->
                    </div><!--//info-->
                    <h1 class="logo col-md-2 col-sm-2">
                     <a href="#"><img id="logo" src="https://dl.dropboxusercontent.com/s/vzcb99lrgh2x831/iert21.png" alt="Logo"></a></h1>
                     <div class="head col-md-10 col-sm-10"><h1><strong>Institute of Engineering & Rural Technology<br/>Allahabad, India</strong></h1></div>	
                     <!--//logo-->           

                   </div><!--//header-main-->
                 </header><!--//header-->

        <!-- ******NAV****** -->