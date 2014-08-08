<?php
/*
 * footer
 */

if ( is_active_sidebar( 'teaser' ) ) :
	echo '<div class="grid grid-pad teaser">';
	dynamic_sidebar( 'teaser' );
	echo '</div>';
endif;

?>

<div class="footer">
	<div class="grid grid-pad">
        <div class="col-1-2">
            <div class="copyright">
                <p>© <?php echo date( 'Y' ); ?> WARTH</p>
            </div><!-- /.copyright -->
        </div><!-- /.col-1-2 -->
        <div class="col-1-2 last">
            <div class="impressum">
                <?php wp_nav_menu( array('menu' => 'footermenu' ) ); ?>
            </div><!-- /.impressum -->
        </div><!-- /.col-1-2 -->
	</div><!-- /.grid -->
</div><!-- /.footer -->

<?php wp_footer(); ?>

</body>
</html>