<?php
/**
 * Boot_s functions and definitions
 *
 * @package Boot_s
 * @since Boot_s 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Boot_s 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'Boot_s_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Boot_s 1.0
 */
function Boot_s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Boot_s, use a find and replace
	 * to change 'Boot_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'Boot_s', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'Boot_s' ),
			'secondary' => __( 'Secondary Menu', 'Boot_s' ),
			'landing' => __( 'Landing Menu', 'Boot_s' ),
		) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // Boot_s_setup
add_action( 'after_setup_theme', 'Boot_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Boot_s 1.0
 */
function Boot_s_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'Boot_s' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'Boot_s_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function Boot_s_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	
	// ADD ENQUEUE PER BOOTSTRAP
	
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/_css/bootstrap.css', '20120822' );
	
		wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . '/_css/responsive.css', '20120822' );
		
		wp_enqueue_style( 'prettify', get_template_directory_uri() . '/_js/google-code-prettify/prettify.css', '20120822' );
	
		// wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
		
		wp_enqueue_script( 'prettify', get_template_directory_uri() . '/_js/google-code-prettify/prettify.js', array( 'jquery' ), '20120822'  );
		
		wp_enqueue_script( 'bootstrap-transition', get_template_directory_uri() . '/_js/bootstrap-transition.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-alert', get_template_directory_uri() . '/_js/bootstrap-alert.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/_js/bootstrap-modal.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-dropdown', get_template_directory_uri() . '/_js/bootstrap-dropdown.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-scrollspy', get_template_directory_uri() . '/_js/bootstrap-scrollspy.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-tab', get_template_directory_uri() . '/_js/bootstrap-tab.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-tooltip', get_template_directory_uri() . '/_js/bootstrap-tooltip.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-popover', get_template_directory_uri() . '/_js/bootstrap-popover.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-button', get_template_directory_uri() . '/_js/bootstrap-button.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-collapse', get_template_directory_uri() . '/_js/bootstrap-collapse.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-carousel', get_template_directory_uri() . '/_js/bootstrap-carousel.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-typeahead', get_template_directory_uri() . '/_js/bootstrap-typeahead.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'bootstrap-affix', get_template_directory_uri() . '/_js/bootstrap-affix.js', array( 'jquery' ), '20120822', true  );
		
		wp_enqueue_script( 'application-js', get_template_directory_uri() . '/_js/application.js', array( 'jquery' ), '20120823', true  );
		
		
	// END ADD

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'Boot_s_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Implement additional Excerpt Functions
 */

function new_excerpt_more($more) {
       global $post;
	return '<br /><span class="read-more"> <a href="'. get_permalink($post->ID) . '">[read more]</a></span>';
}
add_filter('excerpt_more', 'new_excerpt_more');
