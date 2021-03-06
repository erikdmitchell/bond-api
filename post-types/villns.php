<?php

/**
 * Registers the `villns` post type.
 */
function villns_init() {
    register_post_type(
        'villns', array(
            'labels'                => array(
                'name'                  => __( 'Villans', 'bond-api' ),
                'singular_name'         => __( 'Villans', 'bond-api' ),
                'all_items'             => __( 'All Villans', 'bond-api' ),
                'archives'              => __( 'Villans Archives', 'bond-api' ),
                'attributes'            => __( 'Villans Attributes', 'bond-api' ),
                'insert_into_item'      => __( 'Insert into Villans', 'bond-api' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Villans', 'bond-api' ),
                'featured_image'        => _x( 'Featured Image', 'villns', 'bond-api' ),
                'set_featured_image'    => _x( 'Set featured image', 'villns', 'bond-api' ),
                'remove_featured_image' => _x( 'Remove featured image', 'villns', 'bond-api' ),
                'use_featured_image'    => _x( 'Use as featured image', 'villns', 'bond-api' ),
                'filter_items_list'     => __( 'Filter Villans list', 'bond-api' ),
                'items_list_navigation' => __( 'Villans list navigation', 'bond-api' ),
                'items_list'            => __( 'Villans list', 'bond-api' ),
                'new_item'              => __( 'New Villans', 'bond-api' ),
                'add_new'               => __( 'Add New', 'bond-api' ),
                'add_new_item'          => __( 'Add New Villans', 'bond-api' ),
                'edit_item'             => __( 'Edit Villans', 'bond-api' ),
                'view_item'             => __( 'View Villans', 'bond-api' ),
                'view_items'            => __( 'View Villans', 'bond-api' ),
                'search_items'          => __( 'Search Villans', 'bond-api' ),
                'not_found'             => __( 'No Villans found', 'bond-api' ),
                'not_found_in_trash'    => __( 'No Villans found in trash', 'bond-api' ),
                'parent_item_colon'     => __( 'Parent Villans:', 'bond-api' ),
                'menu_name'             => __( 'Villans', 'bond-api' ),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'editor' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'villns',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );

}
add_action( 'init', 'villns_init' );

/**
 * Sets the post updated messages for the `villns` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `villns` post type.
 */
function villns_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['villns'] = array(
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf( __( 'Villans updated. <a target="_blank" href="%s">View Villans</a>', 'bond-api' ), esc_url( $permalink ) ),
        2  => __( 'Custom field updated.', 'bond-api' ),
        3  => __( 'Custom field deleted.', 'bond-api' ),
        4  => __( 'Villans updated.', 'bond-api' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Villans restored to revision from %s', 'bond-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        /* translators: %s: post permalink */
        6  => sprintf( __( 'Villans published. <a href="%s">View Villans</a>', 'bond-api' ), esc_url( $permalink ) ),
        7  => __( 'Villans saved.', 'bond-api' ),
        /* translators: %s: post permalink */
        8  => sprintf( __( 'Villans submitted. <a target="_blank" href="%s">Preview Villans</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(
            __( 'Villans scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Villans</a>', 'bond-api' ),
            date_i18n( __( 'M j, Y @ G:i', 'bond-api' ), strtotime( $post->post_date ) ), esc_url( $permalink )
        ),
        /* translators: %s: post permalink */
        10 => sprintf( __( 'Villans draft updated. <a target="_blank" href="%s">Preview Villans</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'villns_updated_messages' );
