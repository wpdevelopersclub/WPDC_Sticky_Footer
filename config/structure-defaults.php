<?php

return array(
	'theme_locations'   => array(
		'quick_links'   => 'sticky_footer_quick_links',
		'extras'        => 'sticky_footer_extras',
	),
	'views'             => array(
		'sticky_footer' => WPDC_STICKY_FOOTER_DIR . 'src/views/sticky-footer.php',
		'panels'        => array(
			WPDC_STICKY_FOOTER_DIR . 'src/views/panels/join-dashboard.php',
			WPDC_STICKY_FOOTER_DIR . 'src/views/panels/quick-links.php',
			WPDC_STICKY_FOOTER_DIR . 'src/views/panels/extras.php',
			WPDC_STICKY_FOOTER_DIR . 'src/views/panels/share.php',
			WPDC_STICKY_FOOTER_DIR . 'src/views/panels/to-top.php',
		),
	),
);