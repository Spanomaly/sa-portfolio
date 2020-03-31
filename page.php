<?php get_header(); ?>
<?php if (has_post_thumbnail()): ?>
    <header class="cg-page-top"  style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>); background-size: cover;">
        <h1><?php the_title(); ?></h1>
    </header>
<?php endif; ?>
<section class = "main-section default-page">
    <div class = "layout-std-width">
        <div class="cms-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>