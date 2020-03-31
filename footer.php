<?php //include('_tree-counter.php'); ?>
        <footer>
            <div class="clearfix">
                <div id = "footer-1" class = "footer-block">
                    <?php if ( is_active_sidebar( 'footer-spot-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-spot-1' ); ?>
                    <?php endif; ?>
                </div>
                <div id = "footer-2" class = "footer-block">
                    <?php if ( is_active_sidebar( 'footer-spot-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-spot-2' ); ?>
                    <?php endif; ?>
                </div>
                <div id = "footer-3" class = "footer-block">
                    <?php if ( is_active_sidebar( 'footer-spot-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-spot-3' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-copyright"><span>Copyright <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?></span></p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
