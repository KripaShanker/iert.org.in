<?php include 'connectdb.php';?>
<?php
include 'header.php';
?>
       
  <!-- ******CONTENT****** --> 
        <div class="content container">
            <div id="promo-slider" class="slider flexslider">
                <ul class="slides">
                    
                	<li>
                        <img src="https://dl.dropboxusercontent.com/s/fz8g5baw7uz97gg/slide-5.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >IERT Polytechnic</span>
                            <br />
                            <span class="secondary clearfix" >Established in 1955</span>
                        </p>
                    </li>
<!--
                    <li>
                        
                        <img src="assets/images/slides/slide-3.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >One of the Best Colleges of Asia</span>
                            <br />
                            <span class="secondary clearfix" >Ranked 1<sup>st</sup> in Diploma</span>
                        </p>
                    </li>
-->
                    <li>
                        
                        <img src="https://dl.dropboxusercontent.com/s/5q1c6jq3w2sn1hr/slide-1.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >Engineering Degree Division</span>
                            <br />
                            <span class="secondary clearfix" >Established in 2001</span>
                        </p>
                    </li>
                  
                    <!--

                    <li>
                        <img src="assets/images/slides/slide-4.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >Diverse courses</span>
                            <br />
                            <span class="secondary clearfix" >Choose from over 50 career courses</span>
                        </p>
                    </li>
                </ul><!--//slides-->
            </div><!--//flexslider-->
          <?php include 'news.php';?>
            <div class="row cols-wrapper">
                <div class="col-md-3">
                   <?php

         ?>
         <section class="events">
         	<h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
         	<div class="section-content">
         	<?php
         		$sql="SELECT *FROM events order by id desc";

         		$result=mysql_query($sql);
         		if(!$result)
         		{
         			echo 'No events to display!';
         		}else{
         			
         			while($row=mysql_fetch_array($result))
         			{	//echo "hello";
         				?>
         				<div class="event-item">
         					<p class="date-label">
         						<span class="month"><?php echo $row['month'];?></span>
         						<span class="date-number"><?php echo $row['date'];?></span></p>
         						<div class="details"><h2 class="title">
         							</h2><?php echo $row['name'];?></h2>
         							<p class="time"><i class="fa fa-clock-o"></i><?php echo $row['time'];?></p>
         							<p class="location"><i class="fa fa-map-marker"></i><?php echo $row['place'];?></p>
         							</div>
         					

         				<a class="read-more" href=<?php echo "'event.php?name=".$row['name']."'";?> >Read more...<i class="fa fa-chevron-right"></i></a>
         				<p></p>
                        </div>
         				<?php 
         			}
         		}
         			?>
         		</div><!--//section-content-->
            </section><!--//events-->
                </div><!--//col-md-3-->
                <div class="col-md-6">
                    <h1 class="section-heading text-highlight"><span class="line">IERT, Allahabad</span></h1>
                    <div>
                        <img src="https://dl.dropboxusercontent.com/s/5q1c6jq3w2sn1hr/slide-1.jpg" class="img-responsive">
						<div>
						<p>IERT has a long standing tradition of churning out industry stalwarts.<br> The successful alumni who have passed out as students from this<br> institution stand testimony to the standards of excellence maintained by<br> the institute. The students at IERT are bright, ambitious, team players <br> and serious about their academic progress.</p>
						</div></div>
						<section class="links">
                        <h1 class="section-heading text-highlight"><span class="line">Societies</span></h1>
                         <div class="col-md-3">
                         <p><a href="#"><img src="https://dl.dropboxusercontent.com/s/fpl7hghdorersf0/elektron1.png"></a></p>
						 <p>&nbsp;</p>
                        </div><!--//section-content-->
						<div class="col-md-3">
						<p><a href="#"><h3><em>Elektron</em></h3></a></p>
						<p><a href="#">Society of Electronics & IC</a></p>
						 <p> &nbsp;</p>
                        </div><!--//section-content-->
						<div class="col-md-3">
                         <p><a href="http://iert.org.in"><img src="https://dl.dropboxusercontent.com/s/i72uowznhqjt40r/reboot.png" ></a></p>
						 <p>&nbsp;</p>
                        </div><!--//section-content-->
						<div class="col-md-3">
						<p><a href="#"><h3><em>Reboot</em></h3></a></p>
                         <p><a href="#">Computer Science Society</a></p>
						 <p> &nbsp;</p>
                        </div><!--//section-content-->
</section><!--//links-->
                    </section>
                </div>
                <div class="col-md-3">
                    <?php include 'quick.php';?>
						<?php include 'testimonials.php';?>	
                    
                </div><!--//col-md-3-->
            </div><!--//cols-wrapper-->
            
        </div><!--//content-->
    </div><!--//wrapper-->
    
<?php include 'footer.php';?>