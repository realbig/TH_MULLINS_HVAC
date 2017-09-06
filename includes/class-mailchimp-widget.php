<?php

if ( class_exists( 'mailchimpSF_Widget' ) ) {

	class custom_mailchimpSF_Widget extends mailchimpSF_Widget {
		// This allows after_title and after_widget $args to be set as $instance variables. It is seemingly the only flexible way to do this per-widget Instance given how the original Widget was written.

		function custom_mailchimpSF_widget() {

			$args = array( 
				'description' => __( 'Displays a MailChimp Subscribe box with extra options', 'mailchimp_i18n' ),
			);
			$this->WP_Widget( 'custom_mailchimpSF_widget', __( 'Mullins MailChimp Widget', 'mailchimp_i18n' ), $args );

		}

		function form( $instance ) {

			$after_title = ! empty( $instance['after_title'] ) ? $instance['after_title'] : '<span class="fa fa-envelope-o alignright"></h2>';
			$after_widget = ! empty( $instance['after_widget'] ) ? $instance['after_widget'] : '<div class="text-right"><a href = "#" data-reveal-id="drawing-terms-modal">Terms and Conditions</a></div>';
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'after_title' ); ?>"><?php _e( 'Displayed After the Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'after_title' ); ?>" name="<?php echo $this->get_field_name( 'after_title' ); ?>" type="text" value="<?php echo esc_attr( $after_title ); ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'after_widget' ); ?>"><?php _e( 'Displayed After the Widget:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'after_widget' ); ?>" name="<?php echo $this->get_field_name( 'after_widget' ); ?>" type="text" value="<?php echo esc_attr( $after_widget ); ?>">
			</p>
			<?php    

		}

		function widget( $args, $instance ) {

			if ( ! is_array( $instance ) ) {
				$instance = array();
			}

			// Located in the MailChimp plugin. It uses extract() after merging the Arrays, so now we're all good.
			mailchimpSF_signup_form( array_merge( $args, $instance ) );

		}

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['after_title'] = ( ! empty( $new_instance['after_title'] ) ) ? strip_tags( $new_instance['after_title'] ) : '';
			$instance['after_widget'] = ( ! empty( $new_instance['after_widget'] ) ) ? strip_tags( $new_instance['after_widget'] ) : '';

			return $new_instance;

		}

	}
	
}