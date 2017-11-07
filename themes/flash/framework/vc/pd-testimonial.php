 <?php
add_shortcode( 'pd_testimonial', 'pd_testimonial_func' );
add_action( 'vc_before_init', 'progressive_map_testimonial' );

function progressive_map_testimonial() {
  if (function_exists('vc_map')) {
    vc_map( array(
      'name' => __( 'Testimonial', 'progressive' ),
      'base' => 'pd_testimonial',
      'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
      'show_settings_on_create' => true,
      'category' => __( 'Content', 'progressive' ),
      'params' => array(
        array(
          'type' => 'attach_image',
          'heading' => __( 'Video Poster', 'progressive' ),
          'param_name' => 'video_poster',
          'admin_label' => true,
          'description' => __( 'Still image for the video.', 'progressive' ),
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'youtube', 'vimeo' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Video Location', 'progressive' ),
          'param_name' => 'video_location',
          'description' => __( 'Location of the video: youtube, vimeo, external url.'),
          'admin_label' => true,
          'value' => array(
            'Select' => '',
            'Youtube' => 'youtube',
            'Vimeo' => 'vimeo',
            'External' => 'external'
          )
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Youtube Video ID', 'progressive' ),
          'param_name' => 'youtube_id',
          'description' => __( 'Youtube video ID. The content after v= in the URL: v=MKXK8xwYDIA'),
          'admin_label' => true,
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'youtube' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Vimeo Video ID', 'progressive' ),
          'param_name' => 'vimeo_id',
          'description' => __( 'Vimeo video ID'),
          'admin_label' => true,
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'vimeo' ),
          ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Background Image Location', 'progressive' ),
            'param_name' => 'background_image_location',
            'admin_label' => true,
            'description' => __( 'Background image location for masthead'),
            'value' => array(
              "Select" => '',
              "Left Top" => "",
              "Left Center" => "left center",
              "Left Bottom" => "left bottom",
              "Right Top" => "right top",
              "Right Center" => "right center",
              "Right Bottom" => "right bottom",
              "Center Top" => "center top",
              "Center Center" => "center center",
              "Center Bottom" => "center bottom"
            ),
          ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Video title', 'progressive' ),
          'param_name' => 'video_title',
          'admin_label' => true,
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Video caption', 'progressive' ),
          'param_name' => 'video_caption',
          'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Timestamp', 'progressive' ),
            'param_name' => 'timestamp',
            'admin_label' => true,
            
          ),

        array(
          "type" => "dropdown",
          "class" => "",
          "heading" => "Caption font color",
          'group' => 'Colors',
          "param_name" => "caption_font_color",
          "value" => array(
            "Select Color" => "",
            "Primary" => "text-primary",
            "Secondary" => "text-secondary",
            "Tertiary" => "text-tertiary",
            "Light" => "text-light",
            "Accent" => "text-accent",
            "Hightlight" => "text-highlight",
            "Custom 1" => "text-custom-one",
            "Custom 2" => "text-custom-two",
            "Custom 3" => "text-custom-three"
          ),
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'youtube', 'vimeo' ),
          ),
        ),
        
      )
    ) );
  }
}

function pd_testimonial_func( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'media' => '',
      'image' => '',
      'divider' => '',
      'video_location' => '',
      'video_url' => '',
      'video_type' => '',
      'video_poster' => '',
      'video_caption' => '',
      'youtube_id' => '',
      'vimeo_id' => '',
      'image_before' => '',
      'image_after' => '',
      'caption_font_color' => '',
      'video_size' => '',
      'hide_outline' => '',
      'html' => '',
      'video_title' => '',
      'timestamp' => '',
      'background_image_location' => ''
  ), $atts ));

  global $progressive;

  $attachemnt_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

  $html = '
    <div class="testimonial" style="background-image: url(' . wp_get_attachment_url($video_poster) . '); background-position: ' . $background_image_location . ';">
      <a href="https://www.youtube.com/watch?v=' . $youtube_id . '" class="testimonial__play  play  js-play-button">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
          <polygon class="play__triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/>
          <circle class="play__circle" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
          <circle class="play__circle-outline" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
        </svg>
      </a>
      <div class="testimonial__content">
        <div class="testimonial__time">' . $timestamp . '</div>
        <div class="testimonial__meta">' . 
          ( !empty( $video_title ) ? '<h2 class="testimonial__title">' . $video_title . '</h2>' : '' ) . 
          ( !empty( $video_caption ) ? '<span class="testimonial__desc">' . $video_caption . '</span>' : '' ) . '
        </div>
      </div>
    </div>
  ';

  ob_start(); ?>
  <?php echo $html; ?>
  <?php
  $output = ob_get_clean();
  return $output;
}
