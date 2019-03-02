<?php
function greenfort_display_header() {

	$number_of_choices = 2;

	for ( $i = 1; $i <= $number_of_choices; $i++ ):
		$image_id = get_theme_mod( "image_$i" );
		$post_id = get_theme_mod( "post_$i" );
		$description = get_theme_mod( "description_$i", '' ); ?>

		<a class="greenfort-choice-link" href="<?php if ( $post_id ) the_permalink( $post_id ); ?>">
			<?php
			if ( $image_id ) {
				echo wp_get_attachment_image(
					$image_id,
					'greenfort-hd-image',
					false,
					array( 'class' => 'greenfort-choice-image' )
				);
			}
			
			if ( $description ): ?>
			<div class="greenfort-choice-description"><?= $description ?></div>
			<?php endif; ?>
		</a>
	<?php endfor;
}
?>

<div class="custom-header">
	<div class="custom-header-media">
		<?php if ( is_front_page() ): ?>

		<!-- Custom Multi-Image Header -->
		<div class="greenfort-choose">
			<?php greenfort_display_header(); ?>
		</div> <!-- .greenfort-choose -->

		<?php else: the_custom_header_markup(); endif; ?>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
