<?php namespace WPDC_Sticky_Footer;

/**
 * WPDevsClub Sticky Footer Plugin
 *
 * @package     WPDC_Sticky_Footer
 * @since       1.1.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        http://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

use WPDevsClub_Core\I_Core;
use WPDevsClub_Core\Addons\Addon;
use WPDevsClub_Core\Config\I_Config;
use WPDevsClub_Core\Models\I_Model;
use WPDC_Sticky_Footer\Support\Sticky_Footer;

final class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.1.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '3.5';

	/**************************
	 * Instantiate & Initialize
	 *************************/

	/**
	 * Initialize events
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_events() {
	    add_action( 'wpdevsclub_do_sticky_footer',  array( $this, 'init_sticky_footer' ), 10, 4 );
    }

	/***************
	 * Callbacks
	 **************/

	/**
	 * Instantiate the Sticky Footer
	 *
	 * @since 1.0.0
	 *
	 * @param I_Config $config Config parameters
	 * @param I_Model $model  Post's model
	 * @param integer $post_id Post's ID
	 * @param I_Core $core
	 * @return Sticky_Footer
	 */
	public function init_sticky_footer( I_Config $config, I_Model $model, $post_id, I_Core $core ) {
		new Sticky_Footer( $config, $model, $post_id, $core );
	}
}