<section class="testimonials">
                        <h1 class="section-heading text-highlight"><span class="line"> Testimonials</span></h1>
                        <div class="carousel-controls">
                            <a class="prev" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                            <a class="next" href="#testimonials-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                        </div><!--//carousel-controls-->
                        <div class="section-content">
                            <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <blockquote class="quote">                                  
                                            <p><i class="fa fa-quote-left"></i>
											It is time to realize that the finest society can be developed by using creative minds in the advanced areas of Science and Engineering. In such spirits we have come up with this effort where students are being groomed to reach the pinnacle of success.</p>
                                        </blockquote>                
                                        <div class="row">
                                            <p class="people col-md-8 col-sm-3 col-xs-8"><span class="name">V. K. Mishra</span><br /><span class="title">Director, IERT</span></p>
                                            <img class="profile col-md-4 pull-right img-circle" src="https://dl.dropboxusercontent.com/s/s8tecfful85r56p/vimal_mishra.png"  alt="" />
                                        </div>                               
                                    </div><!--//item-->
									
                                    <?php if(isset($_SESSION['user'])){
                                        $username=$_SESSION['user'];
                                        $row=mysql_fetch_array(mysql_query("SELECT username, about, year from users where username='$username' "));
                                        ?>
                                    <div class="item">
                                        <blockquote class="quote">
                                            <p><i class="fa fa-quote-left"></i>
                                            <?php echo $row['about']; ?></p>
                                        </blockquote>
                                        <div class="row">
                                            <p class="people col-md-8 col-sm-3 col-xs-8"><span class="name"><?php echo $username; ?></span><br /><span class="title"> <?php echo $row['year']." year"; ?> </span></p>
                                            <img class="profile col-md-4 pull-right" src="assets/images/testimonials/profile.png"  alt="Profile Pic" />
                                        </div>                 
                                    </div>
                                    <?php } ?>
                                    <!--//item-->
									<!--
                                    <div class="item">
                                        <blockquote class="quote">
                                            <p><i class="fa fa-quote-left"></i>
                                            I'm delighted commodo gravida ultrices. Sed massa leo, aliquet non velit eu, volutpat vulputate odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor metus eros, ut fringilla nulla auctor a.</p>
                                        </blockquote>
                                        <div class="row">
                                            <p class="people col-md-8 col-sm-3 col-xs-8"><span class="name">Kate White</span><br /><span class="title"> Gravida ultrices</span></p>
                                            <img class="profile col-md-4 pull-right" src="assets/images/testimonials/profile-3.png"  alt="" />
                                        </div>                 
                                    </div><!--//item-->
                                    
                                </div><!--//carousel-inner-->
                            </div><!--//testimonials-carousel-->
                        </div><!--//section-content-->
                    </section><!--//testimonials-->