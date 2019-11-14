<?php
//  ref = https://wordpress.stackexchange.com/questions/82670/why-cant-wp-editor-be-used-in-a-custom-widget
/**
 * Register Sidebar
 */

function register_office_address_sidebars() {
 register_sidebar(
     array(
         'name'          => __( 'Office Address', 'textdomain' ),
         'id'            => 'office-address',
         'description' => __( 'Add office address.', 'textdomain' ),
         'before_widget' => '<div id="%1$s" class="office-address-wrapper %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h2 class="office-name">',
         'after_title' => '</h2>'
     )
 ); 
}
add_action( 'widgets_init', 'register_office_address_sidebars' );


/**
* Adds Office_Details widget.
*/
class Office_Details extends WP_Widget {

 /**
  * Register widget with WordPress.
  */
 function __construct() {
     parent::__construct(
         'office_details', // Base ID
         esc_html__( 'Office Details', 'text_domain' ), // Name
         array( 'description' => esc_html__( 'Widget area to add office contact information.', 'text_domain' ), ) // Args
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
     if ( ! empty( $instance['sub_heading'] ) ) {
        echo '<h6 class="mb-3">' . apply_filters( 'widget_title', $instance['sub_heading'] ) . "<h6/>";
     }
     if ( ! empty( $instance['title'] ) ) {
        echo '<h2 class="mb-4">' . apply_filters( 'widget_title', $instance['title'] ) . "</h2>";
     }
     if ( ! empty( $instance['address_1'] ) || ! empty( $instance['address_1'] ) ) {
        echo '<p class="mb-3 text-white">';

        if ( ! empty( $instance['address_1'] ) ) {
            echo  apply_filters( 'widget_title', $instance['address_1'] );
        }
        if ( ! empty( $instance['address_2'] ) ) {
            echo ' ' . apply_filters( 'widget_title', $instance['address_2'] );
        }

        echo '</p>';
     }
     if ( ! empty( $instance['contact_no'] ) || ! empty( $instance['mobile_no'] )) {
        echo '<p class="mb-3 text-white">';

            if ( ! empty( $instance['contact_no'] ) ) {
                echo 'Office Telephone : ' . apply_filters( 'widget_title', $instance['contact_no'] );
            }
            if ( ! empty( $instance['mobile_no'] ) ) {
                echo '<br />Mobile : '. apply_filters( 'widget_title', $instance['mobile_no'] );
            }   

        echo "<p/>";
    }
     if ( ! empty( $instance['email'] ) ) {
         echo '<p class="mb-3 text-white">Email : ' . apply_filters( 'widget_title', $instance['email'] ) . "<p/>";
     }
     if ( ! empty( $instance['opening_hours'] ) ) {
         echo '<p class="mb-3 text-white">' . apply_filters( 'widget_title', $instance['opening_hours'] ) . "<p/>";
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


        //  input field
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'Office Name', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "title" ) . '">' . _e( "Title:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "title" ) . '" name="' . $this->get_field_name( "title" ) . '" type="text" value="' . esc_attr( $title ) . '" /></p>';

    //  input field
    if ( isset( $instance[ 'sub_heading' ] ) ) {
        $sub_heading = $instance[ 'sub_heading' ];
    }
    else {
        $sub_heading = __( 'Sub Heading', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "sub_heading" ) . '">' . _e( "Sub Heading:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "sub_heading" ) . '" name="' . $this->get_field_name( "sub_heading" ) . '" type="text" value="' . esc_attr( $sub_heading ) . '" /></p>';

    //  input field
    if ( isset( $instance[ 'contact_no' ] ) ) {
        $contact_no = $instance[ 'contact_no' ];
    }
    else {
        $contact_no = __( '011 - 1234567', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "contact_no" ) . '">' . _e( "Contact No:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "contact_no" ) . '" name="' . $this->get_field_name( "contact_no" ) . '" type="text" value="' . esc_attr( $contact_no ) . '" /></p>';

    //  input field
    if ( isset( $instance[ 'mobile_no' ] ) ) {
        $mobile_no = $instance[ 'mobile_no' ];
    }
    else {
        $mobile_no = __( '+91 987 654 3210', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "mobile_no" ) . '">' . _e( "Mobile No:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "mobile_no" ) . '" name="' . $this->get_field_name( "mobile_no" ) . '" type="text" value="' . esc_attr( $mobile_no ) . '" /></p>';

    //  input field
    if ( isset( $instance[ 'email' ] ) ) {
        $email = $instance[ 'email' ];
    }
    else {
        $email = __( 'email@website.com', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "email" ) . '">' . _e( "Email:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "email" ) . '" name="' . $this->get_field_name( "email" ) . '" type="text" value="' . esc_attr( $email ) . '" /></p>';

    
    //  input field
    if ( isset( $instance[ 'opening_hours' ] ) ) {
        $opening_hours = $instance[ 'opening_hours' ];
    }
    else {
        $opening_hours = __( 'Mon-Fri: 9am to 6pm', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "opening_hours" ) . '">' . _e( "Opening Hours:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "opening_hours" ) . '" name="' . $this->get_field_name( "opening_hours" ) . '" type="text" value="' . esc_attr( $opening_hours ) . '" /></p>';

    
    //  input field
    if ( isset( $instance[ 'address_1' ] ) ) {
        $address_1 = $instance[ 'address_1' ];
    }
    else {
        $address_1 = __( '123, ABC Tower,', 'text_domain' );
    }
    echo '<p><label for="' . $this->get_field_id( "address_1" ) . '">' . _e( "Address:" ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id( "address_1" ) . '" name="' . $this->get_field_name( "address_1" ) . '" type="text" value="' . esc_attr( $address_1 ) . '" /></p>';
    
    
    //  input field
    if ( isset( $instance[ 'address_2' ] ) ) {
        $address_2 = $instance[ 'address_2' ];
    }
    else {
        $address_2 = __( 'New Delhi, India - 110011.', 'text_domain' );
    }
    echo '<input class="widefat" id="' . $this->get_field_id( "address_2" ) . '" name="' . $this->get_field_name( "address_2" ) . '" type="text" value="' . esc_attr( $address_2 ) . '" /></p>';
    
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
    //  die(var_dump($new_instance));
    $rand = (int) $new_instance['the_random_number'];
    $content_field_name = 'wp_editor_' . $rand;
    
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['sub_heading'] = ( ! empty( $new_instance['sub_heading'] ) ) ? sanitize_text_field( $new_instance['sub_heading'] ) : '';
    $instance['contact_no'] = ( ! empty( $new_instance['contact_no'] ) ) ? sanitize_text_field( $new_instance['contact_no'] ) : '';
    $instance['mobile_no'] = ( ! empty( $new_instance['mobile_no'] ) ) ? sanitize_text_field( $new_instance['mobile_no'] ) : '';
    $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';
    $instance['opening_hours'] = ( ! empty( $new_instance['opening_hours'] ) ) ? sanitize_text_field( $new_instance['opening_hours'] ) : '';
    $instance['address_1'] = ( ! empty( $new_instance['address_1'] ) ) ? sanitize_text_field( $new_instance['address_1'] ) : '';
    $instance['address_2'] = ( ! empty( $new_instance['address_2'] ) ) ? sanitize_text_field( $new_instance['address_2'] ) : '';
    $instance['latitude'] = ( ! empty( $new_instance['latitude'] ) ) ? sanitize_text_field( $new_instance['latitude'] ) : '';
    $instance['longitude'] = ( ! empty( $new_instance['longitude'] ) ) ? sanitize_text_field( $new_instance['longitude'] ) : '';
    $instance[$content_field_name] = ( ! empty( $new_instance[$content_field_name] ) ) ? sanitize_text_field( $new_instance[$content_field_name] ) : '';

     return $instance;
 }

} // class Office_Details

// register Office_Details widget
function register_office_details_widget() {
    register_widget('Office_Details');
}
add_action('widgets_init', 'register_office_details_widget');

function widget_script(){
    global $pagenow;
    if ( 'widgets.php' === $pagenow )
    wp_enqueue_script( 'widget-script', get_stylesheet_directory_uri( ) . '/js/custom-widget.js', array( 'jquery' ), false, true );
}
add_action( 'admin_init', 'widget_script' );
