# Performance Improvements for WooCommerce
Performance tweaks for the front-end and back-end of a store.

## Description

Performance tweaks related to orders on the front-end and the back-end of a store. Will also disable dashboard widgets for reviews and status in WooCommerce. Will hide the tags, featured and types admin columns from the product list.


## Installation


### Automated Installation

You can simply go to Plugins > Add New in the WordPress Admin. Next, search for "Performance Improvements for WooCommerce" and click Install Now. 

### Manual Installation

1. Upload the plugin file performance-improvements-for-woocommerce.zip to the ‘/wp-content/plugins/’ directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.

## Via WP-CLI
[`WP-CLI`](http://wp-cli.org/) is the official command-line interface for WordPress. You can install performance-improvements-for-woocommerce using the wp command like this:

```wp plugin install --activate https://github.com/lukecav/performance-improvements-for-woocommerce/archive/main.zip```

## Update via WP-CLI
```wp plugin install --activate https://github.com/lukecav/performance-improvements-for-woocommerce/archive/main.zip --force```

## Automatic Updates
Performance Improvements for WooCommerce supports the [GitHub Updater plugin](https://github.com/afragen/github-updater) WordPress. The plugin enables automatic updates from this GitHub Repository. You will find all information about the how and why at the [plugin wiki page](https://github.com/afragen/github-updater/wiki).

## Via Composer
From command run ```composer install``` and wait for the installation to complete.
Run ```composer require lukecav/performance-improvements-for-woocommerce```

## Changelog

**1.1.4**
* Delete the usage tracker cron event in WooCommerce.

**1.1.3**
* Hide the marketplace and my subscriptions submenus in WooCommerce.

**1.1.2**
* Disable the setup dashboard widget in WooCommerce 5.7.0 and 5.7.1.

**1.1.1**
* Disable lazy loading in WordPress 5.5 and disable no-cache headers in WooCommerce 4.4.0.

**1.1.0**
* Disable marketing hub in version 4.3.0.

**1.0.9**
* Remove the processing order count in WooCommerce from wp-admin.

**1.0.7**
* Disable the WooCommerce Admin merged into WooCommerce core in version 4.0.0.

**1.0.6**
* Remove the WooCommerce Admin Install Nag.

**1.0.5**
* Deregister block style from WooCommerce.

**1.0.4**
* Remove marketplace suggestions and connect your store to WooCommerce.com admin notice.

**1.0.3**
* Increase the CSV product exporter batch limit from 50 to a more usable 5000.

**1.0.2**
* Hide the “Connect your store to WooCommerce.com to receive extensions updates and support.” admin notice.

**1.0.1**
* Hide specific admin columns from product list.

**1.0.0**
* Initial release.
