<?php namespace WPDC_Sticky_Footer;

/**
 * WP Developers Club Sticky Footer
 *
 * @package         WPDC_Sticky_Footer
 * @author          WPDevelopersClub and hellofromTonya
 * @license         GPL-2.0+
 * @link            https://wpdevelopersclub.com/
 * @copyright       2015 WP Developers Club
 *
 * @wordpress-plugin
 * Plugin Name:     WP Developers Club Sticky Footer
 * Plugin URI:      http://wpdevelopersclub.com/
 * Description:     Configurable Sticky footer with quick link panels added to enabled articles and pages.
 * Version:         1.1.0
 * Author:          WP Developers Club and Tonya
 * Author URI:      https://wpdevelopersclub.com
 * Text Domain:     wpdevsclub
 * Requires WP:     3.5
 * Requires PHP:    5.4
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

use WPDevsClub_Core\Config\I_Config;
use WPDevsClub_Core\Config\Factory;

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheating&#8217; uh?' );
}

if ( ! defined( 'WPDC_STICKY_FOOTER_DIR' ) ) {
	define( 'WPDC_STICKY_FOOTER_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WPDC_STICKY_FOOTER_URL' ) ) {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}
	define( 'WPDC_STICKY_FOOTER_URL', $plugin_url );
}

require_once( __DIR__ . '/assets/vendor/autoload.php' );

add_action( 'wpdevclub_setup_sticky_footer', __NAMESPACE__ . '\\launch', 20 );
/**
 * Launch the plugin
 *
 * @since 1.1.0
 *
 * @param I_Config $config
 * @return null
 */
function launch( I_Config $config ) {
	if ( version_compare( $GLOBALS['wp_version'], Plugin::MIN_WP_VERSION, '>' ) ) {
		if ( is_array( $config ) ) {
			$config = Factory::create( $config );
		}
		new Plugin( $config );
	}
}

/**
 * Load up the plugin's variables within the Container
 *
 * @since 1.1.0
 *
 * @return null
 */
add_action( 'wpdevsclub_do_service_providers', function( $core ) {
	$core['sticky_footer.dir'] = WPDC_STICKY_FOOTER_DIR;
	$core['sticky_footer.url'] = WPDC_STICKY_FOOTER_URL;
	$core['sticky_footer.default_config'] = WPDC_STICKY_FOOTER_DIR . 'config/structure-defaults.php';
	$core['sticky_footer.config.plugin'] = WPDC_STICKY_FOOTER_DIR . 'config/plugin.php';
} );