<?php

/**
 * Plugin Name: Cool Kids Network
 * Description: Implements user management and features for the Cool Kids Network.
 * Version: 1.0
 * Author: Sumit Jha
 */

// Security check
defined('ABSPATH') || exit;

// Autoload classes
require_once plugin_dir_path(__FILE__) . 'includes/class-ckn-roles.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-ckn-registration.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-ckn-login.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-ckn-dashboard.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-ckn-api.php';




// Initialize components
CKN_Roles::register();
CKN_Registration::init();
CKN_Login::init();
CKN_Dashboard::init();
CKN_API::init();


// Enqueue
add_action('wp_enqueue_scripts', 'ckn_enqueue_scripts');

function ckn_enqueue_scripts()
{
    wp_enqueue_style('ckn-style', plugin_dir_url(__FILE__) . '/assets/style.css');
}
