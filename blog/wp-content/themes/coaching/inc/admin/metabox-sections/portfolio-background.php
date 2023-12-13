<?php

$postMetaBox = $titan->createMetaBox( array(
	'name'      => esc_html__('Color Hover Portfolio', 'coaching'),
	'post_type' => array( 'portfolio' ),
) );
$postMetaBox->createOption( array(
	'name'    => esc_html__('Background Color', 'coaching'),
	'id'      => 'portfolio_bg_color_ef',
	'type'    => 'color-opacity',
	'default' => ''
) );