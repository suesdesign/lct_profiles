<?php
/*
Template Name: LCT profiles
*** LCT Profiles 1.0 ***
*/
?>


<?php echo "<div id='lct_profiles'>"; ?>

<?php  $args = array(
		'posts_per_page' => '-1',
		'post_type' => 'lct_profiles',
		'paged' => get_query_var('page') ? get_query_var('page') : 1
	);?>

<?php $lct_profiles = new WP_Query ( $args ); ?>

<?php if ( $lct_profiles->have_posts () ) : ?>
	<?php while ( $lct_profiles->have_posts() ) : $lct_profiles->the_post(); ?>

	<div class="lct_profile">
		<h2><?php the_title(); ?></h2>
			<?php if ( has_post_thumbnail() ) :?>
				<?php the_post_thumbnail( 'medium', array('class' => 'alignright')); ?>
			<?php endif; ?>
		<?php the_content() ?>
	</div><!--.lct_profile-->

<?php endwhile; else :?>
<?php endif; ?>
</div><!--#lct_profiles-->


