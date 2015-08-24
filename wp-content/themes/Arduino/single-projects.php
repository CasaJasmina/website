<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Casa_Jasmina
 * @since Casa Jasmina 1.0
 */

get_header(); ?>

<div id="content" class= "page page-single-thing">

	<div class="row">

	<?php /*
	<div class="large-4 columns">
		<?php get_sidebar(); ?>
	</div>
*/?>
<div class="row">
<div class="columns small-12 medium-12 large-9">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
  if ( has_category()){ //get the category
  	$categories = get_the_category();
  }
  ?>
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
</div>
<div class="columns small-12 medium-12 large-3">
	<div class="excerpt">
			<?php the_field('excerpt'); ?>
	</div>

	<div class="project_sidebar_heading" >
	Author
	</div>
	<span class="author">
		<?php the_field('author'); ?>
	</span>

	<div class="project_sidebar_heading" >
	Website
	</div>
	<span class="website">
		<a href='<?php the_field('website'); ?> '><?php the_field('website'); ?></a>
	</span>

	<div class="project_sidebar_heading" >
	Contribute
	</div>
	<span class="github">
		<a href='<?php the_field('github'); ?> '>
		<img src='<?php echo bloginfo('template_directory').'/images/github.jpg'; ?>' />
	</a>
	</span>

	<div class="project_sidebar_heading" >
	Category
	</div>
	<div class="categories">




			<?php foreach ($categories as $cat){
				echo '<span class='. $cat->slug. '></span>';
			}

			// always good to see exactly what you are working with
			//var_dump($categories);

			?>

	</div>

</div>
</div>

<div class="columns small-12 medium-12 large-9">
  <span class="content">
  	<span>
<?php the_field('description'); ?>
  	</span>
  </span>




  <div class="entry">


				</div>


				<div class="navigation singlePost">

					<?php arduino_post_nav(); ?>

				</div>



				<?php comments_template(); ?>

			<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>

		<?php endif; ?>

	</div>

</div>
</div>
<?php get_footer(); ?>
