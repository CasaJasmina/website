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


	<div class="columns small-12 medium-12 large-12 header-img">

		<img class="wide-image" src='<?php echo bloginfo('template_directory').'/images/things-header.jpg'; ?>' />

		<div class="row ">
			<div class="header-content">
				<div class="columns small-12 medium-12 large-6  header-claim">
					<strong>
						Project built, installed, and under development </br>inside Casa Jasmina
					</strong>
				</div>

				<div class="columns small-12 medium-12 large-5  header-categories">

					<div class="columns small-2 medium-2 large-4 category">
						<a href="<?php echo site_url(); ?>/category/c_objects/">
							<img src='<?php echo bloginfo('template_directory').'/images/cobject.png'; ?>' />
							<div class="category-name"><span>connected objects</span></div>
						</a>
					</div>
					<div class="columns small-2 medium-2 large-4 category">
						<a href="<?php echo site_url(); ?>/category/furniture/">
							<img src='<?php echo bloginfo('template_directory').'/images/furniture.png'; ?>' />
						</a>
						<div class="category-name"><span>furnitures</span></div>

					</div>
					<div class="columns small-2 medium-2 large-4 category">
						<a href="<?php echo site_url(); ?>/category/art/">
							<img src='<?php echo bloginfo('template_directory').'/images/art.png'; ?>' />
							<div class="category-name"><span>art pieces</span></div>
						</a>
					</div>
					<div class="columns small-2 medium-2 large-4 category">
						.
					</div>
					<div class="columns small-2 medium-2 large-4 category">
						<a href="<?php echo site_url(); ?>/category/tools/">
							<img src='<?php echo bloginfo('template_directory').'/images/tools.png'; ?>' />
						</a>
						<div class="category-name"><span>tools</span></div>

					</div>
					<div class="columns small-2 medium-2 large-4 category">
						<a href="<?php echo site_url(); ?>/category/entertainment/">
							<img src='<?php echo bloginfo('template_directory').'/images/entertain.png'; ?>' />
						</a>
						<div class="category-name"><span>entertainment</span></div>

					</div>
				</div>
			</div>

		</div>

	</div>


	<?php



	// The Query

	//ask for the last 4 featured posts
	$args = array( 'post_type' => 'projects', 'posts_per_page' => 16 );
	$the_query = new WP_Query( $args);
	?>
	<?php
	if ( $the_query->have_posts() ) {
		echo '<div class="entry-content">';
		?>
		<div>
			<div id="first-post-row" class="row" > <?php
			while ( $the_query->have_posts()) {

				$the_query->the_post();

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
					</a>

				</div>
				<?php

				//	}

			}
			?>
		</div>
		<?php arduino_paging_nav(); ?>

	</div>

	<?php

} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>

<?php get_footer(); ?>
