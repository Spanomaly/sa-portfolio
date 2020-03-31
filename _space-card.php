<div class="space-card">
  <a href="<?php the_permalink(); ?>">
    <div class="sc-preview-image" style="background-color: rgba(<?php echo get_post_meta(get_the_ID(), 'cg_post_header_color', true); ?>, 1);">
      <img class="sc-logo" src="<?php echo get_post_meta($post->ID, 'cg_post_logo_url', true); ?>">
    </div>
  </a>
  <div class="space-card-info">
    <h4><?php the_title(); ?></h4>
    <?php the_excerpt(); ?>
    <div class="tags">
    <?php
    if($termType):
      $tags = get_the_terms(get_the_ID(), $termType);
      foreach($tags as $tag): ?>
        <a href="<?php echo get_term_link($tag->term_id, $termType); ?>" class="tag"><?php echo $tag->name; ?></a>
      <?php endforeach;
    endif; ?>
    </div>
  </div>
  <div class="sc-read-more">
    <a href="<?php the_permalink(); ?>">Read More</a>
  </div>
</div>
