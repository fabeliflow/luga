<?php
add_shortcode( 'pd_media', 'pd_media_func' );
add_action( 'vc_before_init', 'progressive_map_media' );

function progressive_map_media() {
  if (function_exists('vc_map')) {
    vc_map( array(
      'name' => __( 'Insert Video or Image', 'progressive' ),
      'base' => 'pd_media',
      'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
      'show_settings_on_create' => true,
      'category' => __( 'Content', 'progressive' ),
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => __( 'Media', 'progressive' ),
          'param_name' => 'media',
          'description' => __( 'What type of media would you like to display?', 'progressive' ),
          'admin_label' => true,
          'value' => array(
            "Select type" => "",
            "Image" => "image",
            "Video" => "video",
          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => __( 'Image', 'progressive' ),
          'param_name' => 'image',
          'description' => __( 'Image to display.'),
          'admin_label' => true,
          'dependency' => array(
            'element' => 'media',
            'value' => array( 'image' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Divides content', 'progressive' ),
          'param_name' => 'divider',
          'description' => __( 'Does this image act a divider?'),
          'admin_label' => true,
          'value' => array(
            'Default' => '',
            'Top & Bottom' => 'divider-padding',
            'Top Only' => 'divider-padding--top'
          ),
          'edit_field_class' => 'vc_col-sm-6',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Alignment', 'progressive' ),
          'param_name' => 'alignment',
          'description' => __( 'Does this image act a divider?'),
          'admin_label' => true,
          'value' => array(
            'Default' => '',
            'Left' => 'align--left',
            'Right' => 'align--right'
          ),
          'edit_field_class' => 'vc_col-sm-6',
        ),
        array(
          'type' => 'attach_image',
          'heading' => __( 'Before Image', 'progressive' ),
          'param_name' => 'image_before',
          'description' => __( 'Image for before. Please make sure images are the same size.'),
          'dependency' => array(
            'element' => 'media',
            'value' => array( 'comparison' ),
          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => __( 'After Image', 'progressive' ),
          'param_name' => 'image_after',
          'description' => __( 'Image for after. Please make sure images are the same size.'),
          'dependency' => array(
            'element' => 'media',
            'value' => array( 'comparison' ),
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
          ),
          'dependency' => array(
            'element' => 'media',
            'value' => array( 'video' ),
          ),
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
          'type' => 'textfield',
          'heading' => __( 'Video caption', 'progressive' ),
          'param_name' => 'video_caption',
          'admin_label' => true,
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'youtube', 'vimeo' ),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Size', 'progressive' ),
          'param_name' => 'video_size',
          'description' => __( 'Only adjust for full width columns.'),
          'admin_label' => true,
          'value' => array(
            'Select' => '',
            'Large' => 'large',
          ),
          'dependency' => array(
            'element' => 'media',
            'value' => array( 'video' ),
          ),
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
        array(
          'type' => 'attach_image',
          'heading' => __( 'Video Poster', 'progressive' ),
          'param_name' => 'video_poster',
          'admin_label' => true,
          'description' => __( 'Still image to show while the video is loading.', 'progressive' ),
          'dependency' => array(
            'element' => 'video_location',
            'value' => array( 'youtube', 'vimeo' ),
          ),
        ),
        
      )
    ) );
  }
}

function pd_media_func( $atts, $content = null ) {
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
      'alignment' => ''
  ), $atts ));

  global $progressive;

  switch( $media ) {
    case 'image':
      $attachemnt_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

        $html = '<figure class="img' . ( !empty( $alignment) ? '  ' . $alignment : '' ) . ( !empty( $divider) ? '  ' . $divider : '' ) . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '">';
        $html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . wp_get_attachment_url($image) . '" alt="' . ( !empty( $attachment_alt ) ? $attachment_alt : get_the_title() . ' ' . $progressive['location'] ) . '">';
        $html .= '</figure>';
      break;
    case 'video':
      $attachemnt_alt = get_post_meta( $video_poster, '_wp_attachment_image_alt', true);

      $html = '<figure class="img' . ( !empty( $alignment) ? '  ' . $alignment : '' ) . ( !empty( $divider) ? '  ' . $divider : '' ) . ( $progressive['enable-image-animations'] == 1 && !empty( $progressive['image-animation'] ) ? '  animate  animate--' . $progressive['image-animation'] : '' ) . '">';
      $html .= '<a href="https://www.youtube.com/watch?v=' . $youtube_id . '" class="play  img__play  js-play-button">';
      $html .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
            <polygon class="play__triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
            <circle class="play__circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
            <circle class="play__circle-outline" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
          </svg>';
      $html .= '</a>';
      $html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . wp_get_attachment_url($video_poster) . '" alt="' . ( !empty( $attachment_alt ) ? $attachment_alt : get_the_title() . ' ' . $progressive['location'] ) . '">';
      $html .= '</figure>';
      break;
  }

  ob_start(); ?>
  <?php echo $html; ?>
  <?php
  $output = ob_get_clean();
  return $output;
}
