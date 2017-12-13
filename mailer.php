<?php
/**
 * @author  Simon Bärlocher <s.baerlocher@sbaerlocher.ch>
 * @note    If `WP_MAIL_SMTP_AUTH` is true it's assumed that the rest of the SMTP credentials exist.
 */
/*
 * Plugin Name: Mailer
 * Plugin URI:  https://github.com/sbaerlocher/wordpress.muplugin.mailer
 * Description: Use the pre-existing env() shortcut method to overwrite your PHPMailer connection details manually
 * through environment variables. Rewrote and forked https://github.com/hackur/bedrock-env-mailer since it was
 * specific to mailtrap.io and I wanted to configure PHPMailer server credentials across multiple environments.
 * Version:     1.1.0
 * License:     MIT
 * License URI: https://sbaerlo.ch/er/license
 * Author:      Simon Bärlocher
 * Author URI:  https://github.com/sbaerlocher
 * Text Domain: mailer
 * GitHub Plugin URI: https://github.com/sbaerlocher/wordpress.muplugin.mailer
 * GitHub Branch: master
 */

if(!defined( 'ABSPATH' ) and !env( 'WP_MAIL_SMTP_AUTH' )) exit;

add_action( 'phpmailer_init', function ( PHPMailer $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = env( 'WP_MAIL_SMTP_USERNAME' );
    $phpmailer->Password   = env( 'WP_MAIL_SMTP_PASSWORD' );
    $phpmailer->Host       = env( 'WP_MAIL_SMTP_HOST' );
    $phpmailer->Port       = env( 'WP_MAIL_SMTP_PORT' );
    $phpmailer->SMTPSecure = env( 'WP_MAIL_SMTP_SECURE' );
    $phpmailer->SMTPDebug  = env( 'WP_MAIL_SMTP_DEBUG' );
}, 999 );
