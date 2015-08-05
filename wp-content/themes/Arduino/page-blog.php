<?php get_header(); ?>

<div id="content" class= "page page-posts">

  <div class="row">
  <?php

// The Query

//ask for the last 4 featured posts
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
    'posts_per_page' => 3,
    'paged' => $paged
    );


    //$the_query = new WP_Query($args);

  query_posts($args);

  if ( have_posts() ) {

    ?>

    <?php while ( have_posts() ) : the_post();


    if ( has_category()){ //get the category
      $categories = get_the_category();

      ?>
      <div class="columns small-12 medium-12 large-9 post-list">


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


      <?php } ?>

    <?php endwhile; ?>




    <div class="columns small-12 medium-12 large-9 post-list ">
      <?php /*
      <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
      <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
      */?>

      <?php arduino_paging_nav(); ?>
</div>


<?php

} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


?>


</div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer(); ?>
