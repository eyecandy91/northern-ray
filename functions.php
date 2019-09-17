<?php
/**
 * _ez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

if ( ! function_exists( '_ez_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _ez_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_ez' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_ez', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_ez' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_ez_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_ez_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _ez_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_ez_content_width', 640 );
}
add_action( 'after_setup_theme', '_ez_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _ez_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_ez' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_ez' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_ez_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _ez_scripts() {
	// wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	// wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', array(), null, true);
	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true );
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', '_ez_scripts' );

/**
 * Enqueue ajax correctly
 */
function add_ajax_script() {
    wp_localize_script( 'ajax-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'add_ajax_script' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Remove all the BS trash
 */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
      
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
      
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink
remove_action('welcome_panel', 'wp_welcome_panel'); // Remove welcome BS

add_filter('xmlrpc_enabled', '__return_false');

add_theme_support( 'title-tag' ); // Utilize Proper WordPress Titles

/**
 * add mobile version of logo
 */
function mobile_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo_mobile' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_mobile', array(
        'label'    => __( 'Logo (mobile version)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_mobile',
    ) ) );
}
add_action( 'customize_register', 'mobile_logo_customize_register' );

/**
 * Add ACF to backend
 */
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path($path)
{

	// update path
	$path = get_stylesheet_directory() . '/acf/';

	// return
	return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir($dir)
{

	// update path
	$dir = get_stylesheet_directory_uri() . '/acf/';

	// return
	return $dir;
}
// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_true');
// 4. Include ACF
include_once(get_stylesheet_directory() . '/acf/acf.php');

/**
 * Changes reset password to more uniform text
 */
add_action( 'resetpass_form', 'resettext');
function resettext(){ ?>

<script type="text/javascript">
   jQuery( document ).ready(function() {                 
     jQuery('#resetpassform input#wp-submit').val("Set Password");
   });
</script>
<?php
}

/**
 * Hides shit from the default login on wp.login
 */
function my_login_page_remove_back_to_link() { ?>
    <style type="text/css">
        body.login div#login p#backtoblog,
        body.login div#login p#nav {
          display: none;
        }
    </style>
<?php }
//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );

/**
 * Redirects the user if not admin to a specific page
 */
function admin_login_redirect( $redirect_to, $request, $user ) {
	global $user;
	
	if( isset( $user->roles ) && is_array( $user->roles ) ) {
	   if( in_array( "administrator", $user->roles ) ) {
	   return $redirect_to;
	   } 
	   else {
		return home_url();
	   }
	}
	else {
	return $redirect_to;
	}
 }
add_filter("login_redirect", "admin_login_redirect", 10, 3);

/**
 * Custom pagination
 */
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

/**
 * Somehow fixes the buggy pagination
 */
function custom_posts_per_page( $query ) {
if ( $query->is_archive('project') ) 
	{
	set_query_var('posts_per_page', -1);
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

/**
 * Hide the tags that are not needed in pagination
 */
function sanitize_pagination($content) {
	// Remove h2 tag
	$content = str_replace('role="navigation"', '', $content);
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
add_action('navigation_markup_template', 'sanitize_pagination');

/**
 *Remove access to normal users from wp admin backend
 */
function wpse23007_redirect(){
	if( is_admin() && !defined('DOING_AJAX') && ( current_user_can('subscriber') || current_user_can('contributor') ) ){
	  wp_redirect(home_url());
	  exit;
	}
}
add_action('init','wpse23007_redirect');

/**
 *Remove admin panel for frontend users
 */
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

/**
 * Adds custom taxonomy custom post types
 */
function add_cats_to_page()
{
	// Add tag metabox to page
	register_taxonomy_for_object_type('post_tag', 'ADD_NEW_TAXONOMY');
	// Add category metabox to ADD_NEW_TAXONOMY
	register_taxonomy_for_object_type('category', 'ADD_NEW_TAXONOMY');
	register_taxonomy_for_object_type('category', 'page');  
}
add_action('init', 'add_cats_to_page');

/**
 * Remove the standard posts from admin 
 */
function remove_menu () 
{
   remove_menu_page('edit.php');
} 
add_action('admin_menu', 'remove_menu');

/**
 * Add subscribers to post authors
 */
add_filter( 'wp_dropdown_users_args', 'add_subscribers_to_dropdown', 10, 2 );
function add_subscribers_to_dropdown( $query_args, $r ) {

    $query_args['who'] = '';
    return $query_args;

}


/**
	 * Create A Simple Theme Options Panel
	 *
	 */
	
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	// Start Class
	if ( ! class_exists( 'WPEX_Theme_Options' ) ) {
	
		class WPEX_Theme_Options {
	
			/**
			 * Start things up
			 *
			 * @since 1.0.0
			 */
			public function __construct() {
	
				// We only need to register the admin panel on the back-end
				if ( is_admin() ) {
					add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
					add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
				}
	
			}
	
			/**
			 * Returns all theme options
			 *
			 * @since 1.0.0
			 */
			public static function get_theme_options() {
				return get_option( 'theme_options' );
			}
	
			/**
			 * Returns single theme option
			 *
			 * @since 1.0.0
			 */
			public static function get_theme_option( $id ) {
				$options = self::get_theme_options();
				if ( isset( $options[$id] ) ) {
					return $options[$id];
				}
			}
	
			/**
			 * Add sub menu page
			 *
			 * @since 1.0.0
			 */
			public static function add_admin_menu() {
				add_menu_page(
					esc_html__( 'Theme Settings', 'ez' ),
					esc_html__( 'Theme Settings', 'ez' ),
					'manage_options',
					'theme-settings',
					array( 'WPEX_Theme_Options', 'create_admin_page' )
				);
			}
	
			/**
			 * Register a setting and its sanitization callback.
			 *
			 * We are only registering 1 setting so we can store all options in a single option as
			 * an array. You could, however, register a new setting for each option
			 *
			 * @since 1.0.0
			 */
			public static function register_settings() {
				register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
			}
	
			/**
			 * Sanitization callback
			 *
			 * @since 1.0.0
			 */
			public static function sanitize( $options ) {
	
				// If we have options lets sanitize them
				if ( $options ) {
	
					// Checkbox
					// if ( ! empty( $options['checkbox_example'] ) ) {
					// 	$options['checkbox_example'] = 'on';
					// } else {
					// 	unset( $options['checkbox_example'] ); // Remove from options if not checked
					// }
	
					// // Input
					// if ( ! empty( $options['input_example'] ) ) {
					// 	$options['input_example'] = sanitize_text_field( $options['input_example'] );
					// } else {
					// 	unset( $options['input_example'] ); // Remove from options if empty
					// }

					// Input
					if ( ! empty( $options['instagram'] ) ) {
						$options['instagram'] = sanitize_text_field( $options['instagram'] );
					} else {
						unset( $options['instagram'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['facebook'] ) ) {
						$options['facebook'] = sanitize_text_field( $options['facebook'] );
					} else {
						unset( $options['facebook'] ); // Remove from options if empty
					}
					// Input
					if ( ! empty( $options['twitter'] ) ) {
						$options['twitter'] = sanitize_text_field( $options['twitter'] );
					} else {
						unset( $options['twitter'] ); // Remove from options if empty
					}
					// Input
					if ( ! empty( $options['linkedin'] ) ) {
						$options['linkedin'] = sanitize_text_field( $options['linkedin'] );
					} else {
						unset( $options['linkedin'] ); // Remove from options if empty
					}
					// Input
					if ( ! empty( $options['ga'] ) ) {
						$options['ga'] = sanitize_text_field( $options['ga'] );
					} else {
						unset( $options['ga'] ); // Remove from options if empty
					}
	
					// // Select
					// if ( ! empty( $options['select_example'] ) ) {
					// 	$options['select_example'] = sanitize_text_field( $options['select_example'] );
					// }
	
				}
	
				// Return sanitized options
				return $options;
	
			}
	
			/**
			 * Settings page output
			 *
			 * @since 1.0.0
			 */
			public static function create_admin_page() { ?>

<div class="wrap">

    <h1><?php esc_html_e( 'Northern Ray settings', 'ez' ); ?></h1>

    <form method="post" action="options.php">

        <?php settings_fields( 'theme_options' ); ?>

        <table class="form-table wpex-custom-admin-login-table">

            <!-- <?php // Checkbox example ?>
							<tr valign="top">
								<th scope="row"><?php// esc_html_e( 'Checkbox Example', 'ez' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'checkbox_example' ); ?>
									<input type="checkbox" name="theme_options[checkbox_example]" <?php// checked( $value, 'on' ); ?>> <?php// esc_html_e( 'Checkbox example description.', 'ez' ); ?>
								</td>
							</tr>
	
							<?php// // Text input example ?>
							<tr valign="top">
								<th scope="row"><?php// esc_html_e( 'Input Example', 'ez' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'input_example' ); ?>
									<input type="text" name="theme_options[input_example]" value="<?php// echo esc_attr( $value ); ?>">
								</td>
							</tr> -->

            <?php // book online text ?>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Instagram', 'ez' ); ?></th>
                <td>
                    <?php $value = self::get_theme_option( 'instagram' ); ?>
                    <input type="text" name="theme_options[instagram]" value="<?php echo esc_attr( $value ); ?>">
                </td>
            </tr>
            <?php // book online text ?>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Facebook', 'ez' ); ?></th>
                <td>
                    <?php $value = self::get_theme_option( 'facebook' ); ?>
                    <input type="text" name="theme_options[facebook]" value="<?php echo esc_attr( $value ); ?>">
                </td>
            </tr>

            <?php // book online link ?>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Twitter', 'ez' ); ?></th>
                <td>
                    <?php $value = self::get_theme_option( 'twitter' ); ?>
                    <input type="text" name="theme_options[twitter]" value="<?php echo esc_attr( $value ); ?>">

                </td>
            </tr>

            <?php // footer copyright ?>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Linkedin', 'ez' ); ?></th>
                <td>
                    <?php $value = self::get_theme_option( 'linkedin' ); ?>
                    <input type="text" name="theme_options[linkedin]" value="<?php echo esc_attr( $value ); ?>">
                </td>
            </tr>

			<tr valign="top">
                <th scope="row"><?php esc_html_e( 'Google UA Number', 'ez' ); ?></th>
                <td>
                    <?php $value = self::get_theme_option( 'ga' ); ?>
                    <input type="text" name="theme_options[ga]" value="<?php echo esc_attr( $value ); ?>">
                </td>
            </tr>

            <!-- <?php// // Select example ?>
							<tr valign="top" class="wpex-custom-admin-screen-background-section">
								<th scope="row"><?php// esc_html_e( 'Select Example', 'ez' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'select_example' ); ?>
									<select name="theme_options[select_example]">
										<?php//
										//$options = array(
										//	'1' => esc_html__( 'Option 1', 'ez' ),
										//	'2' => esc_html__( 'Option 2', 'ez' ),
										//	'3' => esc_html__( 'Option 3', 'ez' ),
										//);
										//foreach ( $options as $id => $label ) { ?>
											<option value="<?php// echo esc_attr( $id ); ?>" <?php// selected( $value, $id, true ); ?>>
												<?php// echo strip_tags( $label ); ?>
											</option>
										<?php// } ?>
									</select>
								</td>
							</tr> -->

        </table>

        <?php submit_button(); ?>

    </form>

</div><!-- .wrap -->
<?php }
	
		}
	}
	new WPEX_Theme_Options();
	
	// Helper function to use in your theme to return a theme option value
	function myprefix_get_theme_option( $id = '' ) {
		return WPEX_Theme_Options::get_theme_option( $id );
	}

/**
 * Load custom post type BLOG
 */
function custom_post_blog()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x('Blog posts', 'Post Type General Name', 'ez'),
		'singular_name'       => _x('Blog posts', 'Post Type Singular Name', 'ez'),
		'menu_name'           => __('Blog posts', 'ez'),
		'parent_item_colon'   => __('Parent Blog', 'ez'),
		'all_items'           => __('All Blog posts', 'ez'),
		'view_item'           => __('View Blog posts', 'ez'),
		'add_new_item'        => __('Add new blog post', 'ez'),
		'add_new'             => __('Add new blog post', 'ez'),
		'edit_item'           => __('Edit Blog post', 'ez'),
		'update_item'         => __('Update Blog post', 'ez'),
		'search_items'        => __('Search Blog posts', 'ez'),
		'not_found'           => __('Not Found', 'ez'),
		'not_found_in_trash'  => __('Not found in Trash', 'ez'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('Blog posts', 'ez'),
		'description'         => __('Blog posts', 'ez'),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array('blog'),
		/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
		'hierarchical'        => false,
		// 'taxonomies'            => array('category'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true, // Change if weird things start to happen
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-admin-comments',
		'publicly_queryable'  => true, // Set to false hides Single Pages
	);

	// Registering your Custom Post Type
	register_post_type('blog', $args); // change to match that of the real name 
}

/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/

add_action('init', 'custom_post_blog', 0);

/**
 * Add custom taxonomy BLOG
 */
//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'custom_taxonomy_blog', 0);
function custom_taxonomy_blog()
{

	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

	$labels = array(
		'name' => _x('Blog categories', 'taxonomy general name'),
		'singular_name' => _x('Blog categories', 'taxonomy singular name'),
		'search_items' =>  __('Search blog'),
		'all_items' => __('All blog'),
		'parent_item' => __('Parent blog'),
		'parent_item_colon' => __('Parent blog:'),
		'edit_item' => __('Edit blog'),
		'update_item' => __('Update blog'),
		'add_new_item' => __('Add New blog'),
		'new_item_name' => __('New blog Name'),
		'menu_name' => __('Blog categories'),
	);

	// Now register the taxonomy

	register_taxonomy('blog', array('blog'), array( // change to match that of the real name 
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'blog'),
		'show_in_rest' => true
	));
}

/**
 * Load custom post type NEWS
 */
function custom_post_news()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x('News posts', 'Post Type General Name', 'ez'),
		'singular_name'       => _x('News posts', 'Post Type Singular Name', 'ez'),
		'menu_name'           => __('News posts', 'ez'),
		'parent_item_colon'   => __('Parent news', 'ez'),
		'all_items'           => __('All news posts', 'ez'),
		'view_item'           => __('View news posts', 'ez'),
		'add_new_item'        => __('Add new news post', 'ez'),
		'add_new'             => __('Add new news post', 'ez'),
		'edit_item'           => __('Edit news post', 'ez'),
		'update_item'         => __('Update news post', 'ez'),
		'search_items'        => __('Search news posts', 'ez'),
		'not_found'           => __('Not Found', 'ez'),
		'not_found_in_trash'  => __('Not found in Trash', 'ez'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('News posts', 'ez'),
		'description'         => __('News posts', 'ez'),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array('news'),
		/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
		'hierarchical'        => false,
		// 'taxonomies'            => array('category'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true, // Change if weird things start to happen
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-admin-site-alt',
		'publicly_queryable'  => true, // Set to false hides Single Pages
	);

	// Registering your Custom Post Type
	register_post_type('news', $args); // change to match that of the real name 
}

/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/

add_action('init', 'custom_post_news', 0);

/**
 * Add custom taxonomy NEWS
 */
//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'custom_taxonomy_news', 0);
function custom_taxonomy_news()
{

	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

	$labels = array(
		'name' => _x('News categories', 'taxonomy general name'),
		'singular_name' => _x('News categories', 'taxonomy singular name'),
		'search_items' =>  __('Search news'),
		'all_items' => __('All news'),
		'parent_item' => __('Parent news'),
		'parent_item_colon' => __('Parent news:'),
		'edit_item' => __('Edit news'),
		'update_item' => __('Update news'),
		'add_new_item' => __('Add New news'),
		'new_item_name' => __('New news Name'),
		'menu_name' => __('News categories'),
	);

	// Now register the taxonomy

	register_taxonomy('news', array('news'), array( // change to match that of the real name 
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'news'),
		'show_in_rest' => true
	));
}

/**
 * Remove search ability
 */
function fb_filter_query( $query, $error = true ) {
	if ( is_search() ) {
	$query->is_search = false;
	$query->query_vars[s] = false;
	$query->query[s] = false;

	// to error
	if ( $error == true )
	$query->is_404 = true;
	}
}
add_action( 'parse_query', 'fb_filter_query' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

/**
 * Remove Default Image Links in WordPress
 */
function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
     
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

/**
 * Hide WordPress update nag to all but admins
 */
function hide_update_notice_to_all_but_admin() {
    if ( !current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin', 1 );


/**
 * Remove all dashboard widgets
 */
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

/**
 * Example new widget
 */
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	
	wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function custom_dashboard_help() {
echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}

/**
 * Modify admin footer text
 */
function modify_footer() {
    echo 'Created by <a href="mailto:info@ez.media">EZ MEDIA</a>.';
}
add_filter( 'admin_footer_text', 'modify_footer' );

add_filter( 'excerpt_length', function($length) {
    return 13;
} );

function custom_contact_script_conditional_loading(){
	//  Edit page IDs here
	if(! is_page('contact') )
	{
	   wp_dequeue_script('contact-form-7'); // Dequeue JS Script file.
	   wp_dequeue_style('contact-form-7');  // Dequeue CSS file.
	   wp_dequeue_style('cf7cf-style');  // Dequeue CSS file.
	}
 }
 add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );