<?php
/**
 * Main Bond API class
 *
 * @package Bond_API
 * @since   0.1.0
 */

/**
 * Final Bond_API class.
 *
 * @final
 */
final class Bond_API {

    /**
     * Version
     *
     * @var string
     * @access public
     */
    public $version = '0.1.0';

    /**
     * Admin
     *
     * (default value: '')
     *
     * @var string
     * @access public
     */
    public $admin = '';

    /**
     * Construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
        $this->init();
    }

    /**
     * Define constants function.
     *
     * @access private
     * @return void
     */
    private function define_constants() {
        $this->define( 'BOND_API_PATH', plugin_dir_path( __FILE__ ) );
        $this->define( 'BOND_API_URL', plugin_dir_url( __FILE__ ) );
        $this->define( 'BOND_API_VERSION', $this->version );
        $this->define( 'BOND_API_REQUIRES', '4.5' );
        $this->define( 'BOND_API_TESTED', '5.0' );
    }

    /**
     * Define function.
     *
     * @access private
     * @param mixed $name (name).
     * @param mixed $value (value).
     * @return void
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }

    /**
     * Includes function.
     *
     * @access public
     * @return void
     */
    public function includes() {
        // include_once( PICKLE_CALENDAR_PATH . 'update-functions.php' );
        if ( is_admin() ) {
            $this->admin = new Bond_API_Admin();
        }
    }

    /**
     * Init hooks function.
     *
     * @access private
     * @return void
     */
    private function init_hooks() {
        register_activation_hook( BOND_API_PLUGIN_FILE, array( 'Bond_API_Install', 'install' ) );
    }

    /**
     * Init function.
     *
     * @access public
     * @return void
     */
    public function init() {
        $this->load_files();
    }

    /**
     * Load files.
     *
     * @access private
     * @return void
     */
    private function load_files() {
        $dirs = array(
            'post-types',
        );
        foreach ( $dirs as $dir ) :
            foreach ( glob( BOND_API_PATH . $dir . '/*.php' ) as $file ) :
                include_once( $file );
            endforeach;
        endforeach;
    }

    /**
     * Parse args function.
     *
     * @access public
     * @param mixed $a (array).
     * @param mixed $b (array).
     * @return array
     */
    public function parse_args( &$a, $b ) {
        $a = (array) $a;
        $b = (array) $b;
        $result = $b;

        foreach ( $a as $k => &$v ) {
            if ( is_array( $v ) && isset( $result[ $k ] ) ) {
                $result[ $k ] = $this->parse_args( $v, $result[ $k ] );
            } else {
                $result[ $k ] = $v;
            }
        }

        return $result;
    }

}

/**
 * Main function.
 *
 * @access public
 * @return class
 */
function bondapi() {
    return new Bond_API();
}

// Global for backwards compatibility.
$GLOBALS['bondapi'] = bondapi();
