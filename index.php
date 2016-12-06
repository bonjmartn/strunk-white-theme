<?php get_header(); ?>

<div class="white-container">

    <div class="page-container">

        <div class="section group">

            <div class="content">

                <div class="col span_8_of_12">

                    <div class="page-header">
                        <h1><?php wp_title(''); ?></h1>
                    </div>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <p class="archives-byline"><em>
                        by <?php the_author(); ?> 
                        on <?php echo the_time('l, F jS, Y');?>
                        in <?php the_category( ', ' ); ?>.
                        <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                        </em></p>            

                        <p><?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></p>

                    <?php endif; ?>

                    <?php the_excerpt(); ?>

                    <hr>

                    <?php endwhile; else: ?>

                    <div class="page-header">
                        <h1 class="page-title"><?php _e( 'Oh no!', 'strunk-and-white' ); ?></h1>
                    </div>

                    <p><?php _e( 'No content is appearing for this page!', 'strunk-and-white' ); ?></p>

                    <?php endif; ?>

                    <p>&nbsp;</p>

                    <div class="pagination">

                        <?php the_posts_pagination( array( 
                        'mid_size' => 2,
                        'type' => 'list',
                        )); ?>

                    </div>

                    <p>&nbsp;</p>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>

                </div>


            <div class="col span_4_of_12">

                <?php get_sidebar( 'blog' ); ?>
                
            </div>

        </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>