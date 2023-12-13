<?php
$layout   = $instance['layout'] ? $instance['layout'] : 'default';
$box_list = $instance['box'] ? $instance['box'] : '';
wp_enqueue_script('thim-slick');

if ( $layout == 'slider') {

    echo '<div class="thim-image-box slider-layout style-1">';
        foreach ( $box_list as $key => $box ) :


            echo  '<div class="thim-image-box-item">';

            if ( $box['box_image'] ) {
                if ( thim_plugin_active( 'elementor/elementor.php' )  && get_theme_mod('thim_page_builder_chosen') == 'elementor') {
                    echo thim_get_feature_image( $box['box_image']['id'] );
                } else {
                    echo thim_get_feature_image( $box['box_image'] );
                }
            }
            if ( $box['box_title'] ) {
                echo '<div class="thim-image-title"><a href="' . $box['box_link'] . '">' . $box['box_title'] . '</a></div>';
            }
            echo '</div>';
        endforeach;
    echo '</div>';

} else {
    $title    = $instance['title'] ? $instance['title'] : '';
    $subtitle = $instance['subtitle'] ? $instance['subtitle'] : '';
    $link     = $instance['link'] ? $instance['link'] : '';
    $img      = $instance['image_box'] ? $instance['image_box'] : '';
    $style     = $instance['style'] ? $instance['style'] : '';

    if ( $title ) {
        if ( $subtitle && $style == 'default' ) {
            $title = $subtitle . '<span>' . $title . '</span>';
        }
        $title = '<div class="thim-image-title"><a href="' . $link . '">' . $title . '</a></div>';
    }
    if ( $img ) {
        $img = thim_get_feature_image( $img );
    }

    echo '<div class="thim-image-box default-layout '. $style .'">' . $img . $title . '</div>';
}