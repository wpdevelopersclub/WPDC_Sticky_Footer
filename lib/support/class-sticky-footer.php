<?php namespace WPDC_Sticky_Footer\Support;

/**
 * Sticky Footer
 *
 * @package     WPDC_Sticky_Footer\Support
 * @since       1.0.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        http://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

use WPDevsClub_Core\Support\Base;
use WPDevsClub_Core\Models\I_Model;

class Sticky_Footer extends Base {

	/**
	 * User's ID
	 *
	 * @var int
	 */
	protected $user_id = 0;

	protected $permalink = '';

	/******************************
	 * Instantiate & Initializers
	 *****************************/

	/**
	 * Instantiate Sticky Footer
	 *
	 * @since 1.0.0
	 *
	 * @param I_Model   $model
	 * @param array     $config
	 * @param int       $post_id
	 * @return self
	 */
	public function __construct( I_Model $model, array $config, $post_id ) {
		$this->model        = $model;
		$this->init_config( $config );
		$this->post_id      = $post_id;
		$this->user_id      = get_current_user_id();
		$this->permalink    = get_permalink( $post_id );

		$this->init_hooks();
	}

	/**
	 * Initialize the hooks
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_hooks() {
		add_action( 'genesis_after',                        array( $this, 'render' ), 99 );

		foreach ( $this->config['theme_locations'] as $key => $context ) {
			add_filter( "genesis_attr_nav-{$context}",      'genesis_attributes_nav' );
		}
	}

	/******************************
	 * Workers
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
		$this->load_view( 'sticky_footer' );
	}

	/**
	 * Initialize the config array
	 *
	 * @since 1.0.0
	 *
	 * @param array $config
	 */
	protected function init_config( array $config ) {
		$this->config = wp_parse_args( $config, array(
			'theme_locations'   => array(
				'quick_links'   => 'sticky_footer_quick_links',
				'extras'        => 'sticky_footer_extras',
			),
			'views'             => array(
				'sticky_footer' => WPDC_STICKY_FOOTER_DIR . 'lib/views/sticky-footer.php',
				'panels'        => array(
					WPDC_STICKY_FOOTER_DIR . 'lib/views/panels/join-dashboard.php',
					WPDC_STICKY_FOOTER_DIR . 'lib/views/panels/quick-links.php',
					WPDC_STICKY_FOOTER_DIR . 'lib/views/panels/extras.php',
					WPDC_STICKY_FOOTER_DIR . 'lib/views/panels/share.php',
					WPDC_STICKY_FOOTER_DIR . 'lib/views/panels/to-top.php',
				),
			),
		) );
	}

	/**
	 * Render the Nav
	 *
	 * @since 1.0.0
	 *
	 * @param string    $location   Key from $config['theme_locations'[ $location ]
	 * @return null
	 */
	protected function render_nav( $location ) {

		// Do nothing if menu not supported
		if ( ! genesis_nav_menu_supported( $this->config['theme_locations'][ $location ] ) )
			return;

		$class = 'menu genesis-nav-menu menu-' . $this->config['theme_locations'][ $location ];
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu( array(
			'theme_location' => $this->config['theme_locations'][ $location ],
			'menu_class'     => $class,
		) );

	}

	public function add_class_to_subnav( $tag, $args ) {
		return str_replace( 'class="', 'class="subpanel ', $tag );
		var_dump( $tag );
		return $tag;
	}
}