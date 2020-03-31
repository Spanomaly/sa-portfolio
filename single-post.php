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
      <?php $headerLogo = get_post_meta($post->ID, 'cg_post_logo_url', true)?:"555555"; ?>

    <article class="citizen-blog-post">
            <div class="cg-title-wrap">
              <?php if (has_post_thumbnail()): ?>
                  <img class="preview-featured" src="<?php the_post_thumbnail_url( 'large' ); ?>">
              <?php endif; ?>
              <div class="cg-title-inner"
                style="
                background: rgb(<?php echo $headerColour; ?>);
                background: -moz-linear-gradient(-45deg, rgba(<?php echo $headerColour; ?>,1) 0%, rgba(<?php echo $headerColour; ?>,1) 37%, rgba(<?php echo $headerColour; ?>,0.5) 100%);
                background: -webkit-linear-gradient(-45deg, rgba(<?php echo $headerColour; ?>,1) 0%,rgba(<?php echo $headerColour; ?>,1) 37%,rgba(<?php echo $headerColour; ?>,0.5) 100%);
                background: linear-gradient(135deg, rgba(<?php echo $headerColour; ?>,1) 0%,rgba(<?php echo $headerColour; ?>,1) 37%,rgba(<?php echo $headerColour; ?>,0.5) 100%);">
                <div class="standard-width">
                  <img class="cg-pt-logo" src="<?php echo $headerLogo; ?>">
                </div>
              </div>
            </div>
        <div class = "citizen-blog-content standard-width">
          <h1 class ="cg-post-title"><?php the_title(); ?></h1>

            <?php the_content(); ?>
            <div class="blog-tags">
                <?php
                $tags = wp_get_post_tags($post->ID);
                foreach ($tags as $tag): ?>
                    <a href="/tag/<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a>
                <?php endforeach; ?>
            </div>
            <?php //include('_blog-social.php'); ?>
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
