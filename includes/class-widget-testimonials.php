<?php
/**
 * Zerif Light Font-Awesome Feature Icons Widget Testimonails
 *
 * @since NEXT
 * @package Zerif Light Font-Awesome Feature Icons
 */

/**
 * Zerif Light Font-Awesome Feature Icons Widget Testimonails.
 *
 * @since NEXT
 */
class ZLFAFI_Widget_Testimonials extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'zlfafi-testimonials-widget',
			__( 'Zerif - Testimonial widget', 'zerif-lite' )
		);
	}

	function widget($args, $instance) {

		extract($args);

		$zerif_accessibility = get_theme_mod('zerif_accessibility');
		// open link in a new tab when checkbox "accessibility" is not ticked
		$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );
		?>

		<div class="feedback-box">

			<!-- MESSAGE OF THE CLIENT -->

			<?php if( !empty($instance['text']) ): ?>
				<div class="message">
					<?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?>
				</div>
			<?php endif; ?>

			<!-- CLIENT INFORMATION -->

			<div class="client">

				<div class="quote red-text">

					<i class="icon-fontawesome-webfont-294"></i>

				</div>

				<div class="client-info">

					<a <?php echo $attribut_new_tab; ?> class="client-name" <?php if( !empty($instance['link']) ): echo 'href="'.esc_url($instance['link']).'"'; endif; ?>><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title'] ); endif; ?></a>


					<?php if( !empty($instance['details']) ): ?>
						<div class="client-company">

							<?php echo apply_filters('widget_title', $instance['details']); ?>

						</div>
					<?php endif; ?>

				</div>

				<?php

				if( !empty($instance['image_uri']) && ($instance['image_uri'] != 'Upload Image') ) {

					echo '<div class="client-image hidden-xs">';

					echo '<img src="' . esc_url($instance['image_uri']) . '" alt="'.__( 'Uploaded image', 'zerif-lite' ).'" />';

					echo '</div>';

				} elseif( !empty($instance['custom_media_id']) ) {

					$zerif_testimonials_custom_media_id = wp_get_attachment_image_src($instance["custom_media_id"] );
					if( !empty($zerif_testimonials_custom_media_id) && !empty($zerif_testimonials_custom_media_id[0]) ) {

						echo '<div class="client-image hidden-xs">';

						echo '<img src="' . esc_url($zerif_testimonials_custom_media_id[0]) . '" alt="'.__( 'Uploaded image', 'zerif-lite' ).'" />';

						echo '</div>';

					}
				}

				?>

			</div>
			<!-- / END CLIENT INFORMATION-->

		</div> <!-- / END SINGLE FEEDBACK BOX-->

		<?php

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['details'] = strip_tags($new_instance['details']);
		$instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

		return $instance;

	}

	function form($instance) {
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author', 'zerif-lite'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author link','zerif-lite'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('details'); ?>"><?php _e('Author details', 'zerif-lite'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('details'); ?>" id="<?php echo $this->get_field_id('details'); ?>" value="<?php if( !empty($instance['details']) ): echo $instance['details']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif-lite'); ?></label><br/>
			<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>
			<?php
			if ( !empty($instance['image_uri']) ) :

				echo '<img class="custom_media_image_testimonial" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'zerif-lite' ).'" /><br />';

			endif;

			?>
			<input type="text" class="widefat custom_media_url_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
			<input type="button" class="button button-primary custom_media_button_testimonial" id="custom_media_button_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','zerif-lite'); ?>" style="margin-top:5px;">
		</p>

		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />

		<?php

	}

}
