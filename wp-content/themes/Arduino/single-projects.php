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
		<a href=' http://<?php the_field('website'); ?> '><?php the_field('website'); ?></a>
	</span>

	<div class="project_sidebar_heading" >
	Category
	</div>
	<div class="categories">
		<?php
			$categories = get_field('category');
			if($categories){
				foreach($categories as $category){
					echo '<span class='. $category->slug. '></span>';
				}
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
  		<?php the_content(" Continue reading this article ->", true ); ?>

  	</span>
  </span>




  <div class="entry">
  	<p class="postmetadata alt">
  		<small>
  			This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
							by <?php the_author() ?>
							on <?php the_time('l, F jS, Y') ?> <!--at <?php the_time() ?>-->
							and is filed under <?php the_category(', ') ?>.

							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.

							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

							<?php } edit_post_link('Edit this entry.','',''); ?>

						</small>
					</p>

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
