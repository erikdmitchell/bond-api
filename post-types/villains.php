<?php

/**
 * Registers the `villains` post type.
 */
function villains_init() {
    register_post_type(
        'villains', array(
            'labels'                => array(
                'name'                  => __( 'Villains', 'bond-api' ),
                'singular_name'         => __( 'Villains', 'bond-api' ),
                'all_items'             => __( 'All Villains', 'bond-api' ),
                'archives'              => __( 'Villains Archives', 'bond-api' ),
                'attributes'            => __( 'Villains Attributes', 'bond-api' ),
                'insert_into_item'      => __( 'Insert into Villains', 'bond-api' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Villains', 'bond-api' ),
                'featured_image'        => _x( 'Featured Image', 'villains', 'bond-api' ),
                'set_featured_image'    => _x( 'Set featured image', 'villains', 'bond-api' ),
                'remove_featured_image' => _x( 'Remove featured image', 'villains', 'bond-api' ),
                'use_featured_image'    => _x( 'Use as featured image', 'villains', 'bond-api' ),
                'filter_items_list'     => __( 'Filter Villains list', 'bond-api' ),
                'items_list_navigation' => __( 'Villains list navigation', 'bond-api' ),
                'items_list'            => __( 'Villains list', 'bond-api' ),
                'new_item'              => __( 'New Villains', 'bond-api' ),
                'add_new'               => __( 'Add New', 'bond-api' ),
                'add_new_item'          => __( 'Add New Villains', 'bond-api' ),
                'edit_item'             => __( 'Edit Villains', 'bond-api' ),
                'view_item'             => __( 'View Villains', 'bond-api' ),
                'view_items'            => __( 'View Villains', 'bond-api' ),
                'search_items'          => __( 'Search Villains', 'bond-api' ),
                'not_found'             => __( 'No Villains found', 'bond-api' ),
                'not_found_in_trash'    => __( 'No Villains found in trash', 'bond-api' ),
                'parent_item_colon'     => __( 'Parent Villains:', 'bond-api' ),
                'menu_name'             => __( 'Villains', 'bond-api' ),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'excerpt', 'thumbnail' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-businessman',
            'show_in_rest'          => true,
            'rest_base'             => 'villains',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );

}
add_action( 'init', 'villains_init' );

/**
 * Sets the post updated messages for the `villns` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `villns` post type.
 */
function villains_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['villns'] = array(
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf( __( 'Villains updated. <a target="_blank" href="%s">View Villains</a>', 'bond-api' ), esc_url( $permalink ) ),
        2  => __( 'Custom field updated.', 'bond-api' ),
        3  => __( 'Custom field deleted.', 'bond-api' ),
        4  => __( 'Villains updated.', 'bond-api' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Villains restored to revision from %s', 'bond-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        /* translators: %s: post permalink */
        6  => sprintf( __( 'Villains published. <a href="%s">View Villains</a>', 'bond-api' ), esc_url( $permalink ) ),
        7  => __( 'Villains saved.', 'bond-api' ),
        /* translators: %s: post permalink */
        8  => sprintf( __( 'Villains submitted. <a target="_blank" href="%s">Preview Villains</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(
            __( 'Villains scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Villains</a>', 'bond-api' ),
            date_i18n( __( 'M j, Y @ G:i', 'bond-api' ), strtotime( $post->post_date ) ), esc_url( $permalink )
        ),
        /* translators: %s: post permalink */
        10 => sprintf( __( 'Villains draft updated. <a target="_blank" href="%s">Preview Villains</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'villains_updated_messages' );
