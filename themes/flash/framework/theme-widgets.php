<?php

add_action( 'widgets_init', 'shaggy_reynolds_widgets_init' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shaggy_reynolds_widgets_init() {

  for( $i = 1; $i < 10; $i++ ) {
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar ' . $i, 'road-runner' ),
      'id'            => 'sidebar-' . $i,
      'description'   => esc_html__( 'Add widgets here.', 'road-runner' ),
      'before_widget' => '<section id="%1$s" class="widget widget--%2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget__title  u-h2">',
      'after_title'   => '</h3>',
    ) );
  }

  // Testimonial Sidebars
  for( $i = 1; $i < 7; $i++ ) {
    register_sidebar( array(
      'name'          => esc_html__( 'Testimonail Sidebar ' . $i, 'road-runner' ),
      'id'            => 'testimonial-sidebar-' . $i,
      'description'   => esc_html__( 'Add widgets here.', 'road-runner' ),
      'before_widget' => '<section id="%1$s" class="widget widget--%2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget__title  u-h2">',
      'after_title'   => '</h3>',
    ) );
  }

  for( $i = 1; $i < 7; $i++ ) {
    register_sidebar( array(
      'name'          => esc_html__( 'Doctor Sidebar ' . $i, 'road-runner' ),
      'id'            => 'doctor-sidebar-' . $i,
      'description'   => esc_html__( 'Add widgets here.', 'road-runner' ),
      'before_widget' => '<section id="%1$s" class="widget widget--%2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget__title  u-h2">',
      'after_title'   => '</h3>',
    ) );
  }

  for( $i = 1; $i < 7; $i++ ) {
    register_sidebar( array(
      'name'          => esc_html__( 'Location Sidebar ' . $i, 'road-runner' ),
      'id'            => 'location-sidebar-' . $i,
      'description'   => esc_html__( 'Add widgets here.', 'road-runner' ),
      'before_widget' => '<section id="%1$s" class="widget widget--%2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget__title  u-h2">',
      'after_title'   => '</h3>',
    ) );
  }

  register_sidebar( array(
    'name'          => esc_html__( 'Blog Sidebar', 'road-runner' ),
    'id'            => 'blog-sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'road-runner' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ) );
}

class sharing_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'sharing_widget', __( 'Sharing Widget', 'progressive' ), array( 'description' => __( 'Add sharing icons to sidebar' ) )
    );
  }

  public function widget( $args, $instance ) {
    global $progressive, $post;

    $socials = $progressive['social-sharing'];
    $enable = $progressive['enable-social-sharing'];

    if( $enable == "1" && !empty( $socials ) ) {
      // Search array for used social networks
      if( is_array( $socials ) ) {
        $keys = array_keys( $socials, '1' );
      }

      // widget title
      $title = apply_filters( 'widget_title', $instance['title'] );

      // set sharing values
      $page_title = urlencode(html_entity_decode( get_the_title() ));

      $url = urlencode( get_permalink() );

      echo $args['before_widget'];
      echo $args['before_title'] . $title . $args['after_title'];

      echo '<ul class="widget__list  widget__list--social">';

      foreach( $keys as $key => $network ) {

        echo '<li class="widget__item">';

        // TODO: Add pinterest
        switch( $network ) {
          case 'facebook':
            echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" class="widget__link  js-share-popup" target="_blank" rel="external nofollow"><i class="fa  fa-facebook-official"></i></a>';
            break;
          case 'twitter':
            echo '<a href="http://twitter.com/intent/tweet/?text=' . $page_title . '&url=' . $url . '" class="widget__link  js-share-popup" target="_blank" rel="external nofollow"><i class="fa  fa-twitter"></i></a>';
            break;
          case 'google-plus':
            echo '<a href="https://plus.google.com/share?url=' . $url . '" class="widget__link  js-share-popup" target="_blank" rel="external nofollow"><i class="fa  fa-google-plus"></i></a>';
            break;
          case 'linkedin':
            echo '<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . substr( $url, 0, 1024 ) . '&title=' . substr( $page_title, 0, 200 ) . '" class="widget__link  js-share-popup" target="_blank" rel="external nofollow"><i class="fa  fa-linkedin"></i></a>';
            break;
        }

        echo '</li>';
      }
      echo '</ul>';
      echo $args['after_widget'];
    }
  }

  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( 'New title', 'progressive' );
    }

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
}
// Creating the widget
class doctor_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'doctor_widget',

// Widget name will appear in UI
      __('Doctor Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Shows doctor in sidebar', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );
  $image_url = apply_filters( 'image_url', $instance['image_url'] );
  $doctor_text = apply_filters( 'doctor_text', $instance['doctor_text'] );
  $doctor_link = apply_filters( 'doctor_link', $instance['doctor_link'] );
  $site_name = get_bloginfo(name);

  echo $args['before_widget'];
  //echo '<img src="' . $image_url . '" class="avatar  avatar--large" >';
  echo '<h3 class="widget__title  u-h3"><a class="doc-wrapper" href="' . $doctor_link . '"><img src="' . $image_url . '" alt="' . $site_name . '" class="avatar  widget__avatar" ><span class="widget__headline">' . $title . '</span></a></h3>';
  echo '<p>' . $doctor_text . '</p>';

  echo $args['after_widget'];

// This is where you run the code and display the output

}

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'image_url' ] ) ) {
      $title = $instance[ 'image_url' ];
    }

    if ( isset( $instance[ 'doctor_text' ] ) ) {
      $title = $instance[ 'doctor_text' ];
    }

    if ( isset( $instance[ 'doctor_link' ] ) ) {
      $doctor_link = $instance[ 'doctor_link' ];
    }
// Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'doctor_text' ); ?>"><?php _e( 'Doctor Text:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'doctor_text' ); ?>" name="<?php echo $this->get_field_name( 'doctor_text' ); ?>" type="text" value="<?php echo esc_attr( $doctor_text ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'doctor_link' ); ?>"><?php _e( 'Doctor Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'doctor_link' ); ?>" name="<?php echo $this->get_field_name( 'doctor_link' ); ?>" type="text" value="<?php echo esc_attr( $doctor_link ); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image_url'] = ( ! empty( $new_instance['image_url'] ) ) ? strip_tags( $new_instance['image_url'] ) : '';
    $instance['doctor_text'] = ( ! empty( $new_instance['doctor_text'] ) ) ? strip_tags( $new_instance['doctor_text'] ) : '';
    $instance['doctor_link'] = ( ! empty( $new_instance['doctor_link'] ) ) ? strip_tags( $new_instance['doctor_link'] ) : '';

    return $instance;
  }
} // Class wpb_widget ends here

// Creating the widget
class cta_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'cta_widget',

// Widget name will appear in UI
      __('CTA Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Shows a CTA in sidebar', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $button_url = apply_filters( 'button_url', $instance['button_url'] );
    $button_text = apply_filters( 'button_text', $instance['button_text'] );
    $text = apply_filters( 'text', $instance['text'] );

    echo $args['before_widget'];
    echo '<h3 class="widget__title  u-h2">' . $title  . '</h3>';
    echo '<p>' . $text . '</p>';
    echo '<a href="' . $button_url . '" class="btn  btn--primary  btn--small">' . $button_text . '</a>';

    echo $args['after_widget'];

// This is where you run the code and display the output

  }

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'button_url' ] ) ) {
      $button_url = $instance[ 'button_url' ];
    }

    if ( isset( $instance[ 'button_text' ] ) ) {
      $button_text = $instance[ 'button_text' ];
    }
    if ( isset( $instance[ 'text' ] ) ) {
      $text = $instance[ 'text' ];
    }
// Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Button URL:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['button_url'] = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';
    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
    return $instance;
  }
} // Class wpb_widget ends here

class slidecontact_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'slidecontact_widget',

// Widget name will appear in UI
      __('Slide Contact Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Slides in a contact form', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $form = $instance['form'];

    echo $args['before_widget'];
    echo '<div class="widget__contact">';
    echo '<div>';
    echo '<h3 class="widget__title  u-h2">' . $title  . '</h3>';
    echo do_shortcode($form);
    echo '</div>';
    echo '</div>';

    echo $args['after_widget'];

// This is where you run the code and display the output

  }

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'form' ] ) ) {
      $form = $instance[ 'form' ];
    }
// Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'form' ); ?>"><?php _e( 'Form:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'form' ); ?>" name="<?php echo $this->get_field_name( 'form' ); ?>" type="text" value="<?php echo esc_attr( $form ); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['form'] = ( ! empty( $new_instance['form'] ) ) ? strip_tags( $new_instance['form'] ) : '';
    return $instance;
  }
} // Class wpb_widget ends here


// Creating the widget
class address_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'address_widget',

// Widget name will appear in UI
      __('Address Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Shows a address in sidebar', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $address_1 = apply_filters( 'address_1', $instance['address_1'] );
    $address_2 = apply_filters( 'address_2', $instance['address_2'] );
    $city = apply_filters( 'city', $instance['city'] );
    $state = apply_filters( 'state', $instance['state'] );
    $zip = apply_filters( 'zip', $instance['zip'] );

    echo $args['before_widget'];
    echo '<h3 class="widget__title  u-h2">' . $title  . '</h3>';
    echo '<div class="widget__content">';
    echo '<address>' . $address_1 . ( !empty( $address_2 ) ? ' <br>' . $address_2 : '' ) . ' <br>' . $city . ', ' . $state . ' ' . $zip . '</address>';
    echo '</div>';

    echo $args['after_widget'];

// This is where you run the code and display the output

  }

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'address_1' ] ) ) {
      $address_1 = $instance[ 'address_1' ];
    }
    if ( isset( $instance[ 'address_1' ] ) ) {
      $address_2 = $instance[ 'address_1' ];
    }
    if ( isset( $instance[ 'city' ] ) ) {
      $city = $instance[ 'city' ];
    }
    if ( isset( $instance[ 'state' ] ) ) {
      $state = $instance[ 'state' ];
    }
    if ( isset( $instance[ 'zip' ] ) ) {
      $zip = $instance[ 'zip' ];
    }
// Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'address_1' ); ?>"><?php _e( 'Address 1:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'address_1' ); ?>" name="<?php echo $this->get_field_name( 'address_1' ); ?>" type="text" value="<?php echo esc_attr( $address_1 ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'address_2' ); ?>"><?php _e( 'Address 2:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'address_2' ); ?>" name="<?php echo $this->get_field_name( 'address_2' ); ?>" type="text" value="<?php echo esc_attr( $address_2 ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'city' ); ?>"><?php _e( 'City:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'state' ); ?>"><?php _e( 'State:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" type="text" value="<?php echo esc_attr( $state ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'zip' ); ?>"><?php _e( 'Zip:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'zip' ); ?>" name="<?php echo $this->get_field_name( 'zip' ); ?>" type="text" value="<?php echo esc_attr( $zip ); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['address_1'] = ( ! empty( $new_instance['address_1'] ) ) ? strip_tags( $new_instance['address_1'] ) : '';
    $instance['address_2'] = ( ! empty( $new_instance['address_2'] ) ) ? strip_tags( $new_instance['address_2'] ) : '';
    $instance['city'] = ( ! empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
    $instance['state'] = ( ! empty( $new_instance['state'] ) ) ? strip_tags( $new_instance['state'] ) : '';
    $instance['zip'] = ( ! empty( $new_instance['zip'] ) ) ? strip_tags( $new_instance['zip'] ) : '';
    return $instance;
  }
} // Class wpb_widget ends here

class hours_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'hours_widget',

// Widget name will appear in UI
      __('Hours Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Shows hours in sidebar', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    echo '<h3 class="widget__title  u-h2">' . $title  . '</h3>';
    echo '<div class="widget__content">';
    echo '<ul class="widget__list  widget__list--address">';
    echo '<li class="widget__item">Mon to Thurs | 8:00am to 4:30pm</li>';
    echo '<li class="widget__item">Friday | 8:00am to 12:00pm</li>';
    echo '<li class="widget__item">Sat and Sun | Closed</li>';
    echo '</ul>';
    echo '</div>';

    echo $args['after_widget'];

// This is where you run the code and display the output

  }

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
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
} // Class wpb_widget ends here

// Creating the widget
class video_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
      'video_widget',

// Widget name will appear in UI
      __('Video Widget', 'wpb_widget_domain'),

// Widget description
      array( 'description' => __( 'Slides a video up on pages', 'wpb_widget_domain' ), )
      );
  }

// Creating widget front-end
// This is where the action happens
  public function widget( $args, $instance ) {
    $video_id = $instance['video_id'];
    $video_img_url = $instance['video_image_url'];

    echo '<div class="widget__video">';
    echo '<div class="widget__content">';
    echo '<img src="' . $video_img_url . '">';
    echo '<a href="https://www.youtube.com/watch?v=' . $video_id . '" class="widget__play  play  js-play-button">';
    echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">';
    echo '<polygon class="play__triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>';
    echo '<circle class="play__circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>';
    echo '<circle class="play__circle-outline" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>';
    echo '</svg>';
    echo '</a>';
    echo '<span class="widget__video-label">testimonial</span>';
    echo '</div>';
    echo '</div>';

  }

// Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'video_image_url' ] ) ) {
      $video_image_url = $instance[ 'video_image_url' ];
    }

    if ( isset( $instance[ 'video_id' ] ) ) {
      $video_id = $instance[ 'video_id' ];
    }

// Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'video_id' ); ?>"><?php _e( 'Video ID:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'video_id' ); ?>" name="<?php echo $this->get_field_name( 'video_id' ); ?>" type="text" value="<?php echo esc_attr( $video_id ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'video_image_url' ); ?>"><?php _e( 'Video Image URL:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'video_image_url' ); ?>" name="<?php echo $this->get_field_name( 'video_image_url' ); ?>" type="text" value="<?php echo esc_attr( $video_image_url ); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['video_image_url'] = ( ! empty( $new_instance['video_image_url'] ) ) ? strip_tags( $new_instance['video_image_url'] ) : '';
    $instance['video_id'] = ( ! empty( $new_instance['video_id'] ) ) ? strip_tags( $new_instance['video_id'] ) : '';
    return $instance;
  }
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
  register_widget( 'doctor_widget' );
  register_widget( 'sharing_widget' );
  register_widget( 'video_widget' );
  register_widget( 'cta_widget' );
  register_widget( 'address_widget' );
  register_widget( 'hours_widget' );
  register_widget( 'slidecontact_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function filter_widget_nav_menu_args( $nav_menu_args, $nav_menu, $args, $instance ) {
    // make filter magic happen here...
    $nav_menu_args['items_wrap'] = '<ul id="%1$s" class="%2$s  widget__list">%3$s</ul>';
    return $nav_menu_args;
};

// add the filter
add_filter( 'widget_nav_menu_args', 'filter_widget_nav_menu_args', 10, 4 );

add_filter( 'nav_menu_item_id', '__return_empty_string' ); // remove id from nav items
