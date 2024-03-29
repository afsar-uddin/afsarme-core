<?php
AFSARME_Kirki::add_section( 'header_settings', array(
	'title'          => esc_html__( 'Header', 'afsarme' ),
	'panel'          => 'theme_options',
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
) );

AFSARME_Kirki::add_field('theme_config_id', [
	'type'        => 'text',
	'settings'    => 'header_email',
	'label'       => esc_html__('Enter you email', 'afsarme'),
	'section'     => 'header_settings',
]);
AFSARME_Kirki::add_field('theme_config_id', [
	'type'        => 'repeater',
	'settings'    => 'phone_repeater',
	'section'     => 'header_settings',
	'priority' => 10,
	'fields'   => [
		'phone_number'   => [
			'type'        => 'text',
			// 'label'       => esc_html__( 'Link Text', 'kirki' ),
			'description' => esc_html__( 'Enter your phone number', 'kirki' ),
			'default'     => '',
		],
	],
]);


