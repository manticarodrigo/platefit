<?php

/**
 * Process the MailChimp newsletter subscription form and subscribe user to list.
 */
function platefit_process_newsletter_subscription()
{
    // Block spam bots
    if (!empty($_POST['pooh_hundred_acre_wood_field'])) {
        return false;
    }
    if (empty($_POST['EMAIL'])) {
        return;
    }

    // Configure --------------------------------------

    $api_key = '109c52e16f71fdf5e451b6562e2d95c9-us18';
    $list_id = 'adf56df714';

    // STOP Configuring -------------------------------

    $redirect_to = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : home_url();
    $msg = 'error';
    $api_endpoint = 'https://<dc>.api.mailchimp.com/3.0/';
    list(, $datacenter) = explode('-', $api_key);
    $api_endpoint = str_replace('<dc>', $datacenter, $api_endpoint);
    $url = $api_endpoint . '/lists/' . $list_id . '/members/';
    $body = array(
        'email_address' => sanitize_email($_POST['EMAIL']),
        'status' => 'subscribed'
    );
    $request_args = array(
        'method'      => 'POST',
        'timeout'     => 20,
        'headers'     => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'apikey ' . $api_key
        ),
        'body'        => json_encode($body),
    );
    $request = wp_remote_post($url, $request_args);
    $subscribe = is_wp_error($request) ? false : json_decode(wp_remote_retrieve_body($request));
    if ($subscribe) {
        if (isset($subscribe->title) && 'Member Exists' == $subscribe->title) {
            $msg = 'exists';
        } elseif ('subscribed' == $subscribe->status) {
            $msg = 'success';
        }
    }
    wp_redirect(esc_url_raw(add_query_arg('platefit_signup', $msg, $redirect_to)));
    exit;
}

add_action('admin_post_nopriv_platefit_newsletter_subscription', 'platefit_process_newsletter_subscription');
add_action('admin_post_platefit_newsletter_subscription', 'platefit_process_newsletter_subscription');

/**
 * Render newsletter MailChimp form
 */

function render_newsletter_form($modal = false)
{
    global $post;
    $container_ID = $modal ? '#platefit-modal-newsletter-wrap' : '#platefit-newsletter-wrap';
    $redirect_to = $post ? get_permalink($post->ID) . $container_ID : '/';
    // Display possible messages to the visitor.
    $message = '';
    if (isset($_GET['platefit_signup'])) {
        $class = 'success';
        if ('success' == $_GET['platefit_signup']) {
            $response   = 'Subscription successful.';
        } elseif ('exists' == $_GET['platefit_signup']) {
            $response   = 'Your email address was already subscribed.';
        } else {
            $response   = 'Sorry, subscription was not successful. Please try again.';
            $class      = 'error';
        }
        $message = '<p class="color-' . $class . '">' . $response . '</p>';
    }

    // Determine form class if is modal
    $form_class = $modal ? 'modal__form' : 'footer__newsletter';
    $form_id = $modal ? 'platefit-modal-subscribe-form' : 'platefit-footer-subscribe-form';
?>

    <div id="<?php echo $container_ID ?>">
        <form class="row <?php echo $form_class ?>" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="<?php echo $form_id ?>" name="modal-subscribe-form">
            <?php if ($modal) : ?>
                <input type="email" value="" name="EMAIL" id="modal-email" placeholder="Your Email">
                <button class="modal__form__submit" type="submit" name="subscribe" id="modal-subscribe">Subscribe&nbsp;<svg>
                        <use href="#arrow" /></svg></button>
            <?php else : ?>
                <input class="border-box col-2" type="email" value="" name="EMAIL" id="footer-email" placeholder="Your Email" required>
                <input class="border-box col-2" type="submit" value="Subscribe" name="subscribe" id="footer-subscribe">
    </div>
<?php endif; ?>

<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="pooh_hundred_acre_wood_field" tabindex="-1" value=""></div>
<input type="hidden" name="action" value="platefit_newsletter_subscription">
<input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>">
</form>
<?php echo $message; ?>
</div>
<?php
}

/**
 * Process the MailChimp covid form and subscribe user to list.
 */
function platefit_process_covid_subscription()
{
    // Block spam bots
    if (!empty($_POST['pooh_hundred_acre_wood_field'])) {
        return false;
    }
    if (empty($_POST['EMAIL'])) {
        return;
    }

    // Configure --------------------------------------

    $api_key = '109c52e16f71fdf5e451b6562e2d95c9-us18';
    $list_id = 'ad20f22a20';

    // STOP Configuring -------------------------------

    $redirect_to = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : home_url();
    $msg = 'error';
    $api_endpoint = 'https://<dc>.api.mailchimp.com/3.0/';
    list(, $datacenter) = explode('-', $api_key);
    $api_endpoint = str_replace('<dc>', $datacenter, $api_endpoint);
    $url = $api_endpoint . '/lists/' . $list_id . '/members/';
    $body = array(
        'email_address' => sanitize_email($_POST['EMAIL']),
        'status' => 'subscribed',
        'merge_fields' => array(
            'FNAME' => $_POST['FNAME'],
            'LNAME' => $_POST['LNAME'],
            'PHONE' => $_POST['PHONE'],
            'ADDRESS' => $_POST['ADDRESS'],
        )
    );
    $request_args = array(
        'method'      => 'POST',
        'timeout'     => 20,
        'headers'     => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'apikey ' . $api_key
        ),
        'body'        => json_encode($body),
    );
    $request = wp_remote_post($url, $request_args);
    $subscribe = is_wp_error($request) ? false : json_decode(wp_remote_retrieve_body($request));
    if ($subscribe) {
        if (isset($subscribe->title) && 'Member Exists' == $subscribe->title) {
            $msg = 'exists';
        } elseif ('subscribed' == $subscribe->status) {
            $msg = 'success';
        }
    }
    wp_redirect(esc_url_raw(add_query_arg('platefit_signup', $msg, $redirect_to)));
    exit;
}

add_action('admin_post_nopriv_platefit_covid_subscription', 'platefit_process_covid_subscription');
add_action('admin_post_platefit_covid_subscription', 'platefit_process_covid_subscription');

/**
 * Render covid MailChimp form
 */

function render_covid_form()
{
    global $post;
    $container_ID = '#platefit-modal-covid-subscribe-form-wrap';
    $redirect_to = $post ? get_permalink($post->ID) . $container_ID : '/';
    // Display possible messages to the visitor.
    $message = '';
    if (isset($_GET['platefit_signup'])) {
        $class = 'success';
        if ('success' == $_GET['platefit_signup']) {
            $response   = 'Subscription successful.';
        } elseif ('exists' == $_GET['platefit_signup']) {
            $response   = 'Your email address was already subscribed.';
        } else {
            $response   = 'Sorry, subscription was not successful. Please try again.';
            $class      = 'error';
        }
        $message = '<p class="color-' . $class . '">' . $response . '</p>';
    }

    $form_id = 'platefit-modal-covid-subscribe-form';
?>

    <div id="<?php echo $container_ID ?>">
        <form class="row wrap" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="<?php echo $form_id ?>" name="modal-covid-subscribe-form">
            <div class="border-box p-2 col-2 col-1-sm column text-left">
                <label for="covid-first-name">First Name</label>
                <input required type="text" value="" name="FNAME" id="covid-first-name">
            </div>
            <div class="border-box p-2 col-2 col-1-sm column text-left">
                <label for="covid-last-name">Last Name</label>
                <input required type="text" value="" name="LNAME" id="covid-last-name">
            </div>
            <div class="border-box p-2 col-2 col-1-sm column text-left">
                <label for="covid-email">Email Address</label>
                <input required type="email" value="" name="EMAIL" id="covid-email">
            </div>
            <div class="border-box p-2 col-2 col-1-sm column text-left">
                <label for="covid-phone-number">Phone Number</label>
                <input required type="tel" value="" name="PHONE" id="covid-phone-number">
            </div>
            <div class="border-box p-2 col-1 column text-left">
                <label for="covid-address">Address</label>
                <input required type="text" value="" name="ADDRESS" id="covid-address">
            </div>
            <div class="px-2 py-3 width-full row center">
                <button class="btn btn--arrow" type="submit" name="subscribe" id="covid-subscribe">Subscribe&nbsp;<svg>
                        <use href="#arrow" /></svg></button>
            </div>
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="pooh_hundred_acre_wood_field" tabindex="-1" value=""></div>
            <input type="hidden" name="action" value="platefit_covid_subscription">
            <input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>">
        </form>
        <?php echo $message; ?>
    </div>
<?php
}
