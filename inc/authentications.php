<?php

/** Register form shortcode */
add_shortcode('nwt-register', 'nwt_register');
function nwt_register() {
    ob_start();

    include 'public/register.php';
    return ob_get_clean();
}

/** Login form shortcode */

add_shortcode('nwt-login', 'nwt_login');
function nwt_login() {
   ob_start();
   include 'public/login.php';
   return ob_get_clean();
}

/** Login info*/

function nwt_user_login() {
    if(isset($_POST['user_login'])) {
       $user_name = esc_sql($_POST['lc_number']);
       $user_pass = esc_sql($_POST['certificate_number']);
 
       $credentials = array(
          'user_login' => $user_name,
          'user_password' => $user_pass
       );
 
       $user = wp_signon($credentials);
 
       if(!is_wp_error($user)) {
          if($user->roles[0] == 'administrator') {
             wp_redirect(admin_url());
             exit;
          } else {
             wp_redirect(site_url('profile'));
             exit;
          }
       } else {
          echo $user->get_error_message();
       }
    }
 }
 add_action('template_redirect', 'nwt_user_login'); 
 
 /** profile functionality */
 add_shortcode('nwt-profile', 'user_profile');
 function user_profile() {
    ob_start();
    include 'public/profile.php';
    return ob_get_clean();
 }

/** after login/register redirect profile page */
function user_redirect_profile() {
   $is_user_logged_in = is_user_logged_in();

   if($is_user_logged_in && (is_page('online-verification') || is_page('registration'))) {
      wp_redirect(site_url('profile'));
      exit;
   } elseif(! $is_user_logged_in && is_page('profile')) {
      wp_redirect(site_url('online-verification'));
      exit;
   }
}
add_action('template_redirect', 'user_redirect_profile');


/** after logout redirect to login page */
function redirect_after_logout() {
   wp_redirect(site_url('online-verification'));
   exit;
}
add_action('wp_logout', 'redirect_after_logout');