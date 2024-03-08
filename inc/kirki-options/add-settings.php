<?php defined('ABSPATH') || die('Cheatin&#8217; uh?'); // Cannot access pages directly.

require AFSARME_INC_DIR . '/kirki-options/class-afsarme-kirki.php';

// add config
AFSARME_Kirki::add_config('ic_helper_theme_config', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
));

AFSARME_Kirki::add_panel('theme_options', array(
    'priority'    => 9,
    'title'       => esc_html__('Theme Options', 'ic-core'),
));

// Add settings

include( AFSARME_INC_DIR . '/kirki-options/theme-header.php' );
include( AFSARME_INC_DIR . '/kirki-options/theme-footer.php' );

