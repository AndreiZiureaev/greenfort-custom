<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" class="imprint"><?php
		printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' );
	?></a><span role="separator" aria-hidden="true"></span>
	<a href="https://github.com/AndreiZiureaev">
		Designed by Andrei&nbsp;Ziureaev
	</a>
</div><!-- .site-info -->
<div class="greenfort-copyright">
	Copyright &copy; 2015-<?php echo date( 'Y' ); ?>
</div>
