<?php
/* Template Name: Left Sidebar
*/
?>
<?php get_header(); ?>

<div class="white-container">

  <div class="page-container">

    <div class="section group">

      <div class="content">

        <div class="col span_4_of_12">
          <?php get_sidebar( 'page' ); ?>
        </div>

        <div class="col span_8_of_12">
          
          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>

          <!-- WP LOOP -->
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
