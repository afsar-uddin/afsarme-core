<?php
add_action( 'wp_enqueue_scripts', 'ic_core_scripts', 99 );
function ic_core_scripts() {

	wp_enqueue_script(
		'afsarme-core',
		AFSARME_CORE_URL . '/assets/js/afsarme-core.js',
		array( 'jquery' ),
		AFSARME_CORE_VERSION,
		true
	);
	wp_localize_script(
		'afsarme-core',
		'afsarme_core_ajax_object',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}