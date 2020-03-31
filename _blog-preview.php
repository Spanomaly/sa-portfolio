<article class="citizen-blog-preview">
    <h3 class="blog-feed-title"><?php the_title(); ?></h3>
    <div class ="citizen-blog-details">
        Posted <?php echo get_the_date('M d Y'); ?> by <?php echo get_the_author(); ?>
    </div>
    <?php
    $imageA = get_post_meta($post->ID, 'cg_compare_image_url_a', true);
    $imageB = get_post_meta($post->ID, 'cg_compare_image_url_b', true);
    if($imageA && $imageB):  ?>
      <div class="compare-images group">
        <div class="image-a-wrap" style="background-image: url('<?php echo $imageA; ?>');">
          <img src="<?php echo get_bloginfo('template_directory') . '/img/clear-40x40.png'; ?>" class="compare-img">
          <div class="compare-cost c-cost-a">$<?php echo get_post_meta($post->ID, 'cg_compare_item_cost_a', true); ?></div>
        </div>
        <div class="image-b-wrap" style="background-image: url('<?php echo $imageB; ?>');">
          <img src="<?php echo get_bloginfo('template_directory') . '/img/clear-40x40.png'; ?>" class="compare-img">
          <div class="compare-cost c-cost-b">$<?php echo get_post_meta($post->ID, 'cg_compare_item_cost_b', true); ?></div>
        </div>
      </div>
    <?php elseif (has_post_thumbnail()): ?>
        <img class="preview-featured" src="<?php the_post_thumbnail_url( 'large' ); ?>">
    <?php endif; ?>
    <div class="blog-excerpt">
        <?php the_excerpt(); ?>
    </div>
    <a href ="<?php the_permalink(); ?>">Read More</a>
</article>
