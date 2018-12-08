<?php

/**
 * Install directors.
 *
 * @access public
 * @return array
 */
function bond_api_install_directors() {
    $directors = array(
        array(
            'title' => 'Terence Young',
        ),
        array(
            'title' => 'Guy Hamilton',
        ),
        array(
            'title' => 'Lewis Gilbert',
        ),
        array(
            'title' => 'Peter R. Hunt',
        ),
        array(
            'title' => 'John Glen',
        ),
        array(
            'title' => 'Martin Campbell',
        ),
        array(
            'title' => 'Roger Spottiswoode',
        ),
        array(
            'title' => 'Michael Apted',
        ),
        array(
            'title' => 'Lee Tamahori',
        ),
        array(
            'title' => 'Marc Forster',
        ),
        array(
            'title' => 'Sam Mendes',
        ),
    );

    foreach ( $directors as $key => $director_data ) :
        $post_id = get_page_by_title( $director_data['title'], OBJECT, 'directors' );

        if ( ! $post_id ) :
            $post_id = wp_insert_post(
                array(
                    'post_title' => $director_data['title'],
                    'post_content' => '',
                    'post_type' => 'directors',
                    'post_status' => 'publish',
                )
            );

            if ( ! is_wp_error( $post_id ) ) :
                $directors[ $key ]['id'] = $post_id;
            endif;
        else :
            $directors[ $key ]['id'] = $post_id->ID;
        endif;
    endforeach;

    return $directors;
}
