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
							  error_reporting(E_ALL ^ E_DEPRECATED);
							  $sql=$var="";
							$sq1=mysql_query("select max(id) as std from updates"); 
							$val=mysql_fetch_array($sq1);
							if(!$val)
							{echo "No Updates to display!";
							}else{
							$sq=$val['std'];
							   for($i=0;$i<3;$i++)
							   {
							   
							   $data=mysql_query("select * from updates where id='$sq' ");
								   while($info=mysql_fetch_array($data))
								   {
                         echo "  <div class='col-md-4 news-item'>
                                    <h2 class='title'><a href='news.php?id=".$sq."'>$info[heading]</a></h2>
                                    <img class='thumb' src='$info[image]'  height='100px' width='100px' />
                                    <p>$info[description]</p>	
                                    <a class='read-more' href='news.php?id=".$sq."'>Read more<i class='fa fa-chevron-right'></i></a>                
                                 </div><!--//news-item-->
							  ";  
							  $sq--;
							        }
							  }
							?>	
                              </div> <!--//item-->
                            <?php
							error_reporting(E_ALL ^ E_DEPRECATED);
														
							$j=$sq/3;
							for($i=0;$i<$j+1;$i++)
							{
							   
                          echo "<div class=\"item\"> ";
							     for($j=0;$j<3;$j++)
							      {
								  $data=mysql_query("select heading,image,description from updates where id='$sq' ");
								   while($info=mysql_fetch_array($data))
                                           {
                                             
                                           
                       echo "   <div class='col-md-4 news-item'>  
                                    <h2 class='title'><a href='news.php?id=".$sq."'>$info[heading]</a></h2>
                                    <img class='thumb' src='$info[image]'  height='100px' width='100px' />
                                    <p>$info[description]</p>
                                    <a class='read-more' href='news.php?id=".$sq."'>Read more<i class='fa fa-chevron-right'></i></a>                
                                </div><!--//news-item-->
								            
							";				
											} $sq--;
								  }
                               
								
							/*	<div class="col-md-4 news-item">
                                    <h2 class="title"><a href="news.php">Morbi at vestibulum turpis</a></h2>
                                    <p>Nam feugiat erat vel neque mollis, non vulputate erat aliquet. Maecenas ac leo porttitor, semper risus condimentum, cursus elit. Vivamus vitae libero tellus.</p>
                                    <a class="read-more" href="news.php">Read more<i class="fa fa-chevron-right"></i></a>
                                    <img class="thumb" src="assets/images/news/news-thumb-5.jpg"  alt="" />
                                </div><!--//news-item-->
                                <div class="col-md-4 news-item">
                                    <h2 class="title"><a href="news.php">Aliquam id iaculis urna</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum mauris eget sapien consectetur pellentesque. Proin elementum tristique euismod. </p>
                                    <a class="read-more" href="news.php">Read more<i class="fa fa-chevron-right"></i></a>
                                    <img class="thumb" src="assets/images/news/news-thumb-6.jpg"  alt="" />
                                </div><!--//news-item--> */
								
                           echo" </div> ";
							}
							}
							?>
                        </div><!--//carousel-inner-->
                    </div><!--//news-carousel-->  
                </div><!--//section-content-->     
            </section><!--//news-->