<?php get_header(); ?>
<section class = "main-section">
  <div class="main-content">
    <div class="layout-standard-width ">
      <?php
      if(is_tax('skill')):?>
        <h2>Tagged <?php echo get_the_archive_title(); ?></h2>
      <?php elseif(is_tax('employer')): ?>
        <div class="archive-header">
          <h2>Hello <?php single_tag_title(); ?></h2>
          <?php echo wpautop(tag_description( )); ?>
        </div>
      <?php endif; ?>
      <?php if ( have_posts() ): ?>
        <div class="space-card-list group">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php if(get_post_type(get_the_ID())=='work'){
            $termType = 'skill';
          }
          include '_space-card.php'; ?>
      <?php endwhile;?>
    </div>
      <?php else : ?>
        <p><?php _e( 'Sorry, there are no blog posts to show.' ); ?></p>
      <?php endif; ?>
    <?php /*
    <div class="citizen-pagination clearfix">
      <div class="citizen-newer-link"><?php previous_posts_link( '<< Newer Posts' ); ?></div>
      <div class="citizen-older-link"><?php next_posts_link( 'Older Posts >>' ); ?></div>
    </div> */ ?>

  </div>
</section>
<?php get_footer(); ?>
