<?php
/**
 * @package LCT Profiles
 * @version 1.0
 */

 /*
Plugin Name: LCT Profiles
Plugin URI: http://suesdesign.co.uk/
Description: Profiles of Leeds Creative Timebank committee members
Author: Sue Johnson
Version: 1.0
Author URI: http://suesdesign.co.uk/
*/

/**
 * Exit if this file is accessed directly
 */

if( ! defined('ABSPATH') ) {
    exit;
}



/**
 * Required files
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-lct_profiles_register_posts.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-lct_profiles_templates.php';