<?php
/**
 * Bond API admin
 *
 * @package Bond_API
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Bond_API_Admin class.
 */
class Bond_API_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {

	}

}