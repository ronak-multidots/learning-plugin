<?php
/**
 * Learning Plugin
 *
 * @package           Learning Plugin
 * @author            Ronak J Vanpariya
 * @copyright         Ronak J Vanpariya
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Learning Plugin
 * Plugin URI:        https://github.com/ronak-multidots/learning-plugin
 * Description:       Learning Plugin.
 * Version:           1.9
 * Requires at least: 5.0
 * Requires PHP:      5.3
 * Author:            Ronak J Vanpariya
 * Author URI:        https://multidots.com
 * Text Domain:       wppv
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Make sure we don't expose any info if called directly.
if ( ! function_exists( 'add_action' ) ) {
	echo __('Hi there!  I\'m just a plugin, not much I can do when called directly.', 'wppv');
	exit;
}

/* Plugin Constants */
if (!defined('MD_LEARN_VIEW_URL')) {
    define('MD_LEARN_VIEW_URL', plugin_dir_url(__FILE__));
}

if (!defined('MD_LEARN_VIEW_PLUGIN_PATH')) {
    define('MD_LEARN_VIEW_PLUGIN_PATH', plugin_dir_path(__FILE__));
}

require_once MD_LEARN_VIEW_PLUGIN_PATH . '/includes/settings.php';

require_once MD_LEARN_VIEW_PLUGIN_PATH . '/includes/shortcodes.php';

register_activation_hook( __FILE__, array('Wp_post_view_settings','wppv_activation_hook') );

/**
 * MAIN CLASS
 */
class Learning_Plugin {
	/**
	 * Kik start the plugin
	 *
	 * @author Ronak Vanpariya
	 * @since 0.1
	 **/
	public function __construct() {
		add_action( 'init', array( $this, 'load_textdomain' ) );
		Wp_post_view_settings::settings_init();
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'wppv', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

}

$post_view = new WP_Post_Views();
