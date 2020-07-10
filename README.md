# Performance Improvements for WooCommerce
Performance tweaks for the front-end and back-end of a store.

## Description

Performance tweaks related to orders on the front-end and the back-end of a store. Will also disable dashboard widgets for reviews and status in WooCommerce. Will hide the tags, featured and types admin columns from the product list.


## Installation


### Automated Installation

With WordPress 2.7 or above, you can simply go to Plugins > Add New in the WordPress Admin. Next, search for "Performance Improvements for WooCommerce" and click Install Now. 

### Manual Installation

1. Upload the plugin file performance-improvements-for-woocommerce.zip to the ‘/wp-content/plugins/’ directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.

## Via WP-CLI
[`WP-CLI`](http://wp-cli.org/) is the official command-line interface for WordPress. You can install performance-improvements-for-woocommerce using the wp command like this:

```wp plugin install --activate https://github.com/lukecav/performance-improvements-for-woocommerce/archive/main.zip```

## Update via WP-CLI
```wp plugin install --activate https://github.com/envato/wp-envato-market/archive/master.zip --force```

## Automatic Updates
Performance Improvements for WooCommerce supports the [GitHub Updater plugin](https://github.com/afragen/github-updater) WordPress. The plugin enables automatic updates from this GitHub Repository. You will find all information about the how and why at the [plugin wiki page](https://github.com/afragen/github-updater/wiki).

## Changelog

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
