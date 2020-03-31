<?php get_header(); ?>
<section class="main-section">
    <section class="citizen-blog-feed layout-std-width">
        <div class="inner-feed">TEST
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php include '_space-card.php'; ?>
            <?php endwhile; else : ?>
                    <p><?php _e( 'Sorry, there are no posts to show.' ); ?></p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <div class="citizen-pagination clearfix">
                <div class="citizen-newer-link"><?php previous_posts_link( '<< Newer Posts' ); ?></div>
                <div class="citizen-older-link"><?php next_posts_link( 'Older Posts >>' ); ?></div>
            </div>
        </div>
    </section>
</section>
<?php get_footer(); ?>
