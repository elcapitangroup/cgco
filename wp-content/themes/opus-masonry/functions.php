<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */
/**
 * Loads the child theme textdomain.
 */
function opus_masonry_load_language() {
    load_child_theme_textdomain( 'opus-masonry' );
}
add_action( 'after_setup_theme', 'opus_masonry_load_language' );

function opus_masonry_dequeue_scripts() {
    wp_dequeue_style( 'opus-blog-style' );
}
add_action( 'wp_enqueue_scripts', 'opus_masonry_dequeue_scripts', 999 );

/**
 * Enqueue Style for child theme.
 */
add_action( 'wp_enqueue_scripts', 'opus_masonry_enqueue_scripts');
function opus_masonry_enqueue_scripts() {

    $parent_style = 'opus-blog-style-child';
    $opus_blog_version = wp_get_theme(get_template())->get( 'Version' );
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'opus-masonry-style', get_stylesheet_directory_uri() . '/style.css', array(), $opus_blog_version );

    /*Body Font*/
    wp_enqueue_style('opus-masonry-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    
    /*heading*/
    wp_enqueue_style('opus-masonry-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function opus_mansonry_widgets_init()
{
    
    register_sidebar(array(
        'name' => esc_html__('Newsletter', 'opus-masonry'),
        'id' => 'newsletter',
        'description' => esc_html__('Add widgets here.', 'opus-masonry'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

}
add_action('widgets_init', 'opus_mansonry_widgets_init');

/**
 * Opus Masonry Default Theme Customizer
 *
 * @package Opus_Masonry
 */

if (!function_exists('opus_blog_default_theme_options_values')) :
    
    function opus_blog_default_theme_options_values()
    {
        
        $default_theme_options = array(
            
            /*Top Header Section Default Value*/
            'opus_blog_primary_color' => '#ff5caf',
            
            /*Top Header Section Default Value*/
            'opus_blog_enable_top_header' => 0,
            'opus_blog_enable_top_header_social' => 0,
            'opus_blog_enable_top_header_menu' => 0,
            
            /*Menu Section Default Value*/
            'opus_blog_enable_sticky_menu' => 1,
            'opus_blog_enable_top_header_search' => 0,
            'opus_blog_enable_top_header_woo'=> 0,
            
            /*Slider Section Default Value*/
            'opus_blog_enable_slider' => 0,
            'opus-blog-select-category' => 0,
            'opus-blog-slider-number' => 3,
            'opus_blog_enable_slider_recommendation' => 0,
            'opus_blog_enable_slider_boxed' => 'boxed',
    
            /*Promo Section Default Value*/
            'opus_blog_enable_promo'       => 1,
            'opus-blog-promo-select-category'=> 0,
            
            /*Blog Page Default Value*/
            'opus-blog-sidebar-blog-page' => 'no-sidebar',
            'opus-blog-column-blog-page' => 'masonry-post',
            'opus-blog-blog-image-layout' => 'full-image',
            'opus-blog-content-show-from' => 'excerpt',
            'opus-blog-excerpt-length' => 25,
            'opus-blog-pagination-options' => 'numeric',
            'opus-blog-read-more-text' => esc_html__('', 'opus-masonry'),
            'opus-blog-content-social-hide' => 0,
            'opus-blog-content-meta-hide' => 0,
            'opus-blog-content-post-format-hide' => 'none',
            'opus-blog-blog-page-related-posts'  => 0,
            'opus-blog-blog-page-related-posts-title' => esc_html__('You May Like', 'opus-masonry'),
    
            /*Single Page Default Value*/
            'opus-blog-single-page-related-posts' => 0,
            'opus-blog-single-page-related-posts-title' => esc_html__('Related Posts', 'opus-masonry'),
            'opus-blog-single-page-author-info' => 0,
            'opus-blog-sidebar-single-page' => 'single-right-sidebar',
            'opus-blog-drop-cap-single-letter' => 0,
            
            /*Sticky Sidebar Options*/
            'opus-blog-enable-sticky-sidebar' => 1,
            
            /*Footer Section*/
            'opus-blog-footer-copyright' => esc_html__('All Rights Reserved 2020', 'opus-masonry'),
            'opus-blog-go-to-top' => 1,
            
            /*Paragraph Options*/
            'opus-blog-font-family-name-cast'=> 'Muli:400,300italic,300',
            'opus-blog-font-paragraph-font-size' => 15,
            'opus-blog-font-paragraph-line-height' => 25,
            'opus-blog-font-paragraph-letter-spacing' => 0,
            
            /*Extra Options*/
            'opus-blog-extra-breadcrumb' => 1,
            'opus-blog-breadcrumb-text' => esc_html__('You are Here', 'opus-masonry'),
            'opus-blog-drop-cap-letter' => 0
        
        );
        return apply_filters('opus_blog_default_theme_options_values', $default_theme_options);
    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function opus_masonry_customize_register( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section( 'opus_blog_font_options' );

}
add_action( 'customize_register', 'opus_masonry_customize_register', 999 );



/**
 * Custom theme hook for slider override from child theme
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Opus Masonry
 */
if (!function_exists('opus_blog_add_main_slider')) :
    
    /**
     * Add main slider.
     *
     * @since 1.0.0
     */
    function opus_blog_add_main_slider()
    {
       get_template_part('template-parts/slider/slider', 'default');
    }
endif;
add_action('opus_blog_action_slider', 'opus_blog_add_main_slider', 10);


/**
 * Custom theme hook for promo section
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Opus Masonry
 */
if ( ! function_exists( 'opus_blog_promo_section' ) ) :
    
    /**
     * Add main slider.
     *
     * @since 1.0.0
     */
    function opus_blog_promo_section() {
            get_template_part( 'template-parts/promo/promo','default' );
    }
endif;
add_action( 'opus_blog_action_promo', 'opus_blog_promo_section', 10 );

/**
* Load header media
*/
require get_stylesheet_directory() . '/inc/custom-header.php';