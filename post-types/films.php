<?php

/**
 * Registers the `films` post type.
 */
function films_init() {
    register_post_type(
        'films', array(
            'labels'                => array(
                'name'                  => __( 'Films', 'bond-api' ),
                'singular_name'         => __( 'Film', 'bond-api' ),
                'all_items'             => __( 'All Films', 'bond-api' ),
                'archives'              => __( 'Film Archives', 'bond-api' ),
                'attributes'            => __( 'Film Attributes', 'bond-api' ),
                'insert_into_item'      => __( 'Insert into Film', 'bond-api' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Film', 'bond-api' ),
                'featured_image'        => _x( 'Featured Image', 'films', 'bond-api' ),
                'set_featured_image'    => _x( 'Set featured image', 'films', 'bond-api' ),
                'remove_featured_image' => _x( 'Remove featured image', 'films', 'bond-api' ),
                'use_featured_image'    => _x( 'Use as featured image', 'films', 'bond-api' ),
                'filter_items_list'     => __( 'Filter Films list', 'bond-api' ),
                'items_list_navigation' => __( 'Films list navigation', 'bond-api' ),
                'items_list'            => __( 'Films list', 'bond-api' ),
                'new_item'              => __( 'New Film', 'bond-api' ),
                'add_new'               => __( 'Add New', 'bond-api' ),
                'add_new_item'          => __( 'Add New Film', 'bond-api' ),
                'edit_item'             => __( 'Edit Film', 'bond-api' ),
                'view_item'             => __( 'View Film', 'bond-api' ),
                'view_items'            => __( 'View Films', 'bond-api' ),
                'search_items'          => __( 'Search Films', 'bond-api' ),
                'not_found'             => __( 'No Films found', 'bond-api' ),
                'not_found_in_trash'    => __( 'No Films found in trash', 'bond-api' ),
                'parent_item_colon'     => __( 'Parent Film:', 'bond-api' ),
                'menu_name'             => __( 'Films', 'bond-api' ),
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
            'menu_icon'             => 'dashicons-video-alt2',
            'show_in_rest'          => true,
            'rest_base'             => 'films',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );

}
add_action( 'init', 'films_init' );

/**
 * Sets the post updated messages for the `films` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `films` post type.
 */
function films_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['film'] = array(
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf( __( 'Film updated. <a target="_blank" href="%s">View Film</a>', 'bond-api' ), esc_url( $permalink ) ),
        2  => __( 'Custom field updated.', 'bond-api' ),
        3  => __( 'Custom field deleted.', 'bond-api' ),
        4  => __( 'Film updated.', 'bond-api' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Film restored to revision from %s', 'bond-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        /* translators: %s: post permalink */
        6  => sprintf( __( 'Film published. <a href="%s">View Film</a>', 'bond-api' ), esc_url( $permalink ) ),
        7  => __( 'Film saved.', 'bond-api' ),
        /* translators: %s: post permalink */
        8  => sprintf( __( 'Film submitted. <a target="_blank" href="%s">Preview Film</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(
            __( 'Film scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Film</a>', 'bond-api' ),
            date_i18n( __( 'M j, Y @ G:i', 'bond-api' ), strtotime( $post->post_date ) ), esc_url( $permalink )
        ),
        /* translators: %s: post permalink */
        10 => sprintf( __( 'Film draft updated. <a target="_blank" href="%s">Preview Film</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'films_updated_messages' );
