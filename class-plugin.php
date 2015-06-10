<?php namespace WPDC_Sticky_Footer;

/**
 * WPDevsClub Sticky Footer Plugin
 *
 * @package     WPDC_Sticky_Footer
 * @since       1.0.5
 * @author      WPDevelopersClub and hellofromTonya
 * @link        http://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

use WPDC_Sticky_Footer\Support\Sticky_Footer;
use WPDevsClub_Core\Models\I_Model;

final class Plugin {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '3.5';

	/**
	 * Configuration parameters
	 *
	 * @var array
	 */
	protected $config = array();

	/*************************
	 * Getters
	 ************************/

	public function version() {
		return self::VERSION;
	}

	public function min_wp_version() {
		return self::MIN_WP_VERSION;
	}

	/**************************
	 * Instantiate & Initialize
	 *************************/

	/**
	 * Instantiate the plugin
	 *
	 * @since 1.0.0
	 *
	 * @param array     $config
	 * @return self
	 */
    public function __construct( array $config ) {
	    $this->config = $config;

	    $this->init_hooks();
    }

	/**
	 * Initialize hooks
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
    protected function init_hooks() {

        add_action( 'wp_enqueue_scripts',           array( $this, 'enqueue_scripts' ) );

	    add_action( 'wpdevsclub_do_sticky_footer',  array( $this, 'init_sticky_footer'), 10, 4 );
    }

	/**
	 * Enqueue each of the scripts
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'wpdevsclub_sticky_footer',
			WPDC_STICKY_FOOTER_URL . 'assets/js/jquery.plugin.js',
			array( 'jquery' ),
			self::VERSION,
			true
		);

		$params = array(
			'ajaxurl'       => admin_url( '/admin-ajax.php' ),
			'isLoggedIn'    => is_user_logged_in(),
		);
		wp_localize_script( 'wpdevsclub_sticky_footer', 'wpdevsclub_sticky_footer_l10', $params );
	}

	/**
	 * Instantiate the Sticky Footer
	 *
	 * @since 1.0.0
	 *
	 * @param I_Model       $model              Post's model
	 * @param array         $config             Config parameters
	 * @param integer       $post_id            Post's ID
	 * @return Sticky_Footer
	 */
	public function init_sticky_footer( I_Model $model, array $config, $post_id ) {
		new Sticky_Footer( $model, $config, $post_id );
	}
}