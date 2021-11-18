<?php
/**
 * WP Pricing Model
 *
 * Update pricing based on the price of an external product.
 *
 * @link              https://github.com/mymizan/wp-pricing-model
 * @since             1.0.0
 * @package           WP_Pricing_Model
 *
 * @wordpress-plugin
 * Plugin Name:       WP Pricing Model
 * Plugin URI:        https://github.com/mymizan/wp-pricing-model/
 * Description:       Update pricing based on the price of an external product.
 * Version:           1.0.0
 * Author:            Md Yakub Mizan
 * Author URI:        https://github.com/mymizan/wp-pricing-model
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-pricing-model
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current release version of the plugin.
 */
define( 'WP_Pricing_Model', '1.0.1' );

class WP_Pricing_Model {
    public function __construct() {
        add_action( 'init', array( $this, 'init'), 10, 0 );
    }

    public function init() {
        add_action( 'admin_notices', array( $this, '_notice_acf_required'), PHP_INT_MAX, 0 );
    }

    /**
     * Show admin notice if ACF is not installed.
     *
     * @return void
     */
    public function _notice_acf_required() {
        // There is a better way to check installed plugins. 
        // See my code here. https://github.com/mymizan/wp-check-if-plugin-active
        if ( ! in_array( 'advanced-custom-fields/acf.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            ?>
                <div class='notice notice-warning'><p> WP Pricing Model needs <strong> Advanced Custom Fields (ACF) </strong> to be installed and active. </p> </div>
            <?php
        }
    }
}

new WP_Pricing_Model();
