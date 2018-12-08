<?php
/**
 * Bond API install
 *
 * @package Bond_API
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Bond_API_Install class.
 */
class Bond_API_Install {

    /**
     * Updates
     *
     * @var mixed
     * @access private
     * @static
     */
    private static $updates = array();

    /**
     * Init function.
     *
     * @access public
     * @static
     * @return void
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'check_version' ), 5 );
    }

    /**
     * Check version function.
     *
     * @access public
     * @static
     * @return void
     */
    public static function check_version() {
        // if ( self::is_new_install() ) :
            // self::install();
            self::add_data();
        // elseif ( get_option( 'bond_api_version' ) !== bondapi()->version ) :
            // self::update_version();
            // self::update();
        // endif;
    }

    /**
     * Install function.
     *
     * @access public
     * @static
     * @return void
     */
    public static function install() {
        if ( ! is_blog_installed() ) {
            return;
        }

        // Check if we are not already running this routine.
        if ( 'yes' === get_transient( 'bond_api_installing' ) ) {
            return;
        }

        // If we made it till here nothing is running yet, lets set the transient now.
        set_transient( 'bond_api_installing', 'yes', MINUTE_IN_SECONDS * 10 );

        // install stuff.
        self::update_version();
        self::update();

        delete_transient( 'bond_api_installing' );
    }

    private static function add_data() {
        /*
        Actors first, then get id for films
        Then do directors so we can add to films
        Then add films
        Add villains and link to film
        */
        include_once( BOND_API_PATH . '/data/actors.php' );
        include_once( BOND_API_PATH . '/data/directors.php' );
        include_once( BOND_API_PATH . '/data/films.php' );
        include_once( BOND_API_PATH . '/data/villains.php' );

        $actors_data = bond_api_install_actors();

        print_r( $actors_data );
    }

    /**
     * Update function.
     *
     * @access private
     * @static
     * @return void
     */
    private static function update() {
        $current_version = get_option( 'bond_api_version' );

        foreach ( self::get_update_callbacks() as $version => $update_callbacks ) :
            if ( version_compare( $current_version, $version, '<=' ) ) :
                foreach ( $update_callbacks as $update_callback ) :
                    $update_callback();
                endforeach;
            endif;
        endforeach;
    }

    /**
     * Get update callbacks function.
     *
     * @access public
     * @static
     * @return self
     */
    public static function get_update_callbacks() {
        return self::$updates;
    }

    /**
     * Update version function.
     *
     * @access private
     * @static
     * @return void
     */
    private static function update_version() {
        delete_option( 'bond_api_version' );

        add_option( 'bond_api_version', bondapi()->version );
    }

    /**
     * Is new install function.
     *
     * @access protected
     * @static
     * @return boolean
     */
    protected static function is_new_install() {
        if ( ! get_option( 'bond_api_version', 0 ) ) {
            return true;
        }

        return false;
    }

}

Bond_API_Install::init();
