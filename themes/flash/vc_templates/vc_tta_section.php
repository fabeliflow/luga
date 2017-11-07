<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
WPBakeryShortCode_VC_Tta_Section::$self_count ++;
WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
$isPageEditable = vc_is_page_editable();
$output = '';

$output .= '<h3 class="accordion__title">';
$output .= $atts['title'] . ' <span class="accordion__icon">+</span>';
$output .= '</h3>';
$output .= '<div class="accordion__content">';
$output .= $this->getTemplateVariable( 'content' );
$output .= '</div>';

echo $output;
