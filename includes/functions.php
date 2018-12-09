<?php
    
function bond_api_get_actors_films($actor_id = 0) {
    global $wpdb;
    
    $films = $wpdb->get_col("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = $actor_id");

    return $films;    
}