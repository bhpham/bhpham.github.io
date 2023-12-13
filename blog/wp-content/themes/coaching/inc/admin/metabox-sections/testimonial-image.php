<?php
$testimonials = $titan->createMetaBox( array(
	'name'      => esc_html__( 'Select image display before after', 'coaching' ),
	'post_type' => array( 'testimonials', ),
) );
$testimonials->createOption( array(
	'name'    => esc_html__( 'Image Before', 'coaching' ),
	'id'      => 'image_before',
	'type'    => 'upload',
) );
$testimonials->createOption( array(
	'name'    => esc_html__( 'Image After', 'coaching' ),
	'id'      => 'image_after',
	'type'    => 'upload',
) );