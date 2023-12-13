<?php

    $type_class = '';
    $type = $instance['type_map'];

    if ( $type == 'layout-1') {
        $type_class = "text_location layout-1";
    }
?>


<div class="thim-goolge-map-content <?php echo $type_class ?>">

<?php if ( $instance['title'] <> '' ) {
    echo '<h3 class="widget-title">' . esc_attr( $instance['title'] ) . '</h3>';
} ?>
<?php
if ( empty( $instance['api_key'] ) ) {
    echo sprintf( wp_kses( __( '<p class="container">You must enter Google Map API Key. Refer on <a href="%s">Google Api Key</a></p>', 'coaching' ),
        array( 'a' => array( 'href' => array() ), 'p' => array( 'class' => array() ) ) ), esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key' ) );
} else { ?>
    <div class="kcf-module">
        <div
                class="ob-google-map-canvas"
                style="height:<?php echo intval( $height ) ?>px;"
                id="ob-map-canvas-<?php echo esc_attr( $map_id ) ?>"
            <?php foreach ( $map_data as $key => $val ) : ?>
                <?php if ( !empty( $val ) ) : ?>
                    data-<?php echo esc_attr( $key ) . '="' . esc_attr( $val ) . '"' ?>
                <?php endif ?>
            <?php endforeach; ?>
        ></div>
    </div>

    <?php if( !empty($instance['type_map']) && ( $instance['type_map'] == 'multi_address' || $instance['type_map'] == 'layout-1') ) { ?>
        <?php
        $places = $instance['markers']["marker_positions"];
        if ($places) {
            ?>
            <div class="content_maps">
                <div class="container">
                    <div class="content_wrap">
                        <span class="close"><i class="ion-android-close"></i></span>
                        <div class="area_place">
                            <h3 class="title_place"><span><?php echo $places[0]['title_place']; ?></span> <i
                                        class="fa fa-caret-down"></i></h3>
                            <ul class="content_hidden">
                                <?php for ($i = 0; $i < count($places); $i++) { ?>
                                    <li rel="<?php echo $places[$i]['place']; ?>"><?php echo $places[$i]['title_place']; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="content_place">
                            <?php for ($i = 0; $i < count($places); $i++) { ?>
                                <div class="item_pace">
                                    <?php echo $places[$i]['content_place']; ?>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }?>
<?php } ?>

</div>
