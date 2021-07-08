<?php

/**
 * Install actors.
 *
 * @access public
 * @return array
 */
function bond_api_install_actors() {
    $actors = array(
        array(
            'title' => 'Sean Connery',
        ),
        array(
            'title' => 'George Lazenby',
        ),
        array(
            'title' => 'Roger Moore',
        ),
        array(
            'title' => 'Timothy Dalton',
        ),
        array(
            'title' => 'Pierce Brosnan',
        ),
        array(
            'title' => 'Daniel Craig',
        ),
    );

    foreach ( $actors as $key => $actor_data ) :
        $post_id = get_page_by_title( $actor_data['title'], OBJECT, 'actors' );

        if ( ! $post_id ) :
            $post_id = wp_insert_post(
                array(
                    'post_title' => $actor_data['title'],
                    'post_content' => '',
                    'post_type' => 'actors',
                    'post_status' => 'publish',
                )
            );

            if ( ! is_wp_error( $post_id ) ) :
                $actors[ $key ]['id'] = $post_id;
            endif;
        else :
            $actors[ $key ]['id'] = $post_id->ID;
        endif;
    endforeach;

    return $actors;
}
