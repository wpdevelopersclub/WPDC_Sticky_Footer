<?php

return array(
	'config_path'                   => trailingslashit( __DIR__ ),
	'cpt_post_type'                 => 'podcast',

	'template_manager'              => array(
		'template_folder_path'      => WPDEVSCLUB_PODCAST_PLUGIN_DIR . 'lib/templates/',
		'post_type'                 => 'podcast',
		'use_single'                => true,
		'use_archive'               => false,
		'use_catagory'              => false,
		'use_tax'                   => false,
		'use_tag'                   => false,
		'use_page_templates'        => true,
		'templates'                 => array(
			'template-podcast.php'  => __( 'Podcast', 'wpdevsclub' ),
		),
	),
);