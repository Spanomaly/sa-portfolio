<?php
/*
    Template Name: Blog
*/
get_header(); ?>
<section class="main-section">
  <section class="citizen-blog-feed layout-std-width group">
    <?php if (is_tag()): ?>
      <H1><?php single_tag_title(); ?></H1>
    <?php endif; ?>
    <div class="main-content">
      <div class="inner-feed">
        <?php $args    = array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' => get_option( 'posts_per_page' ),
          'orderby'        => 'date',
          'order'          => 'asc',
        );
        $query = new WP_Query( $args ); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php include '_blog-preview.php'; ?>
        <?php endwhile; else : ?>
          <p><?php _e( 'Sorry, there are no blog posts to show.' ); ?></p>
        <?php endif; ?>
      </div>
      <div class="citizen-pagination clearfix">
        <div class="citizen-newer-link"><?php previous_posts_link( '<< Newer Posts' ); ?></div>
        <div class="citizen-older-link"><?php next_posts_link( 'Older Posts >>' ); ?></div>
      </div>
      <?php wp_reset_postdata(); ?>
    </div>
    <aside class="main-sidebar">
      <?php if ( is_active_sidebar( 'main-sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar-1' ); ?>
      <?php endif; ?>
    </aside>
  </section>
</section>
<?php get_footer(); ?>
