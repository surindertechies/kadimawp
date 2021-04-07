<?php
/**
Template Name: Events
**/
get_header(); ?>
<section class="events">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-5">
				<h6 class="orange-color fs20 text-uppercase">Events are ongoing and about to take place</h6>
				<h2 class="mt-3">Our Events</h2>
				<hr />
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a viverra arcu. Nullam ac nisl in<br /> nunc consequat fermentum in in nisi.</p>
			</div>
		</div>
		<!--events-box-->
		<div class="cms-grid cms-cmsevents-grid layout2">
			<div class="cms-grid-inner cms-grid-masonry animation-time">
				<div class="row">
				<!--event-container-->
					<?php echo do_shortcode('[upcoming_event_list]');?>
				<!--event-container-end-->
				</div>
			</div>
		</div>			 
		<!--events-box-end-->
	</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" style="background-image: url(images/bg-events-page-title1.jpg);">
	<div class="elementor-background-overlay"></div>
	<div class="elementor-container elementor-column-gap-default ">
	   <div class="elementor-row">
		  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element">
			 <div class="elementor-column-wrap elementor-element-populated">
				<div class="elementor-widget-wrap">
				   <div class="elementor-element elementor-widget elementor-widget-cms_countdown_time">
					  <div class="elementor-widget-container">
						 <div class="cms-count-down layout2 ">
							<div class="item-box-title">
								<?php $today= date('Y-m-d');query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'posts_per_page' =>1,
	'meta_query'=>array(
		'key'=>'event_date',
		'value'=> $today,
		'compare'=> '>='
	),
	'order'=>'ASC' ));
		if(have_posts()) {
		while(have_posts()) : the_post();
		$event_date = get_post_meta(get_the_ID(),'event_date', true); ?>
							   <div class="item-date-feature"> <?php echo date("F j, Y, g:i A", strtotime($event_date));?></div>
							   <h3 class="item--title"><?php echo get_the_title()?></h3>
							   <?php endwhile; wp_reset_query();
							   } else{ ?>
								<h3 class="item--title">No Any Upcoming Event.</h3>
		<?php }  ?>
							   
							</div>
							<div class="cms-count-down-container font-smooth" id="clockdiv">
							   <div class="time-item">
								  <div class="time-item-inner">
									 <div id="days" class="days inner-number">00</div>
									 <div class="inner-text">Days</div>
								  </div>
							   </div>
							   <div class="time-item">
								  <div class="time-item-inner">
									 <div id="hours" class="hours inner-number">00</div>
									 <div class="inner-text">Hours</div>
								  </div>
							   </div>
							   <div class="time-item">
								  <div class="time-item-inner">
									 <div id="minutes" class="minutes inner-number">00</div>
									 <div class="inner-text">Minutes</div>
								  </div>
							   </div>
							   <div class="time-item">
								  <div class="time-item-inner">
									 <div id="seconds" class="seconds inner-number">00</div>
									 <div class="inner-text">Seconds</div>
								  </div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				   <?php echo do_shortcode('[upcoming_event_countdown_script]') ;?>
				   <div class="elementor-element elementor-widget elementor-widget-cms_button" data-id="4b730fde" data-element_type="widget" data-widget_type="cms_button.default">
					  <div class="elementor-widget-container">
						 <div id="cms_button-4b730fde" class="cms-button-wrapper cms-button-layout1 "> <a class="pink-button" href="#" target="_blank"> <span class="btn-text"> View All Events </span> </a></div>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</section>
<section class="our-teacher cms-team-grid1">
	<div class="container">
		<div class="cms-grid-inner cms-grid-masonry row justify-content-center">
			<div class="col-md-12 text-center mb-5">
				<h6 class="orange-color fs20 text-uppercase">About the Teachers</h6>
				<h2 class="mt-3">Our Teachers</h2>
				<hr />
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a viverra arcu. Nullam ac nisl in<br /> nunc consequat fermentum in in nisi.</p>
			</div>
			<?php echo do_shortcode('[teachers limit="6"]');?>
		</div>
	</div>
</section>
<?php get_footer(); ?>