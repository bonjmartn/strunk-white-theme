<?php get_header(); ?>

<div class="white-container">

  <div class="page-container">

  <div class="section group">
    
    <div class="content">

    <div class="col span_8_of_12">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id(); 
      $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
      $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
      ?>

      <div class="post-header">
        <h1><?php the_title(); ?></h1>
      </div>      

      <hr>
      <p class="post-byline"><em>
      by <?php the_author(); ?> 
      on <?php echo the_time('l, F jS, Y');?>
      <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
      </em></p>
      <hr>

      <?php the_content(); ?>

      <?php
        $defaults = array(
          'before'           => '<p>' . __( 'Pages:', 'strunk-and-white' ),
          'after'            => '</p>',
          'link_before'      => '',
          'link_after'       => '',
          'next_or_number'   => 'number',
          'separator'        => ' ',
          'nextpagelink'     => __( 'Next page', 'strunk-and-white' ),
          'previouspagelink' => __( 'Previous page', 'strunk-and-white' ),
          'pagelink'         => '%',
          'echo'             => 1
        );
       
              wp_link_pages( $defaults );
      ?>
      
      <hr>

      <p class="post-byline"><em>
      Posted in <?php the_category( ', ' ); ?>.  
      <?php the_tags( 'Tagged with: ', ', ', '<br />' ); ?>
      </em></p>

      <hr>

      <?php if ( ! dynamic_sidebar( 'end-post') ): ?>
              <h3>End of Posts Widget Setup</h3>
              <p>This is a widget area that appears at the end of every blog post. Use it for an author box, newsletter subscription, or anything else. Go to Appearance > Widgets
                and drag any widget to the "End of Posts" widget area.</p>
      <?php endif; ?>
      <hr>

      <?php comments_template(); ?>
      <?php paginate_comments_links() ?>

      <?php endwhile; else: ?>

      <div class="page-header">
      <h1>Oh no!</h1>
      </div>

      <p>No content is appearing for this page!</p>

      <?php endif; ?>

    </div>

    <div class="col span_4_of_12">
      <?php get_sidebar( 'blog' ); ?>
    </div>

  </div>

</div>

</div>
<?php get_footer(); ?>