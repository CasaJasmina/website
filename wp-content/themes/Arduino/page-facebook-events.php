<?php
/**
* The template for displaying all projects
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
* @package WordPress
* @subpackage Casa_Jasmina
* @since Casa Jasmina 1.0
*/

get_header(); ?>

<div id="content" class="page-boxes page-things">
	<!--
	<div class=header>-->



	<?php
	$cat = get_term_by('name', single_cat_title('',false), 'category');

	?>

	<div>
		<img src="<?php fbe_image('ad'); ?>" alt="" />
</div>





		<?php

		$args = array (
		'post_type' => 'facebook_events',
		'posts_per_page' => -1,
		'key'=> 'event_starts',
		'orderby'			=> 'meta_value_num',
		'order' => 'ASC',
		);
		query_posts($args);
		if ( have_posts() ) {
			echo '<div class="entry-content">';
			?>

			<div id="facebook-post-row" class="row" >

				<?php
				while ( have_posts() ) : the_post();
				$event_start_day = get_fbe_date('event_starts','j');
				$event_start_th = get_fbe_date('event_starts','S');
				$event_start_month = get_fbe_date('event_starts','M ');

				?>


				<div class="columns small-12 medium-6 large-3 facebook-thumbs">

					<a href="<?php echo get_permalink() ?>" class="event">

						<?php
						if ( has_post_thumbnail() ) {
							echo the_post_thumbnail( 'thumbnail-front' );
						}
						?>

					<span class="title">
							<span>
								<?php echo  " ".get_the_title()." "?>
							</span>
						</span>
					</a>

					<div class="fb-container">
					<div class="Back-cricle-day">
								<p class="facebook-day">
								<?php echo $event_start_day  ?>
								<span class="th">
							<?php echo	$event_start_th ?>
						</span>
							</p>
						</div>
						<p class="fb-month">
						<?php echo $event_start_month ?>
					</p>

			</div></div>

			<?php endwhile; ?>
		</div>


	</div>
	<?php }else {
		get_template_part( 'content', 'none' );
	}
	?>
	<?php
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>
	<?php get_footer(); ?>
