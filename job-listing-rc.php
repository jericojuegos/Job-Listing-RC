<?php
/**
 * Plugin Name:       Job Listing RC
 * Description:       This plugin is for job listing.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Jerico Juegos
 * Author URI:        https://jericojuegos.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       job-listing-rc
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'jobplace_init_menu' );

/**
 * Init Admin Menu.
 *
 * @return void
 */
function jobplace_init_menu() {
    add_menu_page( __( 'Job Listing', 'jobplace'), __( 'Job Listing', 'jobplace'), 'manage_options', 'jobplace', 'jobplace_admin_page', 'dashicons-admin-post', '2.1' );
}

/**
 * Init Admin Page.
 *
 * @return void
 */
function jobplace_admin_page() {
    require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
}

add_action( 'admin_enqueue_scripts', 'jobplace_admin_enqueue_scripts' );

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function jobplace_admin_enqueue_scripts() {
    wp_enqueue_style( 'jobplace-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
    wp_enqueue_script( 'jobplace-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
}
