<?php
/**
 *
 *  Template Name: Home
 *
 **/
get_header(); ?>
<section class = "main-section default-page">
    <div class = "layout-std-width">
        <div class="cms-content">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="">
              <?php the_content(); ?>
            </div>
          <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
