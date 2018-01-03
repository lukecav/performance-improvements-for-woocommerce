<?php
/**
 * Plugin Name:          Performance Improvements for WooCommerce
 * Plugin URI:           https://github.com/lukecav/performance-improvements-for-woocommerce
 * Description:          Performance tweaks related to orders on the front-end and the back-end of a store. Will also disable dashboard widgets for reviews and status in WooCommerce.
 * Version:              1.0.0
 * Author:               Luke Cavanagh
 * Author URI:           https://github.com/lukecav
 * License:              GPL2
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * WC requires at least: 3.0.0
 * WC tested up to:      3.3.0
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
