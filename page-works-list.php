<?php
/**
 *
 *  Template Name: Works list
 *
 **/
get_header(); ?>
<section class = "main-section">
  <div class="main-content">
    <div class="layout-standard-width ">
      <h2><?php the_title(); ?></h2>
      <div class="space-card-list group">
        <?php $args    = array(
          'post_type'      => 'work',
          'post_status'    => 'publish',
          'posts_per_page' => get_option( 'posts_per_page' ),
          'orderby'        => 'date',
          'order'          => 'asc',
          'meta_key'       => 'cg_post_priority',
          'orderby'        => 'meta_value_num'
        );
        $query = new WP_Query( $args ); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
          $termType = 'skill';
          include('_space-card.php'); ?>
        <?php endwhile; else : ?>
          <p><?php _e( 'Sorry, there are no posts to show.' ); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
