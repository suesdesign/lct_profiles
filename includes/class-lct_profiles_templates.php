<?php
/**
 * @package LCT Profiles
 * @version 1.0
 */

/**
 * Get template from theme, if not in theme get template from plugin
 */

class LCT_Profiles_Templates
{
    protected $template_path;
    protected $theme_file;
    
    public function __construct() {
        add_filter( 'template_include', array( $this, 'lct_templates' ) );
    }
    
    public function lct_templates($original_template) {
        if ( is_page('management-committee') ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
                if ( $this->theme_file = locate_template( array ( 'lct_profiles-page.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . '../templates/lct_profiles-page.php';
                    }
            }

            else {
                $this->template_path = $original_template;
            }
           
            return $this->template_path;
    }
}

new LCT_Profiles_Templates();