<?php
/**
* The Mini calculator widget.
*
* @package Mini calculator
* @since 0.1
* @author Tanvir
* @copyright Copyright (c) 2014, Tanvir
* @license http://www.gnu.org/licenses/gpl-2.0.html
*/
class mini_cal extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of widget
		'mini_cal', 

		// Widget name will appear in UI
		__('Mini Calculator', 'cal_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Simple Calculator Widget', 'cal_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		//display the output of calculator
		echo __( '	<center>
			<fieldset style="margin: 0px;
				padding: 40px;
				border: 1px solid #FFDB6E;
				border-radius: 3px;
				background: #0C9;">
				<input type="text" id="num1"/>

				<select id="sign" value="select">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
				</select>

				<input type="text" id="num2"/>
				<input type="button" id="btn" value="CALCULATE" onclick="calc();" />
				<br>
				<br>
				RESULT
				<input type="text" id="result"/>
			</fieldset>
			</center>', 'cal_widget_domain' );
		echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'cal_widget_domain' );
		}

		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
		}
} // Class cal_widget ends here

//Register and load the widget
// function cal_load_widget() {
// 	register_widget( 'mini_cal' );
// }
// add_action( 'widgets_init', 'cal_load_widget' );

?>