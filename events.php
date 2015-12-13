<section class="events">
                        <h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
                        <div class="section-content">
                           <?php
						   $sl="SELECT *FROM events order by id desc";
						   
						   $result=mysql_query($sl);
						   if(!$result)
						   {
						   echo 'No events to display!';
						   }else{
						   $i=0;
						   while($row=mysql_fetch_array($result))
						   {
							   	echo '<div class="event-item"><p class="date-label"><span class="month">'.$row['month'].'</span>';
								echo '<span class="date-number">'.$row['date'].'</span></p><div class="details"><h2 class="title">';
								echo $row['name'].'</h2><p class="time"><i class="fa fa-clock-o"></i>'.$row['time'].'</p><p class="location"><i class="fa fa-map-marker"></i>'.$row['name'].'</p></div></div>';
																
						   }
						   ?>
                           
                            <a class="read-more" href="events1.php">All events<i class="fa fa-chevron-right"></i></a>
							<p>&nbsp;</p>
							<?php }?>
                        </div><!--//section-content-->
                    </section><!--//events-->