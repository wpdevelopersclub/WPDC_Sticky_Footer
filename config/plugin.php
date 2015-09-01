<?php namespace WPDC_Sticky_Footer;

/**
 * Runtime Configuration file.
 *
 * @package     WPDC_Sticky_Footer
 * @since       1.1.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        https://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

use WPDevsClub_Core\Config\Arr_Config;

return array(

	/*********************************************************
	 * Initial Core Parameters, which are loaded into the
	 * Container before anything else occurs.
	 *
	 * Format:
	 *    $unique_id => $value
	 ********************************************************/

	'initial_parameters'        => array(),

	/*********************************************************
	 * Back-End Service Providers -
	 * These service providers are loaded when 'admin_init' fires.
	 *
	 * Format:
	 *    $unique_id => array(
	 *      // When true, the instance is fetched out of the
	 *      // Container.
	 *      'autoload' => true|false,
	 *      // Closure that is loaded into the Container.
	 *      'concrete' => Closure,
	 ********************************************************/

	'be_service_providers'      => array(),

	/*********************************************************
	 * Front-End Service Providers -
	 * These service providers are loaded when 'genesis_init'
	 * fires and not in back-end.
	 *
	 * Format:
	 *    $unique_id => array(
	 *      // When true, the instance is fetched out of the
	 *      // Container.
	 *      'autoload' => true|false,
	 *      // Closure that is loaded into the Container.
	 *      'concrete' => Closure,
	 ********************************************************/

	'fe_service_providers'  => array(),

	/*********************************************************
	 * Front-End Service Providers -
	 * These service providers are loaded when 'genesis_init' fires.
	 *
	 * Format:
	 *    $unique_id => array(
	 *      // When true, the instance is fetched out of the
	 *      // Container.
	 *      'autoload' => true|false|callback,
	 *      // Closure that is loaded into the Container.
	 *      'concrete' => Closure,
	 ********************************************************/

	'both_service_providers'    => array(),

	/*********************************************************
	 * Extra Configuration Parameters -
	 * These are not loaded into the Container.
	 ********************************************************/

	'assets' => new Arr_Config(
		array(
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
		)
	),
);