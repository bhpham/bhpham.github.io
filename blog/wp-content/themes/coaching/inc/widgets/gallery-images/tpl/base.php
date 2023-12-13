<?php
wp_enqueue_script('owl-carousel');

$link_before = $after_link = $image = $css_animation = $number = $style_width = $item_tablet = $item_mobile = '';
$pagination = ( isset($instance['show_pagination']) && $instance['show_pagination'] == 'yes' ) ? 1 : 0;
$loop    = isset($instance['loop']) ? $instance['loop'] : true ;
$autoplay    = isset($instance['autoplay']) ? $instance['autoplay'] : true ;

$timeout    = $instance['autoplayTimeout'] ? $instance['autoplayTimeout'] : 5000 ;

if ( $instance['image'] ) {
	if ( $instance['link_target'] ) {
		$t = 'target='.$instance['link_target'];
	} else {
		$t = '';
	}
	if ( $instance['number'] ) {
		$number = ' data-visible="' . $instance['number'] . '"';
	}
	if( !empty( $instance['item_tablet'] ) ) {
		$item_tablet = ' data-itemtablet="' . $instance['item_tablet'] . '"';
	}
	if( !empty( $instance['item_mobile'] ) ){
		$item_mobile = ' data-itemmobile="' . $instance['item_mobile'] . '"';
	}

    if ( ! is_array( $instance['image'] ) ) {
        $img_id = explode( ",", $instance['image'] );
    } else {
        $img_id = $instance['image'];
    }

    if ( $instance['image_link'] ) {
        $img_url = explode( ",", $instance['image_link'] );
    }

	$css_animation = $instance['css_animation'];
	$css_animation = thim_getCSSAnimation( $css_animation );
	
	echo '<div class="thim-carousel-wrapper gallery-img ' . esc_attr( $css_animation ) . '" ' . $number . $item_tablet . $item_mobile . ' data-pagination="'. esc_attr( $pagination ). '" data-autoplay="'.esc_attr($autoplay).'"  data-autoplaytimeout="'. esc_attr($timeout) .'" data-loop="'. esc_attr($loop) .'" >';
	$i = 0;
	foreach ( $img_id as $id ) {
		$src = wp_get_attachment_image_src( $id, $instance['image_size'] );
        if ( $src ) {

            $image    = '<img src ="' . esc_url( $src['0'] ) . '" width="' . $src[1] . '" height="' . $src[2] . '" alt=""/>';
        }
        if ( $instance['image_link'] ) {
            $link_before = '<a ' . $t . ' href="' . esc_url( $img_url[ $i ] ) . '">';
            $after_link  = "</a>";
        }
        echo '<div class="item"' . $style_width . '>' . $link_before . $image . $after_link . "</div>";
        $i ++;
	}
	echo "</div>";
}