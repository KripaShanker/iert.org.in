<?php 
include 'header.php';?>

        <?php include 'navi.php';?>
  <!-- ******CONTENT****** --> 
        <div class="content container">
            <div id="promo-slider" class="slider flexslider">
                <ul class="slides">
                    <li>
                        <img src="assets/images/slides/slide-1.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >Join a tradition of Knowledge & trust</span>
                            <br />
                            <span class="secondary clearfix" >Choose from over 50 career courses</span>
                        </p>
                    </li>
                 
                    <li>
                        <img src="assets/images/slides/slide-4.jpg"  alt="" />
                        <p class="flex-caption">
                            <span class="main" >Engineering Degree Division</span>
                            <br />
                            <span class="secondary clearfix" >Established in 2001</span>
                        </p>
                    </li>
                </ul><!--//slides-->
            </div><!--//flexslider-->
          
		  
		  
		  
		  
		  <section class="news">
                <h1 class="section-heading text-highlight"><span class="line">Latest News</span></h1>     
                <div class="carousel-controls">
                    <a class="prev" href="#news-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                    <a class="next" href="#news-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                </div><!--//carousel-controls--> 
                <div class="section-content clearfix">
                    <div id="news-carousel" class="news-carousel carousel slide">
                        <div class="carousel-inner">
                             <div class="item active"> 
							<?php
							echo "No Updates to display!";
							?>
                        </div><!--//carousel-inner-->
                    </div><!--//news-carousel-->  
                </div><!--//section-content-->     
            </section><!--//news-->
			
			
			
            <div class="row cols-wrapper">
                <div class="col-md-3">
                   <?php include 'events.php';?>
                </div><!--//col-md-3-->
                <div class="col-md-6">
                    <h1 class="section-heading text-highlight"><span class="line">IERT, Allahabad</span></h1>
                    <div>
						<img src="assets/images/iert.jpg">
						<div>
						<p>IERT has a long standing tradition of churning out industry stalwarts.<br> The successful alumni who have passed out as students from this<br> institution stand testimony to the standards of excellence maintained by<br> the institute. The students at IERT are bright, ambitious, team players <br> and serious about their academic progress.</p>
						</div></div>
						<?php include 'society.php';?>
                    </section>
                </div>
                <div class="col-md-3">
                    <?php include 'quick.php';?>
						<?php include 'testimonials.php';?>	
                    
                </div><!--//col-md-3-->
            </div><!--//cols-wrapper-->
            <?php include 'companies.php';?>
        </div><!--//content-->
    </div><!--//wrapper-->
    
<?php include 'footer.php';?>