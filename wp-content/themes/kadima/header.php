<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage Kadima School
 * @since Kadima School 1.0
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/css/jcarousel.connected-carousels.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/style.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/css/jcarousel.responsive.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory')?>/css/responsive.css">
</head>
<body>
<div id="wrap">
<section class="d-flex align-items-center top-bar">
	<div class="container">
		<ul class="left-side-bar">
			<li><a href="tel:8886661234"><i class="fa fa-mobile"></i> 888 666 1234</a></li>
			<li><a href="#"><i class="fa fa-map-marker"></i> 9 Suite 12000 San Francisco</a></li>
			<li><a href="#"><i class="fa fa-clock-o"></i> 8 Mon-Sat Sam - Spm, Sun Closed</a></li>
		</ul>
		<ul class="right-side-bar">
			<li><a class="blue-bg" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a class="yello-bg" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li><a class="red-bg" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a class="green-bg" href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</section>
<section class="header">
	<div class="container">
		<div class="row">
			<nav class="col-md-12 navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="/kadima/wp/"><img src="<?php echo bloginfo('template_directory')?>/images/logo.png" alt="Kadima School" /></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<?php 
					wp_nav_menu( array(
						'container' => 'ul',
						'menu_class'=> 'navbar-nav ml-auto'
					 ) );
					?>
					<div class="search-btn" data-toggle="modal" data-target="#exampleModalCenter">
						<img src="<?php echo bloginfo('template_directory')?>/images/search-icon.png" alt="search" />
					</div>
				</div>
			</nav>
		</div>
	</div>
</section>
<?php if(is_page('home')) {?>
<section id="banner">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?php echo bloginfo('template_directory')?>/images/banner-image-1.jpg" class="d-block w-100" alt="Banner">
				<div class="carousel-caption first-banner-box">
					<h1>Kadima School</h1>
					<p>A brighter future for all.</p>
					<a href="#" class="green-button">Enrol Now!</a>
				</div>
			</div>
			<div class="carousel-item">
				<img src="<?php echo bloginfo('template_directory')?>/images/banner-image-1.jpg" class="d-block w-100" alt="Banner">
				<div class="carousel-caption first-banner-box">
					<h1>Kadima School</h1>
					<p>A brighter future for all.</p>
					<a href="#" class="green-button">Enrol Now!</a>
				</div>
			</div>
			<div class="carousel-item">
				<img src="<?php echo bloginfo('template_directory')?>/images/banner-image-1.jpg" class="d-block w-100" alt="Banner">
				<div class="carousel-caption first-banner-box">
					<h1>Kadima School</h1>
					<p>A brighter future for all.</p>
					<a href="#" class="green-button">Enrol Now!</a>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="arrow-box"><span class="carousel-control-prev-icon" aria-hidden="true"></span></span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="arrow-box"><span class="carousel-control-next-icon" aria-hidden="true"></span></span>
		</a>
	</div>
</section>
<?php } else { ?>
<section class="breadcrumb d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h3><?php the_title();?></h3>
			</div>
			<div class="col-md-5">
				<ul>
					<li><a href="/kadima/wp/">Home</a></li>
					<li><?php the_title();?></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php } ?>