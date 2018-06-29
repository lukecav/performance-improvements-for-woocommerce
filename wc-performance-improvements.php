<?php
/**
 * Plugin Name:          Performance Improvements for WooCommerce
 * Plugin URI:           https://github.com/lukecav/performance-improvements-for-woocommerce
 * Description:          Performance tweaks related to orders on the front-end and the back-end of a store. Will also disable dashboard widgets for reviews and status in WooCommerce. Also includes specific tweaks for products in the back-end of the store.
 * Version:              1.0.2
 * Author:               Luke Cavanagh
 * Author URI:           https://github.com/lukecav
 * License:              GPL2
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * WC requires at least: 3.0.0
 * WC tested up to:      3.4.3
 *
 * @package WooCommerce_Performance_Improvements
 * @author  Luke Cavanagh
 */
 
// Remove order status from my account orders
add_filter('woocommerce_my_account_my_orders_columns', 'remove_my_account_order_status', 10);

function remove_my_account_order_status($order){
  unset($order['order-status']);
  return $order;
}

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

// Disable Connect your store to WooCommerce.com to receive extensions updates and support admin notice
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );
