<?php
include_once 'header.php';
include_once 'navi.php';
?>
    <?php 
                         	error_reporting(E_ALL ^ E_DEPRECATED);
							include "connectdb.php";
					$id=$_REQUEST['id']	;
               $data=mysql_query("select * from updates where id='$id' ");
		       $info=mysql_fetch_array($data);
			   $head=$info['heading'];
			   $date=$info['date'];
			   $image=$info['image'];
			   $des=$info['description'];

		?>					   
        <!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left"><?php echo $head ;?></h1>
                    <div class="breadcrumbs pull-right">
                        <ul class="breadcrumbs-list">
                            <li class="breadcrumbs-label">You are here:</li>
                            <li><a href="index-2.html">Home</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="index-2.html">News</a><i class="fa fa-angle-right"></i></li>
                            <li class="current"> <?php echo $head ;?> </li>
                        </ul>
                    </div><!--//breadcrumbs-->
                </header> 
                <div class="page-content">
                    <div class="row page-row">
                        <div class="news-wrapper col-md-8 col-sm-7">                         
                            <article class="news-item">
                                <p class="meta text-muted">By: <a href="#">Admin</a> |<?php echo $date; ?></p>
                                <p class="featured-image"><img class="img-responsive" src="<?php echo $image; ?>" alt="" /></p>
                                <p><?php echo $des ; ?></p>                       
                            </article><!--//news-item-->
                        </div><!--//news-wrapper-->
                        <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">                    
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

    <?php include "footer.php";?>