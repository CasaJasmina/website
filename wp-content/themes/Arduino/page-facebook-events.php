
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
		'order' => 'ASC',
		);
		query_posts($args);
		if ( have_posts() ) {
			echo '<div class="entry-content">';
			?>
			<div id="first-post-row" class="row" >

				<?php
				while ( have_posts() ) : the_post();

				//	if ( has_category()){ //get the category
				$categories = get_the_category();

				?>


				<div class="columns small-12 medium-6 large-3 banner">

					<a href="<?php echo get_permalink() ?>"
						class="<?php foreach ($categories as $cat){ echo($cat->cat_name). " "; } ?>
						">

						<?php
						if ( has_post_thumbnail() ) {
							echo the_post_thumbnail( 'thumbnail-front' );
						}
						$event_image = get_fbe_image('cover');
							echo $event_image;
						?>


						<span class="title">
							<span>
								<?php echo  " ".get_the_title()." "?>
							</span>
							<br>
							<span class="author">
								by <?php the_field('author'); ?>
							</span>
						</span>

						<div class="categories">


							<?php foreach ($categories as $cat){
								echo '<span class='. $cat->slug. '></span>';
							}

							// always good to see exactly what you are working with
							//var_dump($categories);

							?>
						</div>


				</div>
			<?php endwhile; ?>

		</div>
		<?php arduino_paging_nav(); ?>

	</div>

	<?php }else {
		get_template_part( 'content', 'none' );
	}
	?>
	<?php
	/* Restore original Post Data */
	wp_reset_postdata();
	?>

	<?php get_footer(); ?>




<?php

 $fbe_query = new WP_Query( $args );
 if( $fbe_query->have_posts() ):
 while ( $fbe_query->have_posts() ) : $fbe_query->the_post();

 $event_title = get_the_title();
 $event_desc = get_the_content();
 $event_image = get_fbe_image('cover');

 ?>
 <img src="<?php echo get_fbe_image('ad'); ?>" alt="" />
 <h1><?php echo $event_title; ?></h1>
 <p><?php echo $event_desc; ?></p>
 <?php

 endwhile;
 endif;

 wp_reset_query();

 ?>
