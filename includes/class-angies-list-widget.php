<?php
/**
 * Adds Copyright_Widget widget.
 */

if ( ! class_exists( 'WP_Widget' ) )
    return NULL;

class Angies_List_Badge extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'angies_list_badge', // Base ID
			__( 'Angie\'s List Badge', THEME_ID ), // Name
			array( 'description' => __( 'Easily Include an Auto-Updating Copyright', THEME_ID ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        
		echo $args['before_widget'];
        
		if ( ( ! empty( $instance['img_src'] ) ) && ( ! empty( $instance['link'] ) ) ) {
			echo '<a href="' . $instance['link'] . '" target="_blank"  title = "Review Us!"><img src = "' . $instance['img_src'] . '" /></a>';
		}
		
		echo $args['after_widget'];
        
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
		$img_src = ! empty( $instance['img_src'] ) ? $instance['img_src'] : '//placeholdit.imgix.net/~text?txtsize=33&txt=Angie%27s+List+Badge&w=250&h=250&txttrack=0';
        $link = ! empty( $instance['link'] ) ? $instance['link'] : 'http://angieslist.com/';
        
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Angie\'s List Link URL:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'img_src' ); ?>"><?php _e( 'Angie\'s List Badge URL:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'img_src' ); ?>" name="<?php echo $this->get_field_name( 'img_src' ); ?>" type="text" value="<?php echo esc_attr( $img_src ); ?>">
		</p>
		<?php 
        
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();
		$instance['img_src'] = ( ! empty( $new_instance['img_src'] ) ) ? strip_tags( $new_instance['img_src'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $new_instance;
        
	}

}