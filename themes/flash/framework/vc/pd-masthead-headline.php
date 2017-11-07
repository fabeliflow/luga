<?php
add_shortcode( 'pd_masthead_headline', 'pd_masthead_headline_func' );
add_action( 'vc_before_init', 'progressive_map_masthead_headline' );

function progressive_map_masthead_headline() {
  if (!function_exists('vc_map')) {
    return;
  }

  vc_map( array(
    'name' => __( 'Masthead Headline', 'progressive' ),
    'base' => 'pd_masthead_headline',
    'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
    'description' => __( 'Headline for the masthead', 'progressive' ),
    'as_parent' => array( 'only' => 'pd_masthead' ),
    'category' => __( 'Content', 'progressive' ),
    'params' => array(

      // h1 VC Params
      array(
        'type' => 'checkbox',
        'heading' => __( 'Enable H1', 'progressive' ),
        'param_name' => 'enable_h1',
        'group' => 'H1 Heading',
        'value' => array(
          "Yes" => "true"
        ),
      ),
      array(
        'type' => 'checkbox',
        'heading' => __( 'Use Default?', 'progressive' ),
        'param_name' => 'default_h1',
        'group' => 'H1 Heading',
        'description' => __( 'Defaults to Page title + Location.'),
        'value' => array(
          "Yes" => "true"
        ),
        'dependency' => array(
          'element' => 'enable_h1',
          'value' => array( 'true' ),
        ),
      ),

      array(
        'type' => 'textfield',
        'heading' => __( 'Text', 'progressive' ),
        'param_name' => 'text_h1',
        'admin_label' => true,
        'group' => 'H1 Heading',
        'dependency' => array(
          'element' => 'enable_h1',
          'value' => array( 'true' ),
        ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __( 'Extra classes', 'progressive' ),
        'param_name' => 'classes_h1',
        'group' => 'H1 Heading',
        'dependency' => array(
          'element' => 'enable_h1',
          'value' => array( 'true' ),
        ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Change color?",
        'admin_label' => true,
        "param_name" => "heading_color_h1",
        'group' => 'H1 Heading',
        "value" => array(
          "" => "",
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
          'element' => 'enable_h1',
          'value' => array( 'true' ),
        ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Change style to look like?",
        'admin_label' => true,
        "param_name" => "utility_class_h1",
        'group' => 'H1 Heading',
        'description' => __( 'Utility class to change heading to another visually.'),
        "value" => array(
          "" => "",
          "H1" => "u-h1",
          "H2" => "u-h1",
          "H3" => "u-h3",
          "H4" => "u-h4",
          "H5" => "u-h5",
          "H6" => "u-h6"
        ),
        'dependency' => array(
          'element' => 'enable_h1',
          'value' => array( 'true' ),
        ),
      ),

      // H2 VC Params
      array(
        'type' => 'checkbox',
        'heading' => __( 'Enable H2', 'progressive' ),
        'param_name' => 'enable_h2',
        'group' => 'H2 Heading',
        'value' => array(
          "Yes" => "true"
        ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __( 'Text', 'progressive' ),
        'param_name' => 'text_h2',
        'admin_label' => true,
        'group' => 'H2 Heading',
        'dependency' => array(
          'element' => 'enable_h2',
          'value' => array( 'true' ),
        ),
      ),
      array(
        'type' => 'checkbox',
        'heading' => __( 'Enable Wordspacing', 'progressive' ),
        'param_name' => 'enable_wordspacing',
        'group' => 'H2 Heading',
        'value' => array(
          "Yes" => "true"
        ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __( 'Extra classes', 'progressive' ),
        'param_name' => 'classes_h2',
        'group' => 'H2 Heading',
        'dependency' => array(
          'element' => 'enable_h2',
          'value' => array( 'true' ),
        ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Change color?",
        'admin_label' => true,
        "param_name" => "heading_color_h2",
        'group' => 'H2 Heading',
        "value" => array(
          "" => "",
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
          'element' => 'enable_h2',
          'value' => array( 'true' ),
        ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Change style to look like?",
        'admin_label' => true,
        "param_name" => "utility_class_h2",
        'group' => 'H2 Heading',
        'description' => __( 'Utility class to change heading to another visually.'),
        "value" => array(
          "" => "",
          "H1" => "u-h1",
          "H2" => "u-h1",
          "H3" => "u-h3",
          "H4" => "u-h4",
          "H5" => "u-h5",
          "H6" => "u-h6"
        ),
        'dependency' => array(
          'element' => 'enable_h2',
          'value' => array( 'true' ),
        ),
      ),
      array(
        'type' => 'checkbox',
        'heading' => __( 'Enable Avatar/Desc', 'progressive' ),
        'param_name' => 'enable_avatar',
        'group' => 'Avatar/Description',
        'value' => array(
          "Yes" => "true"
        ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __( 'Text', 'progressive' ),
        'param_name' => 'avatar_text',
        'admin_label' => true,
        'group' => 'Avatar/Description',
        'dependency' => array(
          'element' => 'enable_avatar',
          'value' => array( 'true' ),
        ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __( 'Doctor Name', 'progressive' ),
        'param_name' => 'avatar_alt',
        'admin_label' => true,
        'group' => 'Avatar/Description',
        'dependency' => array(
          'element' => 'enable_avatar',
          'value' => array( 'true' ),
        ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Change font color?",
        'admin_label' => true,
        "param_name" => "avatar_color",
        'group' => 'Avatar/Description',
        "value" => array(
          "" => "",
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
          'element' => 'enable_avatar',
          'value' => array( 'true' ),
        ),
      ),
      array(
        'type' => 'attach_image',
        'heading' => __( 'Avatar Image', 'progressive' ),
        'param_name' => 'avatar_image',
        'group' => 'Avatar/Description',
        'admin_label' => true,
        'dependency' => array(
          'element' => 'enable_avatar',
          'value' => array( 'true' ),
        ),
      ),

      
    )
  ) );

}

function pd_masthead_headline_func( $atts ) {
  global $progressive; 
  extract(shortcode_atts(array(
    'enable_h1' => '',
    'default_h1' => '',
    'text_h1' => '',
    'classes_h1' => '',
    'heading_color_h1' => '',
    'utility_class_h1' => '',
    'enable_h2' => '',
    'text_h2' => '',
    'classes_h2' => '',
    'heading_color_h2' => '',
    'utility_class_h2' => '',
    'enable_h3' => '',
    'text_h3' => '',
    'classes_h3' => '',
    'heading_color_h3' => '',
    'utility_class_h3' => '',
    'add_avatar' => '',
    'enable_avatar' => '',
    'avatar_text' => '',
    'avatar_color' => '',
    'avatar_image' => '',
    'avatar_alt' => '',
    'enable_wordspacing' => ''

  ), $atts ));

  $h1_css_classes = array(
    'masthead__eyebrow',
    'js-name',
    $classes_h1,
    $heading_color_h1,
    $utility_class_h1
  );

  $h1_css_classes = implode( " ", array_filter( $h1_css_classes ) );

  $h2_css_classes = array(
    'masthead__title',
    $classes_h2,
    $heading_color_h2,
    $utility_class_h2
  );

  if( $enable_wordspacing == "true" ) {
    $h2_css_classes[] = 'masthead__title--wordspace';
  }

  $avatar_classes = array(
    'masthead__description',
    $avatar_color
  );

  $h2_css_classes = implode( " ", array_filter( $h2_css_classes ) );

  $avatar_classes = implode( " ", array_filter( $avatar_classes ) );

  if( "true" == $default_h1 ) {
    $text_h1 = get_the_title();
    if( !empty( $progressive['location'] ) ) {
      $text_h1 = $text_h1 . ' ' . $progressive['location'];
    }
  }

  $ret = '<div class="masthead__box">';
  
  if( "true" == $enable_h1 ) {
    $ret .= '<h1 class="' . $h1_css_classes . '">' . $text_h1 . '</h1>';
  }

  if( "true" == $enable_h2 ) {
    $ret .= '<h2 class="' . $h2_css_classes . '">' . $text_h2 . '</h2>';
  }

  if( "true" == $enable_avatar ) {
    $ret .= '<h3 class="' . $avatar_classes . '">' . ( !empty( $avatar_image ) ? '<img src="' . wp_get_attachment_url( $avatar_image ) . '" class="avatar  js-avatar" alt="' . $avatar_alt . '">' : '' ) . '<span>' . $avatar_text . '</span></h3>';
  }

  $ret .= '</div>';

  return $ret;
}