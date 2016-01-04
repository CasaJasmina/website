<?php
/**
* The template for displaying all pages
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


<div id="content" class="page-boxes page-home">

	<!-- this is the mega image that stays on top -->

<div class="row full-width">
	<div class="columns small-12 medium-12 large-12 header-img">
	<!--	<img class="wide-image" src='<?php echo bloginfo('template_directory').'/images/header1.jpg'; ?>' /> -->
	<div class="wideone"></div>
		<div class="row">
			<div class="header-content">
				<div class="header-claim">
					<strong>
						The open source way </br>to the connected home
					</strong>
				</div>
			</div>
		</div>
	</div>
</div>






	<!-- this add my custom top sidebar to the home page  -->

	<?php if ( is_active_sidebar( 'home_top_1' ) ) : ?>
		<div>
			<div id="top-sidebar" class="row top-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'home_top_1' ); ?>
			</div>
		</div>
	<?php endif; ?>





	<?php

	// The Query

	//ask for the last 4 featured posts
	$the_query = new WP_Query( 'category_name=featured&post_per_page=4');

	if ( $the_query->have_posts() ) {

		?>
		<div>
			<div id="first-post-row" class="row" > <?php
			$i = 0;
			while ( $the_query->have_posts() && $i<4) {
				$i++;
				$the_query->the_post();

				if ( has_category()){ //get the category
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
							</span>

						</a>
					</div>
					<?php

				}

			}
			?>   </div>
		</div>

		<?php

	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();


	?>



	<!-- this draws the middel sidebar -->

	<?php if ( is_active_sidebar( 'home_middle_1' ) ) : ?>
		<div id="middle-sidebar">
			<div  class="row middle-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'home_middle_1' ); ?>
			</div>
		</div>
	<?php endif; ?>



	<!-- now we draw the second line of posts -->

	<?php
	// The Query

	//ask for for posts from 5 to 8
	$the_query = new WP_Query( 'category_name=featured&post_per_page=4&offset=4');

	if ( $the_query->have_posts() ) {

		?>
		<div>
			<div id="first-post-row" class="row" > <?php
			$i = 0;
			while ( $the_query->have_posts() && $i<4) {
				$i++;
				$the_query->the_post();

				if ( has_category()){ //get the category
					$categories = get_the_category();

					?>
					<div class="columns small-12 medium-6 large-3 banner">

						<a href="<?php echo get_permalink() ?>"
							class="
							<?php
							foreach ($categories as $cat){
								echo($cat->cat_name). " ";
							}
							?>
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
							</span>

						</a>
					</div>
					<?php

				}

			}
			?>   </div>
		</div>

		<?php

	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();


	?>
















	<!--
	<>
	<div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div>
	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

	</div>

	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
	</div>
	-->
</div>
<?php get_footer(); ?>
