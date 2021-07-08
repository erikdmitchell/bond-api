<?php

function bond_api_get_actors_films( $actor_id = 0 ) {
    global $wpdb;

    $films = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_value = $actor_id" );

    return $films;
}

function bond_api_get_directors_films( $director_id = 0 ) {
    global $wpdb;

    $films = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_value = $director_id" );

    return $films;
}

function bond_api_get_villains_films( $villain_id = 0 ) {
    $films = get_post_meta( $villain_id, '_film_ids', true );

    return $films;
}

function bond_api_get_film_details( $film_id = 0 ) {
    $film_details = array();

    $film_details['actor'] = get_post_meta( $film_id, '_actor_id', true );
    $film_details['director'] = get_post_meta( $film_id, '_director_id', true );
    $film_details['year'] = get_post_meta( $film_id, '_year', true );

    return $film_details;
}