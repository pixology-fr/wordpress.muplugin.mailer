# Mailer

This plugin is a simple always-on integration that hijacks emails as they are being sent by wordpress's PHPMailer library.

You have set your `WP_MAIL_SMTP_AUTH` environment variable to a value that PHP considers to be true. This can get weird with PHP, so be careful and read the docs.

See: <http://php.net/manual/en/language.types.boolean.php>

The package is installed as an mu-plugin, which is then autoloaded by the roots/bedrock mu-plugin autoloader.

**_WARNING:_ This plugin assumes the rest of the values exist & could override your existing mail configuration all together if `WP_MAIL_SMTP_AUTH` is `true` and the rest of the configuration is empty or incorrect. You could disable email from your wordpress site if you don't configure it properly.**

## Installation

Add the repository to your composer.json file.

```json
  "repositories": [
      {
        "type": "vcs",
        "url": "https://github.com/pixology-fr/wordpress.muplugin.mailer"
      }
    ]
```

Require the package with Composer.

```bash
composer require sbaerlocher/mailer
```

Install the package and set your `WP_MAIL_SMTP_AUTH` to `true` - then specify the rest of your SMTP credentials as seen below.

## Example Snippet for Gmail SMTP

```YAML
# ... ^ Other Environment Specific Data Such as DB Credentials ^ ...

WP_MAIL_SMTP_AUTH='true'
WP_MAIL_SMTP_USERNAME='your.email@gmail.com'
WP_MAIL_SMTP_PASSWORD='your.high.security.password'
WP_MAIL_SMTP_HOST='mail.google.com'
WP_MAIL_SMTP_PORT='587'
WP_MAIL_SMTP_SECURE='tls'
WP_MAIL_SMTP_DEBUG='0'
```

### Quick Primer on how PHP & Bedrock Use Environment Variables

Bedrock uses [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) to parse key/value pairs from the `.env` file which is typically in your `.gitignore` and has different values for different environments (i.e. development, staging, production). Then, it uses [oscarotero/env](https://github.com/oscarotero/env) to provide a helper method `env('ENV_VARIABLE')` to retrieve the data from the current environment.

You can set your `WP_MAIL_***` SMTP credentials in your `.env` file or by [using other methods of setting environment variables](https://github.com/vlucas/phpdotenv#php-dotenv) that PHP will recognize.

For instance, Heroku allows you to specify PHP_ENV variables for an app directly through their dashboard and CLI interfaces rather than having to manually create a `.env` file on their server. The data is retrieved using the `env()` helper method just the same.

## Author

* [Simon Bärlocher](https://sbaerlocher.ch)

## License

This project is under the MIT License. See the [LICENSE](https://sbaerlo.ch/er/licence) file for the full license text.

## Copyright

(c) 2017, Simon Bärlocher
