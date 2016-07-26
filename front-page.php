<?php get_header(); ?>

  
<div class="background-photo">
  <!-- background photo -->
</div>  

<div class="full-container">

  <div class="cta-bar">

    <?php if ( ! dynamic_sidebar( 'front-bar') ): ?>
    <h3>Call to Action Bar Setup</h3>
    <p>Create your call to action with a widget. Go to Appearance > Widgets.</p>
    <?php endif; ?>

  </div>

</div><!-- end of full container -->


<!-- show latest blog posts -->

<div class="full-container white">

  <div class="page-container">

    <div class="home-blog-posts">

      <?php
      $args = array( 'posts_per_page' => 3, 'orderby' => 'date' );
      $postslist = get_posts( $args );
      foreach ( $postslist as $post ) :
      setup_postdata( $post ); ?> 

        <div class="section group">

          <div class="col span_6_of_12 home-blog-content">

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <p class="home-byline">Posted on <?php echo the_time('l, F jS, Y');?> in 
              <?php the_category( ', ' ); ?> with 
              <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p> 

            <p><?php the_excerpt(); ?></p>

          </div>  

          <div class="col span_6_of_12 home-blog-image">

            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>

          </div>

        </div>

      <?php
      endforeach; 
      wp_reset_postdata();
      ?>

    </div>

  </div>

</div>

<?php get_footer(); ?>