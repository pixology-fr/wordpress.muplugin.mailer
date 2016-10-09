<?php
/**
 * @author  Jeremy Sarda <jcsarda@gmail.com>
 * @note    If `WP_MAIL_SMTP_AUTH` is true it's assumed that the rest of the SMTP credentials exist.
 */
/*
 * Plugin Name: Bedrock Environment Mailer
 * Plugin URI: https://github.com/hackur/bedrock-env-mailer
 * Description: Use the pre-existing env() shortcut method to overwrite your PHPMailer connection details manually
 * through environment variables. Rewrote and forked https://github.com/aaemnnosttv/bedrock-mailtrap since it was
 * specific to mailtrap.io and I wanted to configure PHPMailer server credentials across multiple environments.
 * Version: 0.0.1
 * License: MIT
 * Author: Jeremy Sarda
 * Author URI: https://github.com/hackur
 * Text Domain: bedrock-env-mailer
 */

defined('ABSPATH') or die('This file cannot be visited directly.');

if (env('WP_MAIL_SMTP_AUTH')) {
    add_action('phpmailer_init', function (PHPMailer $phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->SMTPAuth = true;
        $phpmailer->Host     = env('WP_MAIL_HOST');
        $phpmailer->Port     = env('WP_MAIL_PORT');
        $phpmailer->Username = env('WP_MAIL_USERNAME');
        $phpmailer->Password = env('WP_MAIL_PASSWORD');
    }, 999);
}
