<?php
/**
 * @package LCT Profiles
 * @version 1.0
 */

/**
 * Register the custom post
 */

class LCT_Profiles_Register_Posts
{
    protected $lct_profiles = 'lct_profiles';
    protected $args;
    protected $labels;

/**
 * Add action to register the post type and flush permalinks on plugin activation
 */
    
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
        register_activation_hook( __FILE__, 'lct_profiles_flush_rewrites' );
    }

    public function register_post_type() {
        
        $this->labels = array( 
            'name'               => _x( 'Profiles', 'lct_profiles' ),
            'singular name'      => _x( 'Profiles', 'lct_profiles' ),
            'add_new'            => _x( 'Add New Profile', 'lct_profiles' ),
            'add_new_item'       => __( 'Add New Profile', 'lct_profiles' ),
            'edit_item'          => __( 'Edit Profile', 'lct_profiles' ),
            'new_item'           => __( 'New Profile', 'lct_profiles' ),
            'all_items'          => __( 'All Profiles', 'lct_profiles' ),
            'view_item'          => __( 'View Profile', 'lct_profiles' ),
            'search_items'       => __( 'Search Profiles', 'lct_profiles' ),
            'not_found'          => __( 'No Profiles', 'lct_profiles' ),
            'not_found_in_trash' => __( 'No Profiles found in trash', 'lct_profiles' )
        );
    
        $this->args = array(
            'labels' => $this->labels,
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
            'show_in_rest' => true,
            'rewrite' => array( 'slug' => 'profiles' )
        );
        
        register_post_type( $this->lct_profiles, $this->args );
    }

/**
 * Flush rewrite rules
 */

    function lct_profiles_flush_rewrites() {
        register_post_type();
        flush_rewrite_rules();
    }
}

new Lct_Profiles_Register_Posts();