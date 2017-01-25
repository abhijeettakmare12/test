<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$query_args = array(
			'family' => urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}


define("SHOW_PER_PAGE","6");
define("BLOG","14");
define("GET_PAID","73");
define("CALL_US_TODAY","77");

add_action('widgets_init','create_widget');

function create_widget(){
   register_widget('Category_widget'); register_widget('Quote_widget');
}



class Category_widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	 
	function __construct() {
		parent::__construct(
			'category_widget', // Base ID
			'Category Widget', // Name
			array( 'description' => __( 'Category (NIA)', 'text_domain' ), ) // Args
		);
	}



	public function widget( $args, $instance ) {
		global $wpdb;		
		$title = apply_filters('widget_title',strip_tags($instance['title']));
			

		$widget_text.='<section>
							<h3>'.$title.'</h3>
							<ul class="asidelist">';
		$categories = get_terms("category",array('hide_empty'=>0));	
		foreach($categories as $cat_val){
			if($cat_val->term_id!=1){
			 $widget_text.='<li><a href="'.get_category_link($cat_val->term_id).'">'.
			 $cat_val->name.'</a></li>';
			 }
		}
		$widget_text.='</ul>	
						</section>';									
		echo $widget_text;			
	}



	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = "CATEGORIES";
		}
										
		?>
		
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" 
			id="<?php echo $this->get_field_id('title');?>" value="<?php echo esc_attr( $title ); ?>"  />
		</p>								    
		<?php 
	}
	

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ?  strip_tags($new_instance['title']) : '';		
		return $instance;
	}
}


class Quote_widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	 
	function __construct() {
		parent::__construct(
			'quote_widget', // Base ID
			'Quote Widget', // Name
			array( 'description' => __( 'Quote (NIA)', 'text_domain' ), ) // Args
		);
	}



	public function widget( $args, $instance ) {
		global $wpdb;		
		$title = apply_filters('widget_title',strip_tags($instance['title']));
		
		if($_POST['quote']){
		$quote_name=$_POST['quote_name'];
		$quote_phone=$_POST['quote_phone'];
		$quote_email=$_POST['quote_email'];
		$quote_insurance=$_POST['quote_insurance'];
		$quote_comment=$_POST['quote_comment'];	
		
		$subject="National Insurance Advisors - Free Insurance Quote Details";	
				
		$message_text.="<strong>Name: </strong>".$quote_name."<br><br>";
		$message_text.="<strong>Phone: </strong>".$quote_phone."<br><br>";	
		$message_text.="<strong>Email: </strong>".$quote_email."<br><br>";
		$message_text.="<strong>Insurance: </strong>".$quote_insurance."<br><br>";
		$message_text.="<strong>Comment: </strong>".stripslashes($quote_comment)."<br><br>";
				
		
		$to=get_option('admin_email');			
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$quote_email>" . "\r\n";
		@mail($to,$subject,$message_text,$headers);
				
		$quote_msg="Message sent successfully";
	}
			

		$widget_text.='<form class="bannerform" onSubmit="return checkQuoteForm()" method="post">
							<h1>'.$title.'</h1>';
							if($quote_msg){
								$widget_text.='<span style="color:#009900;font-weight:bold;">'.$quote_msg.'</span>';
							}
		$widget_text.='<div class="row">
							<div class="col-xs-6 col-sm-12">
								<input type="text" name="quote_name" id="quote_name" placeholder="Full Name" onBlur="checkField(\'quote_name\',\'span_quote_name\',\'normal\')">
								<span style="color:#FF0000; display:none;" id="span_quote_name"></span>
							</div>								
							<div class="col-xs-6 col-sm-12">
								<input type="text" name="quote_phone" id="quote_phone" placeholder="Phone" onBlur="checkField(\'quote_phone\',\'span_quote_phone\',\'phone\')">
								<span style="color:#FF0000; display:none;" id="span_quote_phone"></span>
							</div>
							<div class="col-xs-6 col-sm-12">
								<input type="text" name="quote_email" id="quote_email" id="" placeholder="Email" onBlur="checkField(\'quote_email\',\'span_quote_email\',\'email\')">
								<span style="color:#FF0000; display:none;" id="span_quote_email"></span>
							</div>
							<div class="col-xs-6 col-sm-12">
								<select name="quote_insurance" id="quote_insurance">
									<option value="Life Insurance">Life Insurance</option>
									<option value="Health Insurance">Health Insurance</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-12">
								<textarea name="quote_comment" id="quote_comment" placeholder="Comments" onBlur="checkField(\'quote_comment\',\'span_quote_comment\',\'normal\')"></textarea>
								<span style="color:#FF0000; display:none;" id="span_quote_comment"></span>
							</div>
							</div>
							<input type="submit" name="quote" value="submit info">
						</form>';									
		echo $widget_text;			
	}



	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = "FREE INSURANCE QUOTE";
		}
										
		?>
		
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" 
			id="<?php echo $this->get_field_id('title');?>" value="<?php echo esc_attr( $title ); ?>"  />
		</p>								    
		<?php 
	}
	

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ?  strip_tags($new_instance['title']) : '';		
		return $instance;
	}
}

//include('admin/homepage-leads-records.php');
include(TEMPLATEPATH . '/admin/homepage-leads-records.php');
add_action('admin_menu', 'homepage_leads_plugin_setup_menu');
 
function homepage_leads_plugin_setup_menu(){
add_menu_page( 'Leads Plugin Page', 'Leads Records - Homepage', 'manage_options', 'homepage-leads-records', 'home_leads_init' );
}

function home_leads_init(){
        $admin_data = new Homepage_Functionality();
}

add_action('wp_ajax_nopriv_export_csv_request', 'export_leads_data');
add_action('wp_ajax_export_csv_request', 'export_leads_data');

function homepage_export_leads_data() {
	define('SSM_PLUGIN_PATH', plugin_dir_path(__FILE__));
    include('dompdf/dompdf_config.inc.php');
    //$output= "hi";
    global $wpdb;
	
    $table_name = 'free_insurance_quotes';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=leads_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Id', 'Full Name', 'Phone', 'Email', 'Insurance', 'comments'));
    $data = $wpdb->get_results("SELECT quote_id,quote_name, quote_phone, quote_email, quote_insurance, quote_comment");

    for ($i = 0; $i < count($data); $i++) {

fputcsv($output, array($data[$i]->quote_id, $data[$i]->quote_name, $data[$i]->quote_phone, $data[$i]->quote_email, $data[$i]->quote_insurance, $data[$i]->quote_comment));
    }

    fclose($output);
    die;
}


function pu_theme_menu()
{
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'pu_theme_options.php', 'pu_theme_page'); 
}

add_action('admin_menu', 'pu_theme_menu');

function pu_theme_page()
{
?>
    <div class="section panel">
      <h1>Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
        <?php 
          settings_fields('pu_theme_options'); 
        
          do_settings_sections('pu_theme_options.php');
        ?>
		<!--<tr valign="top">
			<th scope="row">Upload Image</th>
			<td><label for="upload_image">
			<input id="upload_image" type="text" size="36" name="upload_image" value="" />
			<input id="upload_image_button" type="button" value="Upload Image" />
			</label></td>
		</tr>	-->	

            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>  
            
      </form>      
    </div>
    <?php
}


add_action( 'admin_init', 'pu_register_settings' );

/**
 * Function to register the settings
 */


function pu_register_settings()
{
    // Register the settings with Validation callback
    //register_setting( 'pu_theme_options', 'pu_theme_options', 'pu_validate_settings' );
	register_setting( 'pu_theme_options', 'pu_theme_options');

    // Add settings section
    add_settings_section( 'pu_text_section', '', 'pu_display_section', 'pu_theme_options.php' );

    // Create textbox field
    $field_args1 = array(
      'type'      => 'text',
      'id'        => 'facebook',
      'name'      => 'facebook',
      'std'       => '',
      'label_for' => 'facebook',
      'class'     => 'css_class'
    );
	
	 $field_args2 = array(
      'type'      => 'text',
      'id'        => 'twitter',
      'name'      => 'twitter',
      'std'       => '',
      'label_for' => 'twitter',
      'class'     => 'css_class'
    );
	
	$field_args3 = array(
      'type'      => 'text',
      'id'        => 'google_plus',
      'name'      => 'google_plus',
      'std'       => '',
      'label_for' => 'google_plus',
      'class'     => 'css_class'
    );
	
	$field_args4 = array(
      'type'      => 'text',
      'id'        => 'upload_image',
      'name'      => 'upload_image',
      'desc'      => '<input id="upload_image_button" type="button" value="Upload" />',
      'std'       => '',
      'label_for' => 'upload_image',
      'class'     => 'css_class'
    );
		
	
	$field_args5 = array(
      'type'      => 'text',
      'id'        => 'upload_image1',
      'name'      => 'upload_image1',
      'desc'      => '<input id="upload_image_button1" type="button" value="Upload" />',
      'std'       => '',
      'label_for' => 'upload_image1',
      'class'     => 'css_class'
    );
	
	 $field_args6 = array(
      'type'      => 'text',
      'id'        => 'top_bar_text',
      'name'      => 'top_bar_text',
      'std'       => '',
      'label_for' => 'top_bar_text',
      'class'     => 'css_class'
    );
	
	 $field_args7 = array(
      'type'      => 'text',
      'id'        => 'footer_heading1',
      'name'      => 'footer_heading1',
      'std'       => '',
      'label_for' => 'footer_heading1',
      'class'     => 'css_class'
    );
	
	 $field_args8 = array(
      'type'      => 'textarea',
      'id'        => 'footer_heading1_desc',
      'name'      => 'footer_heading1_desc',
      'std'       => '',
      'label_for' => 'footer_heading1_desc',
      'class'     => 'css_class'
    );
	
		
	$field_args10 = array(
      'type'      => 'textarea',
      'id'        => 'footer_heading2_desc',
      'name'      => 'footer_heading2_desc',
      'std'       => '',
      'label_for' => 'footer_heading2_desc',
      'class'     => 'css_class'
    );
	
	$field_args11 = array(
      'type'      => 'textarea',
      'id'        => 'footer_menu',
      'name'      => 'footer_menu',
      'std'       => '',
      'label_for' => 'footer_menu',
      'class'     => 'css_class'
    );
	
	$field_args12 = array(
      'type'      => 'text',
      'id'        => 'copyright_text',
      'name'      => 'copyright_text',
      'std'       => '',
      'label_for' => 'copyright_text',
      'class'     => 'css_class'
    );
	
	$field_args13 = array(
      'type'      => 'textarea',
      'id'        => 'contact_us_address',
      'name'      => 'contact_us_address',
      'std'       => '',
      'label_for' => 'contact_us_address',
      'class'     => 'css_class'
    );
	
	$field_args14 = array(
      'type'      => 'textarea',
      'id'        => 'map_address',
      'name'      => 'map_address',
      'std'       => '',
      'label_for' => 'map_address',
      'class'     => 'css_class'
    );
	
	$field_args15 = array(
      'type'      => 'text',
      'id'        => 'phone',
      'name'      => 'phone',
      'std'       => '',
      'label_for' => 'phone',
      'class'     => 'css_class'
    );
	
	$field_args16 = array(
      'type'      => 'text',
      'id'        => 'email',
      'name'      => 'email',
      'std'       => '',
      'label_for' => 'email',
      'class'     => 'css_class'
    );
	
	$field_args17 = array(
      'type'      => 'textarea',
      'id'        => 'banner_text',
      'name'      => 'banner_text',
      'std'       => '',
      'label_for' => 'banner_text',
      'class'     => 'css_class'
    );
	
	$field_args18 = array(
      'type'      => 'textarea',
      'id'        => 'why_work_with_us',
      'name'      => 'why_work_with_us',
      'std'       => '',
      'label_for' => 'why_work_with_us',
      'class'     => 'css_class'
    );


   add_settings_field( 'facebook', 'Facebook', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args1);
   add_settings_field( 'twitter', 'Twitter', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args2);
   add_settings_field( 'google_plus', 'Google Plus', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args3);
   add_settings_field( 'upload_image', 'Upload Logo', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args4);
   add_settings_field( 'upload_image1', 'Contact Us Logo', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args5);
   add_settings_field( 'top_bar_text', 'Top Bar Text', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args6);
   add_settings_field( 'footer_heading1', 'Footer Heading1', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args7);
   add_settings_field( 'footer_heading1_desc', 'Footer Heading1 Description', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args8);
   add_settings_field( 'footer_heading2_desc', 'Footer Heading2 Description', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args10);
   add_settings_field( 'footer_menu', 'Footer Menu', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args11);   
   add_settings_field( 'copyright_text', 'Copyright Text', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args12);
   add_settings_field( 'contact_us_address', 'Contact Us Address', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args13);
   add_settings_field( 'map_address', 'Google Map Address', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args14);
   add_settings_field( 'phone', 'Phone', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args15);
   add_settings_field( 'email', 'Email', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args16);
   add_settings_field( 'banner_text', 'Banner Text', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args17);
   add_settings_field( 'why_work_with_us', 'Why Work With Us (Home Page)', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args18);
	  
}

function pu_display_section($section){ 

}


function pu_display_setting($args)
{
    extract( $args );
	
    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' 
			  value='$options[$id]' size='50' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break; 
		  
		   case 'textarea':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<textarea class='regular-text$class' id='$id' name='" . $option_name . "[$id]' style='width:350px; height:120px;'>$options[$id]</textarea>";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}



add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/js/script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
 
function my_admin_styles() {
	wp_enqueue_style('thickbox');
}


add_action( 'init', 'create_post_type' );

function create_post_type(){	
	register_post_type( 'partner_logo',
		array(
			'labels' => array(
			'name' => __( 'Partner Logo' ),
			'singular_name' => __( 'Partner Logo' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Partner Logo' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Partner Logo' ),
			'new_item' => __( 'New Partner Logo' ),
			'view' => __( 'View Partner Logo' ),
			'view_item' => __( 'View Partner Logo' ),
			'search_items' => __( 'Search Partner Logo' ),
			'not_found' => __( 'No Partner Logo found' ),
			'not_found_in_trash' => __('No Partner Logo found in Trash'),
			'parent' => __( 'Parent Partner Logo' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'show_in_nav_menus' => false,
		'exclude_from_search' => true,
		'hierarchical' => false,
		'rewrite' => array('slug'=>'partner_logo'),
		'supports' => array('title','thumbnail'),
		)						
	);	
	
	
	register_post_type( 'service',
		array(
			'labels' => array(
			'name' => __( 'Service' ),
			'singular_name' => __( 'Service' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Service' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Service' ),
			'new_item' => __( 'New Service' ),
			'view' => __( 'View Service' ),
			'view_item' => __( 'View Service' ),
			'search_items' => __( 'Search Service' ),
			'not_found' => __( 'No Service found' ),
			'not_found_in_trash' => __('No Service found in Trash'),
			'parent' => __( 'Parent Service' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'show_in_nav_menus' => false,
		'exclude_from_search' => true,
		'hierarchical' => false,
		'rewrite' => array('slug'=>'service'),
		'supports' => array('title','editor','thumbnail'),
		)						
	);	
	
}	