<?php
function ic_add_elementor_widget_categories( $elements_manager ) {

	$category_prefix = 'afsarme_elements';
	$elements_manager->add_category(
		'afsarme_elements',
		[
			'title' => __( 'IC Elements', 'ic-core' ),
			'icon'  => 'font',
		]
	);

}

add_action( 'elementor/elements/categories_registered', 'ic_add_elementor_widget_categories' );