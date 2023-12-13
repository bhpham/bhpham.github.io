<?php
wp_enqueue_script('thim-slick');
$service_list = isset($instance['service']) ? $instance['service'] : '';
?>
<div class="thim-service">

    <div class="slide-events js-call-slick-col"
         data-numofslide="4" data-numofscroll="1" data-loopslide="0" data-autoscroll="0" data-speedauto="6000"
         data-respon="[4, 1], [3, 1], [3, 1], [2, 1], [1, 1]">
        <div class="wrap-arrow-slick">
            <div class="arow-slick prev-slick">
                <i class="ion ion-ios-arrow-thin-right"></i>
            </div>

            <div class="arow-slick next-slick">
                <i class="ion ion-ios-arrow-thin-left"></i>
            </div>
        </div>

        <div class="wrap-arrow-slick-clone">
            <div class="arow-slick next-slick"></div>
        </div>

        <div class="slide-slick">
            <?php  foreach ( $service_list as $key => $service ) {
                $service_url = isset($service['service_link']) ? $service['service_link'] : '#';
                ?>
                <div class="item-slick">
                    <div class="event-item">
                        <?php
                        if ( $service['service_image'] ) {
                            if ( thim_plugin_active( 'elementor/elementor.php' )  && get_theme_mod('thim_page_builder_chosen') == 'elementor') {
                                echo thim_get_feature_image( $service['service_image']['id'] );
                            } else {
                                echo thim_get_feature_image( $service['service_image'] );
                            }
                        }
                        ?>
                        <?php if ( !empty($service['service_bg_color']) ) { ?>
                            <a href="<?php echo esc_url($service_url) ?>" class="link-color" style="background-color: <?php echo $service['service_bg_color'] ?>"></a>
                        <?php } ?>

                        <?php

                            if ( $service['service_title'] ) {
                                echo '<div class="thim-service-title"><a href="' . $service_url . '">' . $service['service_title'] . '</a></div>';
                            }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
