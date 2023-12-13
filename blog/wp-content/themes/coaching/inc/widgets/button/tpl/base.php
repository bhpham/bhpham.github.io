<?php
// Title
$title       = $instance['title'];
$url         = $instance['url'];
$new_window  = $instance['new_window'];
//$type_button = $instance['style_options']['type_button'];

$custom_style = isset( $instance['custom_style'] ) && $instance['custom_style'] != 'default' ? ' custom_style' : '';

$icon      = $instance['icon']['icon'];
$icon_size = $instance['icon']['icon_size'];

$button_size = $instance['layout']['button_size'];
$rounding    = $instance['layout']['rounding'];

// Icon Size
if ( $icon_size ) {
	$icon_size = ' style="font-size: ' . $icon_size . 'px;"';
}
// Open New Window
if ( $new_window ) {
	$target = ' target="_blank"';
} else {
	$target = '';
}

$style = $style_hover = $border = '';

if ( !empty( $custom_style ) ) {
    if ( !empty( $instance['style_options']['custom_button_style'] ) ) {
        $style .= $instance['style_options']['custom_button_style'];
    }
	if ( !empty( $instance['style_options']['font_size'] ) ) {
		$style .= "font-size: " . $instance['style_options']['font_size'] . "px;";
		$style_hover .= "font-size: " . $instance['style_options']['font_size'] . "px;";
	}
	if ( !empty( $instance['style_options']['font_weight'] ) ) {
		$style .= "font-weight: " . $instance['style_options']['font_weight'] . ";";
		$style_hover .= "font-weight: " . $instance['style_options']['font_weight'] . ";";
	}
	if ( isset($instance['style_options']['border_width']) ) {
		$style .= "border-width: " . $instance['style_options']['border_width'] . "px;";
	}
	if ( !empty( $instance['style_options']['color'] ) ) {
		$style .= "color: " . $instance['style_options']['color'] . ";";
	}
	if ( !empty( $instance['style_options']['border_color'] ) ) {
		$style .= "border-color: " . $instance['style_options']['border_color'] . ";";
	}
	if ( !empty( $instance['style_options']['bg_color'] ) ) {
		$style .= "background-color: " . $instance['style_options']['bg_color'] . ";";
	}

	if ( !empty( $instance['style_options']['hover_color'] ) ) {
		$style_hover .= "color: " . $instance['style_options']['hover_color'] . ";";
	}
	if ( !empty( $instance['style_options']['hover_border_color'] ) ) {
		$style_hover .= "border-color: " . $instance['style_options']['hover_border_color'] . ";";
	}
	if ( !empty( $instance['style_options']['hover_bg_color'] ) ) {
		$style_hover .= "background-color: " . $instance['style_options']['hover_bg_color'] . ";";
	}
}

// Icon
if ( $icon ) {
	$icon = '<i class="fa fa-' . $icon . '"' . $icon_size . '></i> ';
}

$text_align = ( !empty( $instance['text_align'] ) ) ? $instance['text_align'] : '';

echo '<div class="border-button ' . $text_align . '" style="' . $border . '"><a class="widget-button ' . $rounding . ' ' . $button_size . $custom_style . '" href="' . $url . '"' . $target . ' style="' . $style . '" data-hover="' . $style_hover . '">' . $icon . $title . '</a></div>';

