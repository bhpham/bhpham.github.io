<?php
$share_setting = $titan->createMetaBox( array(
	'name'      => esc_html__( 'Share This and Number Related', 'coaching' ),
	'post_type' => array( 'post', ),
) );
$share_setting->createOption( array(
	'name'    => esc_html__( 'Number Related', 'coaching' ),
	'id'      => 'number_related',
	'type'    => 'number',
	'default' => 3,
	'min'     => '1',
	'max'     => '10'
) );