<?php
$thim_animation = $sub_heading = $sub_heading_css = $html = $css = $line = $line_css = $type = '';
$type = $instance['type'];
$thim_animation .= thim_getCSSAnimation( $instance['css_animation'] );
if ( $instance['textcolor'] ) {
	$css .= 'color:' . $instance['textcolor'] . ';';
}

//foreach ( $instance['custom_font_heading'] as $i => $feature ) :
if ( $instance['font_heading'] == 'custom' ) {
	if ( $instance['custom_font_heading']['custom_font_size'] <> '' ) {
		$css .= 'font-size:' . $instance['custom_font_heading']['custom_font_size'] . 'px;';
	}
	if ( $instance['custom_font_heading']['custom_font_weight'] <> '' ) {
		$css .= 'font-weight:' . $instance['custom_font_heading']['custom_font_weight'] . ';';
	}
	if ( $instance['custom_font_heading']['custom_font_style'] <> '' ) {
		$css .= 'font-style:' . $instance['custom_font_heading']['custom_font_style'] . ';';
	}
    if ( $instance['custom_font_heading']['custom_line_height'] <> '' ) {
        $css .= 'line-height:' . $instance['custom_font_heading']['custom_line_height'] . 'px;';
    }
    if ( $instance['custom_font_heading']['custom_style'] <> '' ) {
        $css .= $instance['custom_font_heading']['custom_style'];
    }
}

//endforeach;

if ( $css ) {
	$css = ' style="' . $css . '"';
}

if($instance['sub_heading'] && $instance['sub_heading'] <> ''){
	if($instance['sub_heading_color']) {
		$sub_heading_css = 'color:' . $instance['sub_heading_color'] . ';';
	}

    if ( $instance['font_sub_heading'] == 'custom' ) {
        if ( $instance['custom_font_sub_heading']['custom_sub_font_size'] <> '' ) {
            $sub_heading_css .= 'font-size:' . $instance['custom_font_sub_heading']['custom_sub_font_size'] . 'px;';
        }
        if ( $instance['custom_font_sub_heading']['custom_sub_font_weight'] <> '' ) {
            $sub_heading_css .= 'font-weight:' . $instance['custom_font_sub_heading']['custom_sub_font_weight'] . ';';
        }
        if ( $instance['custom_font_sub_heading']['custom_sub_font_style'] <> '' ) {
            $sub_heading_css .= 'font-style:' . $instance['custom_font_sub_heading']['custom_sub_font_style'] . ';';
        }
        if ( $instance['custom_font_sub_heading']['custom_sub_line_height'] <> '' ) {
            $sub_heading_css .= 'line-height:' . $instance['custom_font_sub_heading']['custom_sub_line_height'] . 'px;';
        }
    }
		
	$sub_heading = '<p class="sub-heading" style="'.$sub_heading_css.'">'.$instance['sub_heading'].'</p>';
}

if($instance['line'] && $instance['line'] <> '' ){
	if ( $instance['bg_line'] ) {
		$line_css = ' style="background-color:' . $instance['bg_line'] . '"';
	}
	$line = '<span' . $line_css . ' class="line"></span>';
}

if ( $instance['bg_line'] ) {
	$cls_color = ' style="color:' . $instance['bg_line'] . '"';
} else {
	$cls_color = '';
}

$content = '';
if( ($instance['type'] == 'bussiness' || $instance['type'] == 'gym') && $instance['content'] <> '' ) $content = '<div class="content_heading">' . $instance['content'] . '</div>';



/*
 *
 */
 
$text_align = '';
if($instance['text_align'] && $instance['text_align'] <> ''){
	$text_align = $instance['text_align'];
}

$html .= '<div class="sc_heading ' . $type . ' ' . $thim_animation . ' '.$text_align.'">';
$html .= '<' . $instance['size'] . $css . ' class="title">' . $instance['title'] . '</' . $instance['size'] . '>';
if ( $type == 'therapist' ) {
    $html .= $line;
}
$html .= $sub_heading;
if ( $type != 'therapist' ) {
    $html .= $line;
}
$html .= $content;
$html .= '</div>';

echo ent2ncr( $html );