<?php
/**
 * Section Sharing
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'sharing',
		'panel'    => 'general',
		'title'    => esc_html__( 'Social Share', 'coaching' ),
		'priority' => 40,
	)
);

// Sharing Group
thim_customizer()->add_field(
	array(
		'id'       => 'group_sharing',
		'type'     => 'sortable',
		'label'    => esc_html__( 'Sortable Buttons Sharing', 'coaching' ),
		'tooltip'  => esc_html__( 'Click on eye icons to show or hide buttons. Use drag and drop to change the position of social share icons..', 'coaching' ),
		'section'  => 'sharing',
		'priority' => 10,
		'default'  => array(
			'facebook',
			'twitter',
			'pinterest',
			'google',
			'linkedin',
		),

		'choices' => apply_filters( 'thim_social_share_networks', array(
			'facebook'  => esc_html__( 'Facebook', 'coaching' ),
			'twitter'   => esc_html__( 'Twitter', 'coaching' ),
			'pinterest' => esc_html__( 'Pinterest', 'coaching' ),
			'google'    => esc_html__( 'Google Plus', 'coaching' ),
			'linkedin'  => esc_html__( 'LinkedIn', 'coaching' ),
		) ),
	)
);

