<?php
/**
 * The template for displaying all single event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); the_post(); ?>
<section class="events">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
						<div class="connected-carousels">
							<div class="stage">
								<div class="carousel carousel-stage" data-jcarousel="true">
									<ul style="left: 0px; top: 0px;">
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
										<li><img src="<?php echo bloginfo('template_directory')?>/images/slider-image.jpg" alt="Slider"></li>
									</ul>
								</div>
								<p class="photo-credits">
									Photos by <a href="http://www.mw-fotografie.de">Marc Wiegelmann</a>
								</p>
								<a href="#" class="prev prev-stage inactive" data-jcarouselcontrol="true"><span>‹</span></a>
								<a href="#" class="next next-stage" data-jcarouselcontrol="true"><span>›</span></a>
							</div>
			
							<div class="navigation">
								<!--<a href="#" class="prev prev-navigation inactive" data-jcarouselcontrol="true">‹</a>
								<a href="#" class="next next-navigation" data-jcarouselcontrol="true">›</a>-->
								<div class="carousel carousel-navigation" data-jcarousel="true">
									<ul style="left: 0px; top: 0px;">
										<li data-jcarouselcontrol="true" class="active"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										<li data-jcarouselcontrol="true"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										<li data-jcarouselcontrol="true"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										<li data-jcarouselcontrol="true"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										<li data-jcarouselcontrol="true"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										<li data-jcarouselcontrol="true"><img src="<?php echo bloginfo('template_directory')?>/images/slider-thumb.jpg" alt="Thumbnail"></li>
										
									</ul>
								</div>
							</div>
						</div>
                        <div class="elementor-element elementor-widget elementor-widget-cms_heading">
                            <div class="elementor-widget-container">
                               <div class="cms-heading-wrapper cms-heading-layout1 ">
                                  <h3 class="custom-heading"><span> Description of the event</span></h3>
                                  <div class="custom-heading-description"> 
                                    <?php the_content() ;?>
                                  </div>

                                  <div class="elementor-widget-divider"></div>
                                  <h3 class="custom-heading fs30 mb-5">Event Location</h3>
								  <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="450" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                               </div>
                            </div>
                         </div>

                    </div>

                    <div class="col-md-4 events-info">
						<div class="cms-cmsevents-info">
							<div class="event-list-info inner-layout mb-4">
								<div class="class-el-title"> Price: <span>Free</span> /Day</div>
								<ul class="cmsevents-list">
								<li class="cmsevents-item-info"> <label><i class="fa fa-users"></i>Organizer Name:</label><?php echo get_post_meta($post->ID, 'organizer_name', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-phone"></i>Phone:</label><?php echo get_post_meta($post->ID, 'organizer_phone', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-envelope"></i>Email:</label><?php echo get_post_meta($post->ID, 'organizer_email', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-calendar"></i>Start day:</label><?php echo get_post_meta($post->ID, 'event_date', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-calendar"></i>End day:</label><?php echo get_post_meta($post->ID, 'event_end_date', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-clock-o"></i>Time:</label><?php echo get_post_meta($post->ID, 'event_time', true);?></li>
								<li class="cmsevents-item-info"> <label><i class="fa fa-map-marker"></i>Location:</label><?php echo get_post_meta($post->ID, 'event_location', true);?></li>
								</ul>
							</div>
						 </div>

						 <div class="cms-cmsevents-list">
							<div class="event-post inner-layout">
								<div class="class-el-title">
									<h3 class="custom-heading">Upcoming Events</h3>
								</div>
								<div class="class-list-item">
								<div class="cmsevents-item">
									<div class="entry-featured"> <a href="#"> <img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/post-thumbnail.jpg" alt="gallery-5" title="gallery-5"> </a></div>
									<div class="entry-body">
										<h3 class="entry-title"> <a href="#"> Hang Out In The National Park </a></h3>
										<div class="entry-price"> <span class="item-price">August 31, 2020</span></div>
									</div>
								</div>
								<div class="cmsevents-item">
									<div class="entry-featured"> <a href="#"> <img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/post-thumbnail.jpg" alt="gallery-5" title="gallery-5"> </a></div>
									<div class="entry-body">
										<h3 class="entry-title"> <a href="#"> Cake Party </a></h3>
										<div class="entry-price"> <span class="item-price">August 31, 2020</span></div>
									</div>
								</div>
								<div class="cmsevents-item">
									<div class="entry-featured"> <a href="#"> <img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/post-thumbnail.jpg" alt="gallery-5" title="gallery-5"> </a></div>
									<div class="entry-body">
										<h3 class="entry-title"> <a href="#"> Camp Kindergarten </a></h3>
										<div class="entry-price"> <span class="item-price">August 31, 2020</span></div>
									</div>
								</div>
								</div>
							</div>
						 </div>
						 
                    </div>

                </div>
            </div>
        </section>

<?php get_footer();
