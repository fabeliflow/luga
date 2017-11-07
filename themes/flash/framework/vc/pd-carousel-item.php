<?php
add_shortcode( 'pd_carousel_item', 'pd_carousel_item_func' );
add_action( 'vc_before_init', 'progressive_map_carousel_item' );

function progressive_map_carousel_item() {
  if (function_exists('vc_map')) {
    vc_map( array(
      'name' => __( 'Carousel Item', 'progressive' ),
      'base' => 'pd_carousel_item',
      'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
      'description' => __( 'Carousel item module for carousel.', 'progressive' ),
      'category' => __( 'Carousel', 'progressive' ),
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => 'Type',
          'param_name' => 'type',
          'value' => array(
            'Select Type' => '',
            'Single Image' => 'type_image',
            'Comparison' => 'type_compare',
            'Card' => 'type_card',
          ),
        ),
        array( 
          'type' => 'dropdown',
          'heading' => 'Card Type',
          'param_name' => 'card_type',
          'value' => array(
            'Select Type' => '',
            'Image' => 'type_card_image',
            'Video' => 'type_card_video',
            'Map' => 'type_card_map',
          ),
          'dependency' => array(
            'element' => 'type',
            'value' => array( 'type_card' ),
          ),
        ),
        // Caption
        array(
          'type' => 'textfield',
          'heading' => __( 'Card Caption', 'progressive' ),
          'param_name' => 'caption',
          'description' => __( 'Caption for the card.', 'progressive' ),
        ),
        // Single Image Content
        array(
          'type' => 'attach_image',
          'heading' => __( 'Single Image', 'progressive' ),
          'param_name' => 'image',
          'description' => __( 'Image to display.'),
          'dependency' => array(
            'element' => 'type',
            'value' => array( 'type_image' ),
          ),
        ),
        // Comparison Content
        array(
          'type' => 'attach_image',
          'heading' => __( 'Before Image', 'progressive' ),
          'param_name' => 'before_image',
          'description' => __( 'Image for before.'),
          'dependency' => array(
            'element' => 'type',
            'value' => array( 'type_compare' ),
          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => __( 'After Image', 'progressive' ),
          'param_name' => 'after_image',
          'description' => __( 'Image for after.'),
          'dependency' => array(
            'element' => 'type',
            'value' => array( 'type_compare' ),
          ),
        ),
        // Card Content
        array(
          'type' => 'attach_image',
          'heading' => __( 'Card Image', 'progressive' ),
          'param_name' => 'card_image',
          'description' => __( 'Image for card.'),
          'group' => __( 'Header', 'progressive' ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_image' ),
          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => __( 'Poster Image', 'progressive' ),
          'param_name' => 'card_poster_image',
          'description' => __( 'Image for card.'),
          'group' => __( 'Video', 'progressive' ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_video' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Video Location', 'progressive' ),
          'param_name' => 'video_location',
          'description' => __( 'Location of the video: youtube, media library, external url.'),
          'group' => __( 'Video', 'progressive' ),
          'value' => array(
            'Select' => '',
            'Youtube' => 'youtube',
            'Vimeo' => 'vimeo',
            'External' => 'external'
          ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_video' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Youtube Video ID', 'progressive' ),
          'param_name' => 'video_youtube_id',
          'description' => __( 'Youtube video ID. The content after v= in the URL: v=MKXK8xwYDIA'),
          'group' => __( 'Video', 'progressive' ),
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
          'group' => __( 'Video', 'progressive' ),
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'vimeo' ),
          ),
        ),
        array(
          'type' => 'file_picker',
          'heading' => __( 'External URL', 'progressive' ),
          'param_name' => 'external_url',
          'description' => __( 'External URL'),
          'group' => __( 'Video', 'progressive' ),
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'external' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Address', 'progressive' ),
          'param_name' => 'address',
          'group' => __( 'Location', 'progressive' ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Address 2', 'progressive' ),
          'param_name' => 'address2',
          'group' => __( 'Location', 'progressive' ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'City', 'progressive' ),
          'param_name' => 'city',
          'group' => __( 'Location', 'progressive' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'State', 'progressive' ),
          'param_name' => 'state',
          'group' => __( 'Location', 'progressive' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Zip', 'progressive' ),
          'param_name' => 'zip',
          'group' => __( 'Location', 'progressive' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Enable Headline?', 'progressive' ),
          'param_name' => 'enable_headline',
          'description' => __( 'Add a headline to the card.', 'progressive' ),
          'group' => __( 'Headline', 'progressive' ),
          'value' => array(
            'Select' => '',
            'Yes' => 'yes',
            'No' => 'no'
          ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_image', 'type_card_video', 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Headline Tag', 'progressive' ),
          'param_name' => 'headline_tag',
          'description' => __( 'What tag would you like to use. h1,h2,h3,h4,h5,h6,p', 'progressive' ),
          'group' => __( 'Headline', 'progressive' ),
          'value' => array(
            "Select" => "",
            "H3 (Default)" => "h3",
            "H1" => "h1",
            "H2" => "h2",
            "H4" => "h4",
            "H5" => "h5",
            "H6" => "h6",
            "P" => "p",
            "Span" => "span"
          ),
          'dependency' => array(
            'element' => 'enable_headline',
            'value' => array( 'yes' ),
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Headline Text', 'progressive' ),
          'param_name' => 'headline',
          'group' => __( 'Headline', 'progressive' ),
          'dependency' => array(
            'element' => 'headline_tag',
            'not_empty' => true
          ),
        ),
        array(
          'type' => 'textarea_html',
          'heading' => __( 'Content', 'progressive' ),
          'param_name' => 'content',
          'group' => __( 'Content', 'progressive' ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_image', 'type_card_video', 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Text Color', 'js_composer' ),
          'param_name' => 'text_color',
          'group' => 'Colors',
          'value' => array(
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
            'element' => 'card_type',
            'value' => array( 'type_card_image', 'type_card_video', 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Headline Color', 'js_composer' ),
          'param_name' => 'headline_color',
          'group' => 'Colors',
          'value' => array(
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
            'element' => 'card_type',
            'value' => array( 'type_card_image', 'type_card_video', 'type_card_map' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Background Color', 'js_composer' ),
          'param_name' => 'bg_color',
          'group' => 'Colors',
          'value' => array(
            "Select Color" => "",
            "Primary" => "bg-primary",
            "Secondary" => "bg-secondary",
            "Tertiary" => "bg-tertiary",
            "Light" => "bg-light",
            "Accent" => "bg-accent",
            "Hightlight" => "bg-highlight",
            "Custom 1" => "bg-custom-one",
            "Custom 2" => "bg-custom-two",
            "Custom 3" => "bg-custom-three"
          ),
          'dependency' => array(
            'element' => 'card_type',
            'value' => array( 'type_card_image', 'type_card_video', 'type_card_map' ),
          ),
        ),
      )
    ));
  }
}

function pd_carousel_item_func( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'enable_headline' => '',
      'headline_tag' => '',
      'headline' => '',
      'type' => '',
      'card_type' => '',
      'image' => '',
      'youtube_id' => '',
      'vimeo_id' => '',
      'bg_color' => '',
      'headline_color' => 'text-accent',
      'text_color' => '',
      'type' => '',
      'caption' => ''
  ), $atts ));
  global $progressive;
  $output = '';

  $output .= '<div class="carousel__slide" data-caption="<?php echo $caption; ?>">';
    if( $type == "type_image" ) :
      $attachemnt_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);
      $output .= '<figure><img src="' . wp_get_attachment_url( $image ) . '" alt="' . ( !empty( $attachment_alt ) ? $attachment_alt : get_the_title() . ' ' . $progressive['location'] ) . '"></figure>';
    else :
      $output .= '<div class="hor-card' . ( $type == 'type_compare' ? '  hor-card--compare' : '' ) . '">';

      if( $type == 'type_compare' ) {
        $output .= '
          <div class="hor-card__object' . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '" style="background-image: url( ' . wp_get_attachment_url( $atts['before_image'] ) . ' );"></div>
          <div class="hor-card__object' . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '" style="background-image: url( ' . wp_get_attachment_url( $atts['after_image'] ) . ' );"></div>
        ';
      } else  {
        $output .= get_carousel_card_header( $card_type, $atts );
        $output .= get_carousel_card_content( $card_type, $atts, $content );
      }

      $output .= '</div>';
    endif;

  $output .= '</div>';
      
  return $output;
}

function get_carousel_card_header( $type, $atts ) {
  $output = '';
  global $progressive;

  switch ( $type ) {
    // case 'type_compare':
    //   $output = '
    //     <div class="hor-card__object" style="background-image: url( ' . wp_get_attachment_url( $atts['before_image'] ) . ' );"></div>
    //     <div class="hor-card__object" style="background-image: url( ' . wp_get_attachment_url( $atts['after_image'] ) . ' );"></div>
    //   ';
    //   break;
    case 'type_card_image':
      $attachemnt_alt = get_post_meta( $atts['card_image'], '_wp_attachment_image_alt', true);
      $output = '<div class="hor-card__object' . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '"  data-mh="card" style="background-image: url(' . wp_get_attachment_url( $atts['card_image'] ) . ');"></div>';
      break;
    case 'type_card_video':
      $attachemnt_alt = get_post_meta( $atts['card_image'], '_wp_attachment_image_alt', true);
      $output = '<div class="hor-card__object' . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '"  data-mh="card" style="background-image: url(' . wp_get_attachment_url( $atts['card_image'] ) . ');"></div>';
      break;
    case 'type_card_map':
      break;

  }
  return $output;
}

function get_carousel_card_content( $type, $atts, $content ) {
  $output = '';

  $output .= '
    <div class="hor-card__body' . ( !empty( $atts['bg_color'] ) ? ' ' . $atts['bg_color'] : '' ) . '"  data-mh="card">
      <div class="hor-card__wrap">
  ';

  if( $atts['enable_headline'] == "yes" && $atts['headline_tag'] != '' ) {
    $output .= '
      <' . $atts['headline_tag'] . ' class="hor-card__title' . ( !empty( $atts['headline_color'] ) ? '  ' . $atts['headline_color'] : '' ) . '">' . $atts['headline'] . '</' . $atts['headline_tag'] . '>
    ';
  }
  if( $content != null ) {
    $output .= '<p class="hor-card__copy' . ( !empty( $atts['text_color'] ) ? '  ' . $atts['text_color'] : '' ) . '">' . $content . '</p>';
  }

  $output .= '
      </div>
    </div>
  ';
  return $output;
}