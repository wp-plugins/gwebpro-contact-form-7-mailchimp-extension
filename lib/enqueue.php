<?php


function wpcf7_mce_admin_enqueue_scripts() 
{

	global $plugin_page;

	if ( ! isset( $plugin_page ) || 'wpcf7' != $plugin_page )
		return;

	wp_enqueue_style( 'wpcf7-gweb-admin', GWEBPRO_MCE_PLUGIN_URL . '/assets/css/style-gweb.css', array(), 'all' );

	wp_enqueue_script( 'wpcf7-gweb-admin', GWEBPRO_MCE_PLUGIN_URL . '/assets/js/scripts-gweb.js', array( 'jquery', 'wpcf7-admin' ),true );


}
add_action( 'admin_print_scripts', 'wpcf7_mce_admin_enqueue_scripts' );


/* Custom ajax loader */
function wpcf7_mce_ajax_loader() 
{

	return  GWEBPRO_MCE_PLUGIN_URL . '/assets/images/fading-squares.gif';

}
add_filter('wpcf7_ajax_loader', 'wpcf7_mce_ajax_loader');