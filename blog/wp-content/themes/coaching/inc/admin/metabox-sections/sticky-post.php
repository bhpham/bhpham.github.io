<?php
$sticky_setting = $titan->createMetaBox( array(
	'name'      => esc_html__( 'Is this post sticky?', 'coaching' ),
	'post_type' => array( 'post', ),
) );
$sticky_setting->createOption( array(
	'name'    => esc_html__( 'Sticky Post', 'coaching' ),
	'id'      => 'sticky_post',
	'type'    => 'checkbox',
	'desc' 	  => ' ',
) );