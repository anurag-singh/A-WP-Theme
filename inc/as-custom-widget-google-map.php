
<?php
/**
 * Register Sidebar
 */

function register_google_map_sidebar() {
 
 /* Register first sidebar name Primary Sidebar */
 register_sidebar(
     array(
         'name'          => __( 'Google Map', 'textdomain' ),
         'id'            => 'google-map',
         'description' => __( 'Add google map coordinates.', 'textdomain' ),
     )
 );
 
}
add_action( 'widgets_init', 'register_google_map_sidebar' );


/**
* Adds Google_Map widget.
*/
class Google_Map extends WP_Widget {

 /**
  * Register widget with WordPress.
  */
 function __construct() {
     parent::__construct(
         'google_map', // Base ID
         esc_html__( 'Google Map', 'text_domain' ), // Name
         array( 'description' => esc_html__( 'Widget area to add google map coordinates.', 'text_domain' ), ) // Args
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
    if ( ! empty( $instance['google_api_key'] ) ) {
        $google_api_key = apply_filters( 'widget_title', $instance['google_api_key'] );
    }
    if ( ! empty( $instance['div_class'] ) ) {
        $div_class = apply_filters( 'widget_title', $instance['div_class'] );
    }
    if ( ! empty( $instance['latitude'] ) ) {
        $latitude = apply_filters( 'widget_title', $instance['latitude'] );
    }
    if ( ! empty( $instance['longitude'] ) ) {
        $longitude = apply_filters( 'widget_title', $instance['longitude'] );
    }   

    echo '<div id="map" class="' . $div_class . '" data-lat="' . $latitude . '" data-long="' . $longitude  . '"></div>';

    // Add scripts for widget
    wp_enqueue_script( 'google-map', 'http://maps.google.com/maps/api/js?key=' . $google_api_key , array(), false, true );
	wp_enqueue_script( 'map', get_template_directory_uri() . '/assets/js/map.js', array(), '20151215', true );
    
 }

    /**
     * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {
        //  input field - latitude
        if ( isset( $instance[ 'latitude' ] ) ) {
            $latitude = $instance[ 'latitude' ];
        }
        else {
            $latitude = __( '28.6129', 'text_domain' );
        }
        echo '<p><label for="' . $this->get_field_id( "latitude" ) . '">' . _e( "Latitude:" ) . '</label>';
        echo '<input class="widefat" id="' . $this->get_field_id( "latitude" ) . '" name="' . $this->get_field_name( "latitude" ) . '" type="text" value="' . esc_attr( $latitude ) . '" /></p>';

        //  input field - longitude
        if ( isset( $instance[ 'longitude' ] ) ) {
            $longitude = $instance[ 'longitude' ];
        }
        else {
            $longitude = __( '77.2295', 'text_domain' );
        }
        echo '<p><label for="' . $this->get_field_id( "longitude" ) . '">' . _e( "Longitude:" ) . '</label>';
        echo '<input class="widefat" id="' . $this->get_field_id( "longitude" ) . '" name="' . $this->get_field_name( "longitude" ) . '" type="text" value="' . esc_attr( $longitude ) . '" /></p>';

        //  input field - div class
        if ( isset( $instance[ 'div_class' ] ) ) {
            $div_class = $instance[ 'div_class' ];
        }
        else {
            $div_class = __( 'half-map bg-img-map', 'text_domain' );
        }
        echo '<p><label for="' . $this->get_field_id( "div_class" ) . '">' . _e( "Div Class Name:" ) . '</label>';
        echo '<input class="widefat" id="' . $this->get_field_id( "div_class" ) . '" name="' . $this->get_field_name( "div_class" ) . '" type="text" value="' . esc_attr( $div_class ) . '" /></p>';

        //  input field - google_api_key
        if ( isset( $instance[ 'google_api_key' ] ) ) {
            $google_api_key = $instance[ 'google_api_key' ];
        }
        else {
            $google_api_key = __( 'XXXXXXXXXXXXXXXXXX', 'text_domain' );
        }
        echo '<p><label for="' . $this->get_field_id( "google_api_key" ) . '">' . _e( "Google Api key:" ) . '</label>';
        echo '<input class="widefat" id="' . $this->get_field_id( "google_api_key" ) . '" name="' . $this->get_field_name( "google_api_key" ) . '" type="text" value="' . esc_attr( $google_api_key ) . '" /></p>';

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
    $instance['latitude'] = ( ! empty( $new_instance['latitude'] ) ) ? sanitize_text_field( $new_instance['latitude'] ) : '';
    $instance['longitude'] = ( ! empty( $new_instance['longitude'] ) ) ? sanitize_text_field( $new_instance['longitude'] ) : '';
    $instance['div_class'] = ( ! empty( $new_instance['div_class'] ) ) ? sanitize_text_field( $new_instance['div_class'] ) : '';
    $instance['google_api_key'] = ( ! empty( $new_instance['google_api_key'] ) ) ? sanitize_text_field( $new_instance['google_api_key'] ) : '';

        return $instance;
    }

} 

// class Google_Map

// register Google_Map widget
function register_google_map_widget() {
 register_widget( 'Google_Map' );
}
add_action( 'widgets_init', 'register_google_map_widget' );

// function widget_script(){
//     global $pagenow;
//     if ( 'widgets.php' === $pagenow )
//     wp_enqueue_script( 'widget-script', get_stylesheet_directory_uri( ) . '/js/custom-widget.js', array( 'jquery' ), false, true );
// }
// add_action( 'admin_init', 'widget_script' );
