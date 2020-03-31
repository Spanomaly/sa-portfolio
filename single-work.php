<?php
/*
 * Template Name: Portfolio
 * Template Post Type: post
 */ ?>
<?php get_header(); ?>
<section class="main-section">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $headerColour = get_post_meta($post->ID, 'cg_post_header_color', true)?:"ffffff"; ?>
  <?php $headerTextColor = get_post_meta($post->ID, 'cg_post_header_text_color', true)?:"555555"; ?>
  <?php $headerLogo = get_post_meta($post->ID, 'cg_post_logo_url', true); ?>

<article class="sa-blog-post">
  <div class="sa-title-wrap">
    <?php if (has_post_thumbnail()): ?>
      <img class="preview-featured" src="<?php the_post_thumbnail_url( 'large' ); ?>">
    <?php endif; ?>
    <div class="sa-title-inner"
      style="
      background: rgb(<?php echo $headerColour; ?>);
      background: -moz-linear-gradient(-45deg, rgba(<?php echo $headerColour; ?>,1) 0%, rgba(<?php echo $headerColour; ?>,1) 37%, rgba(<?php echo $headerColour; ?>,0.5) 100%);
      background: -webkit-linear-gradient(-45deg, rgba(<?php echo $headerColour; ?>,1) 0%,rgba(<?php echo $headerColour; ?>,1) 37%,rgba(<?php echo $headerColour; ?>,0.5) 100%);
      background: linear-gradient(135deg, rgba(<?php echo $headerColour; ?>,1) 0%,rgba(<?php echo $headerColour; ?>,1) 37%,rgba(<?php echo $headerColour; ?>,0.5) 100%);">
      <div class="layout-standard-width">
        <img class="sa-pt-logo" src="<?php echo $headerLogo; ?>">
      </div>
    </div>
  </div>
  <div class = "sa-blog-content layout-narrow-width">
    <h1 class ="sa-post-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <div class="tags">
    <?php $tags = get_the_terms(get_the_ID(), 'skill');
    foreach($tags as $tag): ?>
      <a href="<?php echo get_term_link($tag->term_id, 'skill'); ?>" class="tag"><?php echo $tag->name; ?></a>
    <?php endforeach; ?>
    </div>
  </div>
</article>
    <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, there are no blog posts to show.' ); ?></p>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'vc-blog-posts' ) ) : ?>
        <div role="complementary" class="std-layout-width">
            <?php dynamic_sidebar( 'vc-blog-posts' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
</section>
<?php get_footer(); ?>
