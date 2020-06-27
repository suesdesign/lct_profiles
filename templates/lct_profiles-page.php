<?php
/*
Template Name: LCT profiles
*** LCT Profiles 1.0 ***
*/
?>

<?php 
add_action( 'genesis_loop', 'lct_profiles_loop' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 5 );
remove_action( 'genesis_entry_header','genesis_do_post_title' );
add_action( 'genesis_entry_header','lct_profiles_title' );
/**
 * Display the post title (without link).
 *
 */
function lct_profiles_title() {
 echo '<h2 class="title">' . get_the_title() . '</h2> ';
}

function lct_profiles_loop() {
	global $paged;
	global $query_args;
	$args = array(
	    'post_type' => array('lct_profiles'),
	    'posts_per_page' => -1
	);

	add_action( 'genesis_entry_content', 'lct_profiles_featured_image', 8 );
/**
 * Display featured image (without a link).
 *
 * Check to see if the post has a thumbnail and, if so, display the thumbnail.
 *
 */
	function lct_profiles_featured_image() {
		if ( ! has_post_thumbnail() ) {
			return;
		}
		$attr = array (
			'class' => 'alignleft',
			'context' => 'archive',
			'alt' => get_the_title(),
		);
		echo '<span class="featured-image">';
		the_post_thumbnail( 'medium', $attr );
		echo '</span>';
	}

	genesis_custom_loop( wp_parse_args($query_args, $args) );
}

genesis();

?>


