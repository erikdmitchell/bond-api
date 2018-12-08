<?php

/**
 * Registers the `directors` post type.
 */
function directors_init() {
	register_post_type( 'directors', array(
		'labels'                => array(
			'name'                  => __( 'Directors', 'bond-api' ),
			'singular_name'         => __( 'Directors', 'bond-api' ),
			'all_items'             => __( 'All Directors', 'bond-api' ),
			'archives'              => __( 'Directors Archives', 'bond-api' ),
			'attributes'            => __( 'Directors Attributes', 'bond-api' ),
			'insert_into_item'      => __( 'Insert into directors', 'bond-api' ),
			'uploaded_to_this_item' => __( 'Uploaded to this directors', 'bond-api' ),
			'featured_image'        => _x( 'Featured Image', 'directors', 'bond-api' ),
			'set_featured_image'    => _x( 'Set featured image', 'directors', 'bond-api' ),
			'remove_featured_image' => _x( 'Remove featured image', 'directors', 'bond-api' ),
			'use_featured_image'    => _x( 'Use as featured image', 'directors', 'bond-api' ),
			'filter_items_list'     => __( 'Filter directors list', 'bond-api' ),
			'items_list_navigation' => __( 'Directors list navigation', 'bond-api' ),
			'items_list'            => __( 'Directors list', 'bond-api' ),
			'new_item'              => __( 'New Directors', 'bond-api' ),
			'add_new'               => __( 'Add New', 'bond-api' ),
			'add_new_item'          => __( 'Add New Directors', 'bond-api' ),
			'edit_item'             => __( 'Edit Directors', 'bond-api' ),
			'view_item'             => __( 'View Directors', 'bond-api' ),
			'view_items'            => __( 'View Directors', 'bond-api' ),
			'search_items'          => __( 'Search directors', 'bond-api' ),
			'not_found'             => __( 'No directors found', 'bond-api' ),
			'not_found_in_trash'    => __( 'No directors found in trash', 'bond-api' ),
			'parent_item_colon'     => __( 'Parent Directors:', 'bond-api' ),
			'menu_name'             => __( 'Directors', 'bond-api' ),
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
		'rest_base'             => 'directors',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'directors_init' );

/**
 * Sets the post updated messages for the `directors` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `directors` post type.
 */
function directors_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['directors'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Directors updated. <a target="_blank" href="%s">View directors</a>', 'bond-api' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'bond-api' ),
		3  => __( 'Custom field deleted.', 'bond-api' ),
		4  => __( 'Directors updated.', 'bond-api' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Directors restored to revision from %s', 'bond-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Directors published. <a href="%s">View directors</a>', 'bond-api' ), esc_url( $permalink ) ),
		7  => __( 'Directors saved.', 'bond-api' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Directors submitted. <a target="_blank" href="%s">Preview directors</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Directors scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview directors</a>', 'bond-api' ),
		date_i18n( __( 'M j, Y @ G:i', 'bond-api' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Directors draft updated. <a target="_blank" href="%s">Preview directors</a>', 'bond-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'directors_updated_messages' );
