<?php
/**
 * @package LCT Profiles
 * @version 1.0
 */

/**
 * Register the shortcode to create the profiles
 */

class LCT_Profiles_Shortcode
{
 protected $profile_template_path;

/**
 * Add action to register the shortcode
 */
    
    public function __construct() {
        add_action( 'init', array( $this, 'lct_register_shortcode' ) );
        
    }

    public function lct_shortcode() {
        
       // Buffer the output so it doesn't appear at the top of the page
	ob_start();
	$profile_template_path = plugin_dir_path( __FILE__ ) . '../templates/lct_profiles-page.php';
	
	include_once $profile_template_path;
	return ob_get_clean();
    }

    public function lct_register_shortcode(){
        add_shortcode( 'lct_profiles', array( $this , 'lct_shortcode' ) );
    }


}

new LCT_Profiles_Shortcode();