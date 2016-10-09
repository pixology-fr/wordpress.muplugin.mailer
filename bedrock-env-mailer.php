<?php
/**
 * Plugin Name: Bedrock Env Mailer
 * Description: Use the pre-existing env() shortcut method to overwrite your PHPMailer connection details manually through environment variables. Rewrote and forked https://github.com/aaemnnosttv/bedrock-mailtrap since it was specific to mailtrap and I wanted to configure PHPMailer server credentials via environment variables for dev, staging, and production.
 * Author: Jeremy Sarda
 * Author URI: https://github.com/hackur/bedrock-env-mailer
 *
 * Version: 0.0.1
 */

/**
 * If you set WP_MAIL_SMTP_AUTH to any truthy value, it assumes you've provided the rest of the SMTP info as well.
 */
if ( env('WP_MAIL_SMTP_AUTH') ) {

add_action('phpmailer_init', function($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->Host     = env('WP_MAIL_HOST');
    $phpmailer->Port     = env('WP_MAIL_PORT');
    $phpmailer->Username = env('WP_MAIL_USERNAME');
    $phpmailer->Password = env('WP_MAIL_PASSWORD');
}, 999);
	
}
