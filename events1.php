<?php
include_once 'header.php';
include_once 'navi.php';
?>
    
        <!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left">Events</h1>
                    <div class="breadcrumbs pull-right">
                        <ul class="breadcrumbs-list">
                            <li class="breadcrumbs-label">You are here:</li>
                            <li><a href="index-2.html">Home</a><i class="fa fa-angle-right"></i></li>
                            <li class="current">Events</li>
                        </ul>
                    </div><!--//breadcrumbs-->
                </header> 
                <div class="page-content">
                    <div class="row page-row">
                        <div class="events-wrapper col-md-8 col-sm-7">                         
                            <article class="events-item page-row has-divider clearfix">
                                
                                
                                
                                
                                
                                 <?php
						   require "connectdb.php";
						   $sql="SELECT *FROM events";
						   $result=mysql_query($sql);
						   
						   while($row=mysql_fetch_array($result))
						   {/*
							   	echo '<article class="events-item page-row has-divider clearfix"><div class="details col-md-11 col-sm-10"><div class="event-item"><p class="date-label"><span class="month">'.$row['month'].'</span>';
								echo '<span class="date-number">'.$row['date'].'</span></p><div class="details"><h2 class="title">';
								echo $row['name'].'</h2><p class="time"><i class="fa fa-clock-o"></i>'.$row['time'].'</p><p class="location"><i class="fa fa-map-marker"></i>'.$row['name'].'</p></div></div><p class="desc">'.$row['desc'].'</p></div></article>';*/
								
								echo '<article class="events-item page-row has-divider clearfix">
                                <div class="date-label-wrapper col-md-1 col-sm-2">
                                    <p class="date-label">
                                        <span class="month">'.$row['month'].'</span>
                                        <span class="date-number">'.$row['date'].'</span>
                                    </p>
                                </div>
                                <div class="details col-md-11 col-sm-10">
                                    <h3 class="title">'.$row['name'].'</h3>
                                    <p class="meta"><span class="time"><i class="fa fa-clock-o"></i>'.$row['time'].'</span><span class="location"><i class="fa fa-map-marker"></i><a href="#">'.$row['venue'].'</a></span></p>  
                                    <p class="desc" style="overflow:hidden;">'.$row['desc'].'</p>                       
                                </div>
                            </article>';
								
						   }
						   ?>
                              <!--      <h3 class="title">Open Day</h3>
                                    <p class="meta"><span class="time"><i class="fa fa-clock-o"></i>10:00am - 18:00pm</span><span class="location"><i class="fa fa-map-marker"></i><a href="#">East Campus</a></span></p>  
                                    <p class="desc">Donec commodo felis nec eros mollis dignissim. Pellentesque scelerisque nisl eu erat condimentum, at pellentesque odio elementum. Praesent accumsan non quam vel vulputate. Nullam ac hendrerit quam, ut tincidunt felis. Praesent condimentum ut enim ut mattis.</p>                       
                                </div><!--//details--
                            </article><!--//events-item--
                            <article class="events-item page-row has-divider clearfix">
                                <div class="date-label-wrapper col-md-1 col-sm-2">
                                    <p class="date-label">
                                        <span class="month">SEP</span>
                                        <span class="date-number">06</span>
                                    </p>
                                </div><!--//date-label-wrapper--
                                <div class="details col-md-11 col-sm-10">
                                    <h3 class="title">E-learning at College Green</h3>
                                    <p class="meta"><span class="time"><i class="fa fa-clock-o"></i>10:00am - 16:00pm</span><span class="location"><i class="fa fa-map-marker"></i><a href="#">Learning Center</a></span></p>  
                                    <p class="desc">Donec commodo felis nec eros mollis dignissim. Pellentesque scelerisque nisl eu erat condimentum, at pellentesque odio elementum. Praesent accumsan non quam vel vulputate. Nullam ac hendrerit quam, ut tincidunt felis. Praesent condimentum ut enim ut mattis.</p>                       
                                </div><!--//details--
                            </article><!--//events-item--
                            <article class="events-item page-row has-divider clearfix">
                                <div class="date-label-wrapper col-md-1 col-sm-2">
                                    <p class="date-label">
                                        <span class="month">JUN</span>
                                        <span class="date-number">23</span>
                                    </p>
                                </div><!--//date-label-wrapper--
                                <div class="details col-md-11 col-sm-10">
                                    <h3 class="title">Career Fair</h3>
                                    <p class="meta"><span class="time"><i class="fa fa-clock-o"></i>09:45am - 16:00pm</span><span class="location"><i class="fa fa-map-marker"></i><a href="#">Library</a></span></p>  
                                    <p class="desc">Donec commodo felis nec eros mollis dignissim. Pellentesque scelerisque nisl eu erat condimentum, at pellentesque odio elementum. Praesent accumsan non quam vel vulputate. Nullam ac hendrerit quam, ut tincidunt felis. Praesent condimentum ut enim ut mattis.</p>                       
                                </div><!--//details-->
                            </article><!--//events-item--
                            <article class="events-item page-row has-divider clearfix">
                                <div class="date-label-wrapper col-md-1 col-sm-2">
                                    <p class="date-label">
                                        <span class="month">MAY</span>
                                        <span class="date-number">17</span>
                                    </p>
                                </div><!--//date-label-wrapper--
                                <div class="details col-md-11 col-sm-10">
                                    <h3 class="title">Science Seminar</h3>
                                    <p class="meta"><span class="time"><i class="fa fa-clock-o"></i>14:00pm - 18:00pm</span><span class="location"><i class="fa fa-map-marker"></i><a href="#">Library</a></span></p>  
                                    <p class="desc">Donec commodo felis nec eros mollis dignissim. Pellentesque scelerisque nisl eu erat condimentum, at pellentesque odio elementum. Praesent accumsan non quam vel vulputate. Nullam ac hendrerit quam, ut tincidunt felis. Praesent condimentum ut enim ut mattis.</p>                       
                                </div><!--//details--
                            </article><!--//events-item--
                            
                            <ul class="pagination">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>-->
                            
                        </div><!--//events-wrapper-->
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

   <?php include_once "footer.php";?>