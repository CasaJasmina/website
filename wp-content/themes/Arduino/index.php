<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Arduino
 * @since Arduino 1.0
 */


get_header(); ?>


<div id="content" class="page">
	<div class="row" role="main">
		<?php if ( have_posts() ) : ?>

		<div>
			<div id="first-post-row" class="row" >
				<div class="columns small-12 medium-12 large-9">


					<?php while ( have_posts() ) : the_post(); ?>



					<div class="columns small-12 medium-12 large-12 post-list">


						<span class="credits">

							<span class="entry-date"><?php echo get_the_date(); ?></span>
							<span class="entry-author"><?php echo  "by ".get_the_author(); ?> </span>

						</span>



						<a href="<?php echo get_permalink() ?>"  
							class="<?php foreach ($categories as $cat){ echo($cat->cat_name). " "; } ?>
							">

							<?php
							if ( has_post_thumbnail() ) {
								echo the_post_thumbnail( 'thumbnail-big' ); 
							}
							?>

							<span class="title">
								<span>
									<?php echo  " ".get_the_title()." "?>
								</span>
							</span>

						</a>

						<span class="content">
							<span>
								<?php the_content(" Continue reading this article ->", true ); ?>

							</span>
						</span>


					</div>


				<?php endwhile; ?>

			</div>

		</div>
	</div>

	<?php arduino_paging_nav(); ?>

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>