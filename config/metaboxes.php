<?php

return array(

	/****************************
	 * Page page metabox
	 ****************************/

	'podcast'                   => array(
		'classname'             => 'WPDevsClub_Core\Admin\Metabox\Metabox',
		'view'                  => WPDEVSCLUB_PODCAST_PLUGIN_DIR . 'lib/views/admin/metabox-podcast.php',

		/****************************
		 * Meta config parameters
		 ****************************/
		'meta_name'                         => 'wpdevsclub_podcast_sections',
		'meta_single'                       => array(),
		'meta_array'                        => array(
			'meta_key'                      => 'wpdevsclub_podcast_sections',
			'meta_defaults'                 => array(
				'_section1_content'         => '',
				'_section1_class'           => '',
				'_section1_content_wpautop' => 0,

				'_section2_content'         => '',
				'_section2_class'           => '',
				'_section2_content_wpautop' => 0,
			),
			'sanitize'                      => array(
				'_section1_content'         => 'wp_kses_post',
				'_section1_class'           => 'strip_tags',
				'_section1_content_wpautop' => 'intval',

				'_section2_content'         => 'wp_kses_post',
				'_section2_class'           => 'strip_tags',
				'_section2_content_wpautop' => 'intval',
			),
		),

		/****************************
		 * Metabox config parameters
		 ****************************/

		'add_page_template' => 'templates/template-podcast.php',
		'nonce_action'      => 'wpdevsclub_podcast_sections_save',
		'nonce_name'        => 'wpdevsclub_podcast_sections_nonce',

		'id'                => 'inpost_podcast_sections_metabox',
		'title'             => __( 'Podcast Sections', 'wpdevsclub' ),
		'screen'            => array( 'page' ),
		'context'           => 'normal',
		'priority'          => 'default',

		/****************************
		 * Extra args
		 ****************************/

		'number_of_sections'    => 2,
	),


	/****************************
	 * Page page metabox
	 ****************************/

	'podcast_single'            => array(
		'view'                  => WPDEVSCLUB_PODCAST_PLUGIN_DIR . 'lib/views/admin/metabox-podcast-single.php',

		/****************************
		 * Meta config parameters
		 ****************************/
		'meta_name'                         => 'wpdevsclub_podcast',
		'meta_single'                       => array(),
		'meta_array'                        => array(
			'meta_key'                      => 'wpdevsclub_podcast',
			'meta_defaults'                 => array(
				'_video'                    => '',
				'_airdate'                  => '',
				'_runtime'                  => '',

				'_code_challenge_content'   => '',
				'_transcript'               => '',
			),
			'sanitize'                      => array(
				'_video'                    => 'strip_tags',
				'_airdate'                  => 'strip_tags',
				'_runtime'                  => 'strip_tags',

				'_code_challenge_content'   => 'wp_kses_post',
				'_transcript'               => 'wp_kses_post',
			),
		),

		/****************************
		 * Metabox config parameters
		 ****************************/

		'add_page_template' => '',
		'nonce_action'      => 'wpdevsclub_podcast_save',
		'nonce_name'        => 'wpdevsclub_podcast_nonce',

		'id'                => 'inpost_podcast_sections_metabox',
		'title'             => __( 'Podcast Sections', 'wpdevsclub' ),
		'screen'            => array( 'podcast' ),
		'context'           => 'normal',
		'priority'          => 'default',

		/****************************
		 * Extra args
		 ****************************/
	),
);