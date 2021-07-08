<?php

/**
 * Registers the `actors` post type.
 */
function actors_init() {
    register_post_type(
        'actors', array(
            'labels'                => array(
                'name'                  => __( 'Actors', 'bond-api' ),
                'singular_name'         => __( 'Actors', 'bond-api' ),
                'all_items'             => __( 'All Actors', 'bond-api' ),
                'archives'              => __( 'Actors Archives', 'bond-api' ),
                'attributes'            => __( 'Actors Attributes', 'bond-api' ),
                'insert_into_item'      => __( 'Insert into Actors', 'bond-api' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Actors', 'bond-api' ),
                'featured_image'        => _x( 'Featured Image', 'actors', 'bond-api' ),
                'set_featured_image'    => _x( 'Set featured image', 'actors', 'bond-api' ),
                'remove_featured_image' => _x( 'Remove featured image', 'actors', 'bond-api' ),
                'use_featured_image'    => _x( 'Use as featured image', 'actors', 'bond-api' ),
                'filter_items_list'     => __( 'Filter Actors list', 'bond-api' ),
                'items_list_navigation' => __( 'Actors list navigation', 'bond-api' ),
                'items_list'            => __( 'Actors list', 'bond-api' ),
                'new_item'              => __( 'New Actors', 'bond-api' ),
                'add_new'               => __( 'Add New', 'bond-api' ),
                'add_new_item'          => __( 'Add New Actors', 'bond-api' ),
                'edit_item'             => __( 'Edit Actors', 'bond-api' ),
                'view_item'             => __( 'View Actors', 'bond-api' ),
                'view_items'            => __( 'View Actors', 'bond-api' ),
                'search_items'          => __( 'Search Actors', 'bond-api' ),
                'not_found'             => __( 'No Actors found', 'bond-api' ),
                'not_found_in_trash'    => __( 'No Actors found in trash', 'bond-api' ),
                'parent_item_colon'     => __( 'Parent Actors:', 'bond-api' ),
                'menu_name'             => __( 'Actors', 'bond-api' ),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-users',
            'show_in_rest'          => true,
            'rest_base'             => 'actors',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );

}
add_action( 'init', 'actors_init' );

/**
 * Sets the post updated messages for the `actors` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `actors` post type.
 */
function actors_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['actors'] = array(
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf( __( 'Actors updated. <a target="_blank" href="%s">View Actors</a>', 'bond-api' ), esc_url( $permalink ) ),
        2  => __( 'Custom field updated.', 'bond-api' ),
        3  => __( 'Custom field deleted.', 'bond-api' ),
        4  => __( 'Actors updated.', 'bond-api' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Actors restored to revision from %s', 'bond-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        /* translators: %s: post permalink */
        6  => sprintf( __( 'Actors published. <a href="%s">View Actors</a>', 'bond-api' ), esc_url( $permalink ) ),
        7  => __( 'Actors saved.', 'bond-api' ),
        /* translators: %s: post permalink */
        8  => sprintf( __( 'Actors submitted. <a target="_blank" href="%s">Preview Actors</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(
            __( 'Actors scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Actors</a>', 'bond-api' ),
            date_i18n( __( 'M j, Y @ G:i', 'bond-api' ), strtotime( $post->post_date ) ), esc_url( $permalink )
        ),
        /* translators: %s: post permalink */
        10 => sprintf( __( 'Actors draft updated. <a target="_blank" href="%s">Preview Actors</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'actors_updated_messages' );
