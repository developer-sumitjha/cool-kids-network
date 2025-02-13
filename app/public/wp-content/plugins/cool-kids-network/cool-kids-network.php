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


// Initialize components
CKN_Roles::register();
CKN_Registration::init();
CKN_Login::init();
