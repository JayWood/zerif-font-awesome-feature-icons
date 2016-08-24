<?php
/**
 * Zerif Light Font-Awesome Feature Icons Widget Our Focus
 *
 * @since NEXT
 * @package Zerif Light Font-Awesome Feature Icons
 */

/**
 * Zerif Light Font-Awesome Feature Icons Widget Our Focus.
 *
 * @since NEXT
 */
class ZLFAFI_Widget_Our_Focus extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'zlafi-our-focus',
			__( 'Zerif - Our focus widget', 'zerif-lite' )
		);
	}

	function widget($args, $instance) {

		extract($args);

		echo $before_widget;

		?>

		<div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">

			<?php if( !empty($instance['image_uri']) && ($instance['image_uri'] != 'Upload Image') ) { ?>

				<div class="service-icon">

					<?php if( !empty($instance['link']) ) { ?>

						<a href="<?php echo esc_url($instance['link']); ?>"><i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON--></a>

					<?php } else { ?>

						<i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON-->

					<?php } ?>

				</div>

			<?php } elseif( !empty($instance['custom_media_id']) ) {

				$zerif_ourfocus_custom_media_id = wp_get_attachment_image_src($instance["custom_media_id"] );
				if( !empty($zerif_ourfocus_custom_media_id) && !empty($zerif_ourfocus_custom_media_id[0]) ) {
					?>

					<div class="service-icon">

						<?php if( !empty($instance['link']) ) { ?>

							<a href="<?php echo esc_url($instance['link']); ?>"><i class="pixeden" style="background:url(<?php echo esc_url($zerif_ourfocus_custom_media_id[0]); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON--></a>

						<?php } else { ?>

							<i class="pixeden" style="background:url(<?php echo esc_url($zerif_ourfocus_custom_media_id[0]); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON-->

						<?php } ?>

					</div>

					<?php
				}

			}
			?>

			<h3 class="red-border-bottom"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title']); endif; ?></h3>
			<!-- FOCUS HEADING -->

			<?php
			if( !empty($instance['text']) ) {
				echo '<p>';
				echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text']));
				echo '</p>';
			}
			?>

		</div>

		<?php

		echo $after_widget;

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

		return $instance;

	}

	/**
	 * Creates and returns
	 *
	 * @author JayWood
	 */
	private function _fa_options() {
		$icons = zlfa_feature_icons()->icons;
		$output = '<option value="none">' . __( 'No Icon', 'zerif-lite' ) . '</option>';
//		return $output;

		foreach ( $icons as $icon ) {
			$icon_array = explode( '-', $icon );
			$sanitized_name = ucwords( implode( ' ', array_slice( $icon_array, 1, count( $icon_array ) ) ) );
			$output .= sprintf( '<option value="%1$s">%2$s</option>', $icon, $sanitized_name );
		}
		return $output;
	}

	function form($instance) {
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'zerif-lite'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif-lite'); ?></label><br/>
			<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','zerif-lite'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" class="widefat">
		</p>
		<p class="zlfa-feature-icons">
			<label for="<?php echo $this->get_field_id( 'zlfai-icon' ); ?>"><?php _e( 'Icon', 'zerif-lite' ); ?></label><br />
			<select class="zlfai-icons widefat" name="<?php echo $this->get_field_name('zlfai-icon'); ?>" id="<?php echo $this->get_field_id('zlfai-icon'); ?>" >
				<?php echo $this->_fa_options(); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>
			<?php
			if ( !empty($instance['image_uri']) ) :
				echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'zerif-lite' ).'" /><br />';
			endif;
			?>

			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','zerif-lite'); ?>" style="margin-top:5px;"/>
		</p>

		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />

		<?php

	}

}
