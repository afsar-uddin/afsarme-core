<?php

/**
 * Loading Elementor Widgets
 * @since 1.0.0
 * @author ITclanbd
 */
if ( ! function_exists( 'afsarme_elementor_elements' ) ) {
	function afsarme_elementor_elements() {

		foreach ( glob( plugin_dir_path( __FILE__ ) . "widgets/*.php" ) as $file ) {
			include_once $file;
		}

	}
}
add_filter( 'elementor/widgets/widgets_registered', 'afsarme_elementor_elements' );

/**
 * Add Widget Category
 * @since 1.0.0
 * @author ITclanbd
 */
require_once( AFSARME_INC_DIR . '/elementor-extensions/elementor-section.php' );

/** Icofont Icons Class Array File*/
require_once( AFSARME_INC_DIR . '/elementor-extensions/icons/icofont-icons.php' );


/** Adding custom icon to icon control in Elementor*/
add_filter( 'elementor/icons_manager/additional_tabs', 'afsarme_core_add_custom_icons_tab' );
function afsarme_core_add_custom_icons_tab( $tabs = array() ) {

	$tabs['icofont']  = array(
		'name'          => 'icofont',
		'label'         => esc_html__( 'Icofonts', 'afsarme' ),
		'labelIcon'     => 'icofont-brand-icofont',
		'prefix'        => 'icofont-',
		'displayPrefix' => 'icofont',
		'url'           => AFSARME_CORE_URL . '/assets/css/icofont.min.css',
		'icons'         => icoFont_icon(),
		'ver'           => '1.0.0',
	);
	return $tabs;
}

/** Elementor editor scripts*/
add_action( 'elementor/editor/before_enqueue_scripts', 'enqueue_editor_scripts' );
function enqueue_editor_scripts() {
	wp_enqueue_style(
		'afsarme-core-icofont',
		AFSARME_CORE_URL . '/assets/css/icofont.min.css',
		null,
		AFSARME_CORE_VERSION
	);

	wp_enqueue_style(
		'afsarme-core-elementor-editor',
		AFSARME_CORE_URL . '/admin/css/afsarme-editor.css',
		null,
		AFSARME_CORE_VERSION
	);

}