<?php namespace WPDC_Sticky_Footer\Support;

/**
 * Sticky Footer
 *
 * @package     WPDC_Sticky_Footer\Support
 * @since       1.1.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        http://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

use WPDevsClub_Core\I_Core;
use WPDevsClub_Core\Support\Structure;
use WPDevsClub_Core\Models\I_Model;

class Sticky_Footer extends Structure {

	/**
	 * Default config filename
	 *
	 * @var string
	 */
	protected static $defaultsFile = 'structure-defaults.php';

	/**
	 * User's ID
	 *
	 * @var int
	 */
	protected $user_id = 0;

	protected $permalink = '';

	/**
	 * Flags if the user is logged in
	 *
	 * @var bool
	 */
	protected $is_user_logged_in = false;

	/******************************
	 * Instantiate & Initializers
	 *****************************/

	/**
	 * Pre-Initialization
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_pre() {
		$this->user_id              = get_current_user_id();
		$this->permalink            = get_permalink( $this->post_id );
	}

	/**
	 * Initialize the hooks
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		add_action( 'genesis_after', array( $this, 'render' ), 99 );

		array_walk ( $this->config->theme_locations, function( $context, $key ) {
			add_filter( "genesis_attr_nav-{$context}", 'genesis_attributes_nav' );
		} );
	}

	/******************************
	 * Callbacks
	 *****************************/

	/**
	 * Renders the HTML by including the template file
	 *
	 * Note:    We are not using load_template as we want this object
	 *          to be in scope within the template files themselves.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function render() {
		$this->is_user_logged_in = is_user_logged_in();

		$this->load_view( 'sticky_footer' );
	}

	/**
	 * Add a styling class to subnav
	 *
	 * @since 1.0.0
	 *
	 * @param string $tag
	 * @param array $args
	 * @return mixed
	 */
	public function add_class_to_subnav( $tag, $args ) {
		return str_replace( 'class="', 'class="subpanel ', $tag );
		return $tag;
	}

	/******************************
	 * Helpers
	 *****************************/

	/**
	 * Render the Nav
	 *
	 * @since 1.0.0
	 *
	 * @param string    $location   Key from $config['theme_locations'[ $location ]
	 * @return null
	 */
	protected function render_nav( $location ) {
		if ( ! genesis_nav_menu_supported( $this->config->theme_locations[ $location ] ) ) {
			return;
		}

		$class = 'menu genesis-nav-menu menu-' . $this->config->theme_locations[ $location ];
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu( array(
			'theme_location' => $this->config->theme_locations[ $location ],
			'menu_class'     => $class,
		) );

	}
}