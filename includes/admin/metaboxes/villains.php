<?php
/**
 * Register a meta box using a class.
 */
class Bond_API_Villains_Meta_Box {
 
    /**
     * Constructor.
     */
    public function __construct() {
        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }
 
    }
 
    /**
     * Meta box initialization.
     */
    public function init_metabox() {     
        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
    }
 
    /**
     * Adds the meta box.
     */
    public function add_metabox() {
        add_meta_box(
            'villains-details',
            __( 'Villain Details', 'bond-api' ),
            array( $this, 'render_metabox' ),
            'villains',
            'advanced',
            'default'
        );
 
    }
 
    /**
     * Renders the meta box.
     */
    public function render_metabox( $post ) {
        // Add nonce for security and authentication.
        wp_nonce_field( 'update_villains_details', 'bond_api' );
        
        $films = bond_api_get_villains_films($post->ID);
        $html = '';
        
        $html .= '<div class="mb-row">';
            $html .='<label>Films</label>';
            $html .= '<ul class="films-list">';
                foreach ($films as $film) :
                    $html .='<li class="film">'.get_the_title($film).'</li>';
                endforeach;
            $html .= '</ul>';    
        $html .= '</div>';
        
        echo $html;
    }
 
    /**
     * Handles saving the meta box.
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post    Post object.
     * @return null
     */
    public function save_metabox( $post_id, $post ) {
        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['bond_api'] ) ? $_POST['bond_api'] : '';
        $nonce_action = 'update_villains_details';
 
        // Check if nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
            return;
        }
 
        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
 
        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }
    }
}
 
new Bond_API_Villains_Meta_Box();