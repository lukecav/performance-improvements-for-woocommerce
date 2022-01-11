<?php
/**
 * Plugin Name:          Performance Improvements for WooCommerce
 * Plugin URI:           https://github.com/lukecav/performance-improvements-for-woocommerce
 * Description:          Performance tweaks for WooCommerce.
 * Version:              1.1.4
 * Author:               Luke Cavanagh
 * Author URI:           https://github.com/lukecav
 * Requires at least:    5.6
 * Requires PHP:         7.0
 * License:              GPL2
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * WC requires at least: 5.0
 * WC tested up to:      6.1
 *
 * @package WooCommerce_Performance_Improvements
 * @author  Luke Cavanagh
 */
 
// Remove order total from my account orders
add_filter('woocommerce_my_account_my_orders_columns', 'remove_my_account_order_total', 10);

function remove_my_account_order_total($order){
  unset($order['order-total']);
  return $order;
}

// Remove order count from admin menu
add_filter( 'woocommerce_include_processing_order_count_in_menu', '__return_false' );

// Disable status dashboard widget
function disable_woocommerce_status_remove_dashboard_widgets() {
	remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_woocommerce_status_remove_dashboard_widgets', 40);
 
// Disable reviews dashboard widget
function disable_woocommerce_reviews_remove_dashboard_widgets() {
	remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_woocommerce_reviews_remove_dashboard_widgets', 40);

// Hide tags, featured and type admin columns from the product list
function unset_some_columns_in_product_list( $column_headers ) { 
        unset($column_headers['product_tag']);
        unset($column_headers['featured']);
        unset($column_headers['product_type']);
        return $column_headers;
}
add_filter( 'manage_edit-product_columns', 'unset_some_columns_in_product_list' );

// Disable background image regeneration
add_filter( 'woocommerce_background_image_regeneration', '__return_false' );

// Disable password strength
function deregister_or_dequeue_scripts() {
    wp_dequeue_script('wc-password-strength-meter');
}

add_action('wp_print_scripts', 'deregister_or_dequeue_scripts', 20);

// Increase the default batch limit of 50 in the CSV product exporter to a more usable 5000
add_filter( 'woocommerce_product_export_batch_limit', function () {
    return 5000;
}, 999 );

// Remove marketplace suggestions
add_filter( 'woocommerce_allow_marketplace_suggestions', '__return_false' );

// Remove connect your store to WooCommerce.com admin notice
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );

// Deregister block style from WooCommerce
add_filter( 'woocommerce_show_admin_notice', 'wc_disable_wc_admin_install_notice', 10, 2 );
function wc_disable_wc_admin_install_notice( $notice_enabled, $notice ) {
	if ( 'wc_admin' === $notice ) {
		return false;
	}
	return $notice_enabled;
}

// Disable the WooCommerce Admin
add_filter( 'woocommerce_admin_disabled', '__return_true' );

// Disable the WooCommere Marketing Hub
add_filter( 'woocommerce_admin_features', 'disable_features' );

function disable_features( $features ) {
	$marketing = array_search('marketing', $features);
	unset( $features[$marketing] );
	return $features;
}

// Supress WooCommerce Helper Admin Notices
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );

// Remove Processing Order Count in wp-admin
add_filter( 'woocommerce_menu_order_count', 'false' );

// Disable native lazy loading
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

// Disable WooCommerce no-cache headers
add_filter( 'woocommerce_enable_nocache_headers', '__return_false' );

// Disable setup widget
function disable_woocommerce_setup_remove_dashboard_widgets() {
	remove_meta_box( 'wc_admin_dashboard_setup', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_woocommerce_setup_remove_dashboard_widgets', 40);

// Hide marketplace and my subscriptions submenus
function wc_hide_woocommerce_menus() {
	//Hide "WooCommerce → Marketplace".
	remove_submenu_page('woocommerce', 'wc-addons');
	//Hide "WooCommerce → My Subscriptions".
	remove_submenu_page('woocommerce', 'wc-addons&section=helper');
}

add_action('admin_menu', 'wc_hide_woocommerce_menus', 71);

// Delete the WooCommerce usage tracker cron event
wp_clear_scheduled_hook( 'woocommerce_tracker_send_event' );
