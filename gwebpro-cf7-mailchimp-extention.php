<?php
/*
Plugin Name: Gwebpro Contact Form 7 Mailchimp Extention
Plugin URI: http://www.gwebpro.com/gwebpro-mailchimp-cf7-extension
Description: Integrate MailChimp with Contact Form 7.
Author: Gwebpro
Author URI: http://www.gwebpro.com/
Text Domain: contact-form-7
Domain Path: http://www.gwebpro.com/
Version: 1.0.0 
*/
define( 'GWEBPRO_MCE_VERSION', '1.0.0' );
define( 'GWEBPRO_MCE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'GWEBPRO_MCE_PLUGIN_NAME', trim( dirname( GWEBPRO_MCE_PLUGIN_BASENAME ), '/' ) );
define( 'GWEBPRO_MCE_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'GWEBPRO_MCE_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
register_activation_hook( __FILE__ ,'gweb_cf7_chm');
require_once( GWEBPRO_MCE_PLUGIN_DIR . '/lib/functions.php' );
require_once( GWEBPRO_MCE_PLUGIN_DIR . '/lib/enqueue.php' );

