<?php


// Clean up wordpres <head>
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * Theme assets
 */
function enqueue_assets($editor = false) {
    $manifest = json_decode(file_get_contents('build/assets.json', true));
    $assets = $editor ? $manifest->editor : $manifest->app;

    wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/" . $assets->css,  false, null);
    wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/" . $assets->js, ['jquery'], null, true);
}

function enqueue_editor_assets() {
    enqueue_assets(true);
}

add_action('wp_enqueue_scripts', 'enqueue_assets');
add_action('enqueue_block_editor_assets', 'enqueue_editor_assets');


/**
 * Add svgs to admin
 */

function print_svgs() {
    $svgs = file_get_contents(get_template_directory_uri() . "/build/app.svg");
    echo '<span class="display-none">' . $svgs . '</span>';
}

add_action('in_admin_header', 'print_svgs');

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');
    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'mini')
    ]);
    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    // add_theme_support('customize-selective-refresh-widgets');


}, 20);


add_action('rest_api_init', function () {
	$namespace = 'presspack/v1';
	register_rest_route( $namespace, '/path/(?P<url>.*?)', array(
		'methods'  => 'GET',
		'callback' => 'get_post_for_url',
	));
});

/**
* This fixes the wordpress rest-api so we can just lookup pages by their full
* path (not just their name). This allows us to use React Router.
*
* @return WP_Error|WP_REST_Response
*/
function get_post_for_url($data)
{
    $postId    = url_to_postid($data['url']);
    $postType  = get_post_type($postId);
    $controller = new WP_REST_Posts_Controller($postType);
    $request    = new WP_REST_Request('GET', "/wp/v2/{$postType}s/{$postId}");
    $request->set_url_params(array('id' => $postId));
    return $controller->get_item($request);
}

add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}

/**
 * Register custom Post Types
 */

function create_post_types() {
    
    // You'll want to replace the values below with your own.
    register_post_type('testimonial',
        array(
            'labels' => array(
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial'),
            ),
            'public' => true,
            'supports' => array ('title', 'custom-fields'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'menu_icon' => 'dashicons-format-quote',
            'rewrite' => array ('slug' => __('testimonials'))
        )
    );

}

add_action('init', 'create_post_types');

/**
 * Register custom php gutenberg blocks
 */

function register_acf_block_types() {

    /**
     * Homepage blocks
     */

    // Hero
    acf_register_block_type(array(
        'name'              => 'homepage-hero',
        'title'             => __('Homepage Hero'),
        'description'       => __('A hero block with a parallax background, title, and link boxes.'),
        'render_template'   => 'blocks/homepage-hero.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'hero', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

    // About
    acf_register_block_type(array(
        'name'              => 'homepage-about',
        'title'             => __('Homepage About'),
        'description'       => __('An about block with a title, shoutout, description and link.'),
        'render_template'   => 'blocks/homepage-about.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'about', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

    // Plate
    acf_register_block_type(array(
        'name'              => 'homepage-plate',
        'title'             => __('Homepage Plate'),
        'description'       => __('A plate block with video, quotes, description and image.'),
        'render_template'   => 'blocks/homepage-plate.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'plate', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

    // Press
    acf_register_block_type(array(
        'name'              => 'homepage-press',
        'title'             => __('Homepage Press'),
        'description'       => __('A press block with background, links, and images.'),
        'render_template'   => 'blocks/homepage-press.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'press', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));
}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

add_theme_support( 'align-wide' );