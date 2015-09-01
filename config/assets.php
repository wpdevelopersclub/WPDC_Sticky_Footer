<?php namespace Typed_Features;

/**
 * Assets Runtime Configuration Parameters
 *
 * @package     Typed_Features
 * @since       1.0.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        https://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

return array(

	'wp_enqueue_scripts'    => array(

		/******************************************************************
		 * Scripts to be enqueued
		 *      key:        $handle
		 *      is_ok_to_load_callable: function name or array to method,
		 *                              which checks if it's ok to load
		 *                              the asset.  True or false.
		 *      localize:   specify params to be passed to the script.
		 *                  default: false
		 ******************************************************************/

		'wp_enqueue_script'             => array(
			'wpdevsclub_sticky_footer'  => array(
				'file'                  => WPDC_STICKY_FOOTER_URL . 'assets/js/jquery.plugin.js',
				'version'               => Plugin::VERSION,

				'localize'              => array(
					'params'            => array(
						'ajaxurl'       => admin_url( '/admin-ajax.php' ),
						'isLoggedIn'    => is_user_logged_in(),
					),
					'js_var_name'       => 'wpdevsclub_sticky_footer_l10',
				),
			),
		),

		/******************************************************************
		 * Styles to be enqueued
		 *      key:            $handle
		 *      is_ok_to_load_callable: function name or array to method,
		 *                              which checks if it's ok to load
		 *                              the asset.  True or false.
		 ******************************************************************/

		'wp_enqueue_style'                  => array(),
	),
);