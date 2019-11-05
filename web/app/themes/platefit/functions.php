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
     * Common blocks
     */

    // CTA
    acf_register_block_type(array(
        'name'              => 'cta',
        'title'             => __('CTA'),
        'description'       => __('A call-to-action block with a parallax background, title, and link.'),
        'render_template'   => 'blocks/cta.php',
        'category'          => 'common',
        'icon'              => 'megaphone',
        'keywords'          => array( 'cta', 'common' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

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

    // Our Story
    acf_register_block_type(array(
        'name'              => 'homepage-our-story',
        'title'             => __('Homepage Our Story'),
        'description'       => __('An our story block with two images, title, description, and link.'),
        'render_template'   => 'blocks/homepage-our-story.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'our-story', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

    // Community
    acf_register_block_type(array(
        'name'              => 'homepage-community',
        'title'             => __('Homepage Community'),
        'description'       => __('A community block with insta feed, title, description, and link.'),
        'render_template'   => 'blocks/homepage-community.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'community', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));

    // App
    acf_register_block_type(array(
        'name'              => 'homepage-app',
        'title'             => __('Homepage App'),
        'description'       => __('An app block with title, description, links and image.'),
        'render_template'   => 'blocks/homepage-app.php',
        'category'          => 'common',
        'icon'              => 'store',
        'keywords'          => array( 'app', 'homepage' ),
        'align'             => 'full',
        'supports'          => array('multiple' => false),
    ));
}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

add_theme_support( 'align-wide' );

/**
 * Register menus
 */

function register_menus() {
    register_nav_menus(array(
        'company' => __( 'Company Menu' ),
        'explore' => __( 'Explore Menu' )
    ));
}

add_action('init', 'register_menus');

/**
 * Get nav menu items by location
 *
 * @param $location The menu location id
 */
function get_nav_menu_items_by_location( $location, $args = [] ) {
 
    // Get all locations
    $locations = get_nav_menu_locations();
 
    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );
 
    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );
 
    // Return menu post objects
    return $menu_items;
}

/**
 * Process the MailChimp newsletter subsription form and subscribe user to list.
 */
function platefit_process_newsletter_subscription() {
    // Block spam bots
    if ( ! empty( $_POST['pooh_hundred_acre_wood_field'] ) ) {
        return false;
    }
    if ( empty( $_POST['EMAIL'] ) ) {
        return;
    }
  
    // Configure --------------------------------------
  
    $api_key = '5f307cae422459ede85703cca09f5b49-us17';
    $list_id = 'a52e0a0a3e';
  
    // STOP Configuring -------------------------------
  
    $redirect_to = isset( $_POST['redirect_to'] ) ? $_POST['redirect_to'] : home_url();
    $msg = 'error';
    $api_endpoint = 'https://<dc>.api.mailchimp.com/3.0/';
    list(, $datacenter) = explode( '-', $api_key );
    $api_endpoint = str_replace( '<dc>', $datacenter, $api_endpoint );
    $url = $api_endpoint.'/lists/' . $list_id . '/members/';
    $body = array(
        'email_address' => sanitize_email( $_POST['EMAIL'] ),
        'status' => 'subscribed'
    );
    $request_args = array(
        'method'      => 'POST',
        'timeout'     => 20,
        'headers'     => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'apikey ' . $api_key
        ),
        'body'        => json_encode( $body ),
    );
    $request = wp_remote_post( $url, $request_args );
    $subscribe = is_wp_error( $request ) ? false : json_decode( wp_remote_retrieve_body( $request ) );
    if ( $subscribe ) {
        if ( isset( $subscribe->title ) && 'Member Exists' == $subscribe->title ) {
            $msg = 'exists';
        } elseif ( 'subscribed' == $subscribe->status ) {
            $msg = 'success';
        }
    }
    wp_redirect( esc_url_raw( add_query_arg( 'platefit_signup', $msg, $redirect_to ) ) );
    exit;
  }
  
  add_action( 'admin_post_nopriv_platefit_newsletter_subscription', 'platefit_process_newsletter_subscription' );
  add_action( 'admin_post_platefit_newsletter_subscription', 'platefit_process_newsletter_subscription' );
  
/**
 * Render MailChimp form
 */

 function render_mailchimp_form($modal = false) {
    global $post;
    $container_ID = $modal ? '#platefit-modal-newsletter-wrap' : '#platefit-newsletter-wrap';
    $redirect_to = get_permalink( $post->ID ) . $container_ID;
    // Display possible messages to the visitor.
    $message = '';
    if ( isset( $_GET['platefit_signup'] ) ) {
        $class = 'success';
        if ( 'success' == $_GET['platefit_signup'] ) {
            $response   = 'Subscription successful.';
        } elseif ( 'exists' == $_GET['platefit_signup'] ) {
            $response   = 'Your email address was already subscribed.';
        } else {
            $response   = 'Sorry, subscription was not successful. Please try again.';
            $class      = 'error';
        }
        $message = '<p class="text-' . $class . '">' . $response . '</p>'; 
    }

    // Determine form class if is modal
    $form_class = $modal ? 'modal__form' : 'footer__newsletter';
    ?>

    <div id="<?php echo $container_ID ?>">
        <form class="row <?php echo $form_class ?>" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="platefit-mc-subscribe-form" name="platefit-mc-subscribe-form">
            <?php if ($modal): ?>
                <input type="email" value="" name="EMAIL" id="modal-email" placeholder="Your Email">
                <button class="modal__form__submit" type="submit" name="subscribe" id="modal-subscribe">Subscribe&nbsp;<svg><use href="#arrow" /></svg></button>
            <?php else: ?>
                <input class="border-box col-2" type="email" value="" name="EMAIL" id="footer-email" placeholder="Your Email" required>
                <input class="border-box col-2" type="submit" value="Subscribe" name="subscribe" id="footer-subscribe"></div>
            <?php endif; ?>

            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="pooh_hundred_acre_wood_field" tabindex="-1" value=""></div>
            <input type="hidden" name="action" value="platefit_newsletter_subscription">
            <input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>">
        </form>
        <?php echo $message; ?>
    </div>
    <?php
 }
