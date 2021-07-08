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
        add_action( 'init', array( $this, 'load_files' ) );
    }

    /**
     * Include any classes we need within admin.
     */
    public function includes() {

    }

        /**
         * Load files.
         *
         * @access public
         * @return void
         */
    public function load_files() {
        $dirs = array(
            'metaboxes',
        );

        foreach ( $dirs as $dir ) :
            foreach ( glob( BOND_API_PATH . 'includes/admin/' . $dir . '/*.php' ) as $file ) :
                include_once( $file );
                endforeach;
            endforeach;
    }

}
