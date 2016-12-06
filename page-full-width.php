<?php
/* Template Name: Full Width
*/
?>
<?php get_header(); ?>


<div class="white-container">

  <div class="page-container">

    <div class="section group">

      <div class="content">

      <div class="col span_12_of_12">

        <!-- WP LOOP -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
          <h1><?php the_title(); ?></h1>
        </div>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.', 'strunk-and-white' ); ?></p>
        <?php endif; ?> 

      </div>

    </div>

  </div>

</div>

</div>

<?php get_footer(); ?>
