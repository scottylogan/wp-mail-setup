<?php
/**
 * Plugin Name: Mail Setup
 * Plugin URI: https://github.com/scottylogan/wp-mail-setup
 * Description: Configures mail properties using site name and url
 * Author: Scotty Logan
 * Author URI: https://github.com/scottylogan/wp-mail-setup
 * Version: 0.1.0
 *
 */

/*
 * Force the use of SMTP: this works on AWS Elastic Beanstalk,
 * whereas the default and Sendmail don't.
 */
function emergency_phpmailer_init( $phpmailer ) {
    $phpmailer->IsSMTP();
}

/*
 * Set the from address by replacing spaces in the
 * blog name with dashes, and using site_url to 
 * determine the host/domain name
 */
function emergency_mail_from( $email_address )
{
    $domain = str_replace('http://', '', site_url('','http'));
    $user = str_replace(' ', '-', get_bloginfo('name', 'display'));
    return $user . '@' . $domain;
}

/*
 * Set the from name from the blog name
 */
function emergency_mail_from_name( $email_from )
{
    return get_bloginfo('name', 'display');
}

add_action( 'phpmailer_init', 'emergency_phpmailer_init');
add_filter( 'wp_mail_from', 'emergency_mail_from');
add_filter( 'wp_mail_from_name', 'emergency_mail_name');

