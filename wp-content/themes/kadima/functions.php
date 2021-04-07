<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

/*------------------Testimonials------------------*/
function testimonials_post_type() {
	register_post_type( 'testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonials' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-id-alt',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail','custom-fields')
		)
	);
}
add_action( 'init', 'testimonials_post_type' );
add_shortcode( 'testimonials', 'show_testimonials' );

function show_testimonials(){
	$args = array(
		'post_type' => 'testimonials',
		'posts_per_page'=> 5
	);
	$testi_query = new WP_Query( $args );
	if ( $testi_query->have_posts() ) :
		$html= '<div class="jcarousel-wrapper">
		<div class="jcarousel">
			<ul>';
		while ( $testi_query->have_posts() ) : $testi_query->the_post();
		$html .= '<li>
						<div class="testimonials-slide">
							<div class="testimonial-top wrapper">
								'.get_the_post_thumbnail($post_id, array(70, 70), array("class" => "testimonial-img")).'
								<div class="name clearfix">
									<h6>'.get_the_title().'</h6>
									<img src="'.get_bloginfo('stylesheet_directory').'/images/stars.png" alt="rating" />
								</div>
							</div>
							<div class="testimonial-bottom wrapper">
								'.get_the_content().'
							</div>
						</div>
					</li>';
					
		endwhile;
		$html .= '</ul>
		</div>
		<p class="jcarousel-pagination"></p>
	</div>';
		wp_reset_postdata();
    endif;
return $html;
}

/*------------------Our-Classes------------------*/
function class_post_type() {
	register_post_type( 'classes',
		array(
			'labels' => array(
				'name' => __( 'Our Classes' ),
				'singular_name' => __( 'Our Classes' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-text-page',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail','custom-fields')
		)
	);
}
add_action( 'init', 'class_post_type' );
add_shortcode( 'classes', 'show_classes' );

function show_classes(){
	$args = array(
		'post_type' => 'classes',
		'posts_per_page'=> 5
	);
	$testi_query = new WP_Query( $args );
	if ( $testi_query->have_posts() ) :
		$html= '<div class="cms-grid-inner jcarousel-wrapper">
			<div class="jcarousel">
			<ul class="row">';
		while ( $testi_query->have_posts() ) : $testi_query->the_post();
		$html .= '<li class="grid-item">
					<div class="grid-item-inner">
						<div class="classes-item">
							<div class="entry-featured image-light-box">
							'.get_the_post_thumbnail($post_id, array(), array("class" => "attachment-full")).'
							</div>
							<div class="entry-body">
								<h3 class="entry-title">'.get_the_title().'</h3>
								<div class="entry-content">
									'.get_the_content().'
								</div>
								<div class="entry-meta">
									<div class="item-box">
										<label>Age</label>
										<div class="box-value"> <span>'.get_post_meta( get_the_ID(), 'Age', true ).'</span></div>
									</div>
									<div class="item-box">
										<label>Size</label>
										<div class="box-value"> <span>'.get_post_meta( get_the_ID(), 'Size', true ).'</span></div>
									</div>
									<div class="item-box">
										<label>Price</label>
										<div class="box-value"> <span>'.get_post_meta( get_the_ID(), 'Price', true ).'</span></div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				  </li>';
					
		endwhile;
		$html .= '</ul>
		</div>
		<a href="#" class="jcarousel-control-prev1">&lsaquo;</a>
		<a href="#" class="jcarousel-control-next1">&rsaquo;</a>
	</div>';
		wp_reset_postdata();
    endif;
return $html;
}

/*------------------Our-Teachers------------------*/
function teachers_post_type() {
	register_post_type( 'teacher',
		array(
			'labels' => array(
				'name' => __( 'Our Teachers' ),
				'singular_name' => __( 'Our Teachers' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-businessperson',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail','custom-fields')
		)
	);
}
add_action( 'init', 'teachers_post_type' );
add_shortcode( 'teachers', 'show_teachers' );

function show_teachers($atts){
	$atts = shortcode_atts(
        array(
            'limit' => '2',
        ), $atts);
	$args = array(
		'post_type' => 'teacher',
		'posts_per_page'=> $atts['limit']
	);
	$testi_query = new WP_Query( $args );
	if ( $testi_query->have_posts() ) :
		$html= '';
		while ( $testi_query->have_posts() ) : $testi_query->the_post();
		$html .= '<div class="grid-item col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" >
						<div class="team-item">
							<div class="item--inner ">
								<div class="item--image">
									'.get_the_post_thumbnail($post_id, array(320, 290), array("class" => "attachment-full")).'
								</div>
								<div class="item-holder">
									<h3 class="item--title">
										'.get_the_title().'
									</h3>
									<div class="item--position">
										'.get_the_content().'
									</div>
									<div class="item--social">
										<div class="inner-social">
											<a target="_blank" href="'.get_post_meta( get_the_ID(), 'Facebook', true ).'"><i class="fa fa-facebook-f"></i> </a> 
											<a target="_blank" href="'.get_post_meta( get_the_ID(), 'Twitter', true ).'"><i class="fa fa-twitter"></i> </a> 
											<a target="_blank" href="'.get_post_meta( get_the_ID(), 'Instagram', true ).'"><i class="fa fa-instagram"></i> </a> 
											<a target="_blank" href="'.get_post_meta( get_the_ID(), 'Skype', true ).'"><i class="fa fa-skype"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
		endwhile;
		$html .= '';
		wp_reset_postdata();
    endif;
return $html;
}

/*------------------Gallery------------------*/
function gallery_post_type() {
	register_post_type( 'gallery',
		array(
			'labels' => array(
				'name' => __( 'Our Gallery' ),
				'singular_name' => __( 'Our Gallery' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-format-image',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail','custom-fields')
		)
	);
}
add_action( 'init', 'gallery_post_type' );
add_shortcode( 'gallery', 'show_gallery' );

function show_gallery( $atts ){
	$atts = shortcode_atts(
        array(
            'limit' => '2',
        ), $atts);

	$args = array(
		'post_type' => 'gallery',
		'posts_per_page'=> $atts['limit']
	);
	$testi_query = new WP_Query( $args );
	if ( $testi_query->have_posts() ) :
		$html= '
			<div class="filter-button-group js-radio-button-group text-center">
			  <button class="button is-checked" data-filter="*">All</button>
			  <button class="button" data-filter=".activities">Activites</button>
			  <button class="button" data-filter=".classes">Classes</button>
			  <button class="button" data-filter=".event">Event</button>
			  <button class="button" data-filter=".outing">Outing</button>
			</div>
		<div class="grid row">';
		while ( $testi_query->have_posts() ) : $testi_query->the_post();
		$html .= '<div class="col-md-4 element-item '.get_post_meta( get_the_ID(), 'gallert-cat', true ).'">
					'.get_the_post_thumbnail($post_id, array(500,333), array("class" => "attachment-full")).'
				  </div>';
		endwhile;
		$html .= '</div>';
		wp_reset_postdata();
    endif;
return $html;
}

/*-----------------Event----------------------*/

add_action('admin_enqueue_scripts', 'my_admin_theme_script');

function my_admin_theme_script() {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'wp-jquery-date-picker', get_template_directory_uri() . '/js/admin.js' );
	
}
function esad_admin_styles() {
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css',false,'1.1','all');	
}
add_action('admin_print_styles', 'esad_admin_styles');


function save_custom_event_meta($post_id) {
  global $post, $event_meta;
	// verify nonce
	if (!wp_verify_nonce($_POST['event_time_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['event_location_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['event_date_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['event_end_date_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['organizer_name_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['organizer_phone_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['organizer_email_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
	
	$event_meta['organizer_name'] = $_POST['organizer_name'];
	$event_meta['organizer_phone'] = $_POST['organizer_phone'];
	$event_meta['organizer_email'] = $_POST['organizer_email'];
	$event_meta['event_time'] = $_POST['event_time'];
	$event_meta['event_location'] = $_POST['event_location'];
	$event_meta['event_end_date'] = date('Y-m-d',strtotime($_POST['event_end_date']));
	$event_meta['event_date'] = date('Y-m-d',strtotime($_POST['event_date']));

    // Add values of $events_meta as custom fields
    foreach ($event_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'save_custom_event_meta');

// Event post type
$event_labels = array(
	'name' => _x('Events', 'post type general name'),
	'singular_name' => _x('Event', 'post type singular name'),
	'add_new' => _x('Add New', 'Event'),
	'add_new_item' => __("Add New Event"),
	'edit_item' => __("Edit Event"),
	'new_item' => __("New Event"),
	'view_item' => __("View Events"),
	'search_items' => __("Search Events"),
	'not_found' =>  __('No Events found'),
	'not_found_in_trash' => __('No Events found in Trash'),
	'parent_item_colon' => ''
);
register_post_type( 'event',
	array(
		'hierarchical' => true,
		'labels' => $event_labels,
		'public' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-businessman',
		'show_ui' => true,
		'exclude_from_search' => true,
		'supports' => array (  'title','editor', 'thumbnail' ),
	)
);

add_action('admin_init', 'custom_meta_vale');
function custom_meta_vale() {
	add_meta_box('custom_info', __('Extra Event Fields', 'quotable'), 'event_extra_info', array( 'event'), 'side', 'low');
}

function event_extra_info(){
	global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="event_date_noncename" id="event_date_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="event_time_noncename" id="event_time_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="event_end_date_noncename" id="event_end_date_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="event_location_noncename" id="event_location_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="organizer_name_noncename" id="organizer_name_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="organizer_phone_noncename" id="organizer_phone_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="organizer_email_noncename" id="organizer_email_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the default_product data if its already been entered
  
	echo '<label>Organizer Name</label><br/><input style="width:100%;" type="text" name="organizer_name" id="organizer_name" value="' . esc_attr( get_post_meta( get_the_ID(), 'organizer_name', true) ). '" /><br/><br/>';
	echo '<label>Organizer Phone</label><br/><input style="width:100%;" type="text" name="organizer_phone"  id="organizer_phone" value="' . esc_attr( get_post_meta( get_the_ID(), 'organizer_phone', true) ). '" /><br/><br/>';
	echo '<label>Organizer Email</label><br/><input style="width:100%;" type="text" name="organizer_email" id="organizer_email" value="' . esc_attr( get_post_meta( get_the_ID(), 'organizer_email', true) ). '" /><br/><br/>';
	echo '<label>Event Date</label><br/><input style="width:100%;" type="text" name="event_date" class="datepicker" id="event_date" value="' . esc_attr( get_post_meta( get_the_ID(), 'event_date', true) ). '" /><br/><br/>';
	echo '<label>Event End Date</label><br/><input style="width:100%;" type="text" name="event_end_date" class="datepicker" id="event_end_date" value="' . esc_attr( get_post_meta( get_the_ID(), 'event_end_date', true) ). '" /><br/><br/>';
	echo '<label>Event Time</label><br/><input style="width:100%;" type="text" name="event_time" id="event_time" value="' . esc_attr( get_post_meta( get_the_ID(), 'event_time', true) ). '" /><br/><br/>';
	echo '<label>Event Location</label><br/><textarea rows="2" style="width:100%;"  name="event_location" id="event_location"  />' . esc_attr( get_post_meta( get_the_ID(), 'event_location', true) ). '</textarea><br/><br/>';
}

/*---------------------Upcoming-Event-shortcode----------------------------*/

add_shortcode('upcoming_event_list','upcoming_event_list_shortcode');
function upcoming_event_list_shortcode(){
	$today= date('Y-m-d');query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'meta_query'=>array(
		'key'=>'event_date',
		'value'=> $today,
		'compare'=> '>='
	),
	'order'=>'ASC' ));
		if(have_posts()) {
		while(have_posts()) : the_post();
		$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$result .='
			<div class="grid-item col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
				<div class="grid-item-inner">
					<div class="cmsevents-item">
						<div class="entry-featured" style="background-image: url('. get_the_post_thumbnail_url().');"></div>
						<div class="entry-body">
							<h3 class="entry-title"><a href="'. get_permalink() .'"> '. get_the_title() .'</a></h3>
							<div class="entry-meta">
							<div class="item-box item-box-date"> <label><i class="fa fa-calendar"></i> Start day: </label> <span>'. date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).', '.date("Y", strtotime($event_date)).'</div>
							<div class="item-box item-box-time"> <label><i class="fa fa-clock-o"></i> Time: </label> <span>'. get_post_meta(get_the_ID(),'event_time', true) .'</span></div>
							<div class="item-box item-box-place"> <label><i class="fa fa-map-marker"></i> Place: </label> <span>'. get_post_meta(get_the_ID(),'event_location', true) .'</span></div>
							</div>
							<div class="entry-readmore"> <a class="btn-more" href="'. get_permalink() .'">Read more <i class="fa fa-long-arrow-right"></i> </a></div>
						</div>
					</div>
				</div>
			</div>
			';
		endwhile; wp_reset_query();
		} else {
			echo '<div class="text-center"><div class="date text-center"><h3>No Upcoming Event</h3></div></div>';
		}
return $result; }

/*---------------------Past-Event-shortcode----------------------------*/

add_shortcode('past_event_list','past_event_list_shortcode');
function past_event_list_shortcode(){
	$today= date('Y-m-d');
	query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'meta_query'=>array(
		'key'=>'event_date',
		'value'=> $today,
		'compare'=> '<'
	),
	'order'=>'DESC' ));
		if(have_posts()) {
		while(have_posts()) : the_post();
		$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$result .='
			<div class="event-box '.strtotime($event_date).'">
				<div class="row align-items-center">
					<div class="col-md-3 date">
						<h3>'. date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).'<br /> '.date("Y", strtotime($event_date)).'</h3>
						<p>'. get_post_meta(get_the_ID(),'event_location', true) .'</p>
					</div>
					<div class="col-md-9 event-detail">
						<h2><a href="'. get_permalink() .'"> '. get_the_title() .'</a></h2>
						'. get_the_excerpt() .'
					</div>
				</div>
			</div>';
		endwhile; wp_reset_query();
		} else{
			echo '<div class="event-box"><div class="date text-center"><h3>No Past Event</h3></div></div>';
		}
return $result; }

add_shortcode('upcoming_event_countdown_script','upcoming_event_countdown_script_shortcode');
function upcoming_event_countdown_script_shortcode(){
	$today= date('Y-m-d');query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
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
		$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$result .='
			<script>
				// The data/time we want to countdown to 
				var countDownDate = new Date("'. date("m", strtotime($event_date)).' '.date("d", strtotime($event_date)).', '.date("Y", strtotime($event_date)).' 00:00:00").getTime();
				// Run myfunc every second
				var myfunc = setInterval(function() {

				var now = new Date().getTime();
				var timeleft = countDownDate - now;
					
				// Calculating the days, hours, minutes and seconds left
				var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
				var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
					
				// Result is output to the specific element
				document.getElementById("days").innerHTML = days
				document.getElementById("hours").innerHTML = hours
				document.getElementById("minutes").innerHTML = minutes 
				document.getElementById("seconds").innerHTML = seconds 
					
				// Display the message when countdown is over
				if (timeleft < 0) {
					clearInterval(myfunc);
					document.getElementById("days").innerHTML = "00"
					document.getElementById("hours").innerHTML = "00" 
					document.getElementById("minutes").innerHTML = "00"
					document.getElementById("seconds").innerHTML = "00"
					document.getElementById("end").innerHTML = "TIME UP!!";
				}
				}, 1000);
			</script>
			';
		endwhile; wp_reset_query();
		} 
return $result; }




function content($num) {
	$theContent = get_the_content();
	$output = preg_replace('/<img[^>]+./','', $theContent);
	$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
	$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
	$limit = $num+1;
	$content = explode(' ', $output, $limit);
	array_pop($content);
	$content = implode(" ",$content)."...";
	echo $content;
}