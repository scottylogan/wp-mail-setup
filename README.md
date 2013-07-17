wp-mail-setup
=============

Simple wordpress plugin to configure mail based on existing settings.  I created this plugin for use with a WordPress blog running on Amazon Elastic Beanstalk, since the default settings didn't work with our mail gateways.

Configures WordPress' internal PHPMailer to:

* use SMTP for delivery
* use the blog name as the sender display name
* use the hostname from site_url as the sender domain
* use the blog name, with spaces replaced with dashes, as the sender name


