<?php


/**
 * Install films.
 * 
 * @access public
 * @param mixed $actors
 * @param mixed $directors
 * @return array
 */
function bond_api_install_films($actors, $directors) {
    $films = array(
        array(
            'title' => 'Dr. No',
            'year' => 1962,
            'actor' => 'Sean Connery',
            'director' => 'Terence Young',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/4/43/Dr._No_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'From Russia with Love',
            'year' => 1963,
            'actor' => 'Sean Connery',
            'director' => 'Terence Young',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/a/ad/From_Russia_with_Love_%E2%80%93_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Goldfinger',
            'year' => 1964,
            'actor' => 'Sean Connery',
            'director' => 'Guy Hamilton',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/9/9a/Goldfinger_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Thunderball',
            'year' => 1965,
            'actor' => 'Sean Connery',
            'director' => 'Terence Young',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/1/1f/Thunderball_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'You Only Live Twice',
            'year' => 1967,
            'actor' => 'Sean Connery',
            'director' => 'Lewis Gilbert',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/3/32/You_Only_Live_Twice_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'On Her Majesty\'s Secret Service',
            'year' => 1969,
            'actor' => 'George Lazenby',
            'director' => 'Peter R. Hunt',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/f/f3/On_Her_Majesty%27s_Secret_Service_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Diamonds Are Forever',
            'year' => 1971,
            'actor' => 'Sean Connery',
            'director' => 'Guy Hamilton',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/7/77/Diamonds_Are_Forever_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Live and Let Die',
            'year' => 1973,
            'actor' => 'Roger Moore',
            'director' => 'Guy Hamilton',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/3/36/Live_and_Let_Die-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'The Man with the Golden Gun',
            'year' => 1974,
            'actor' => 'Roger Moore',
            'director' => 'Guy Hamilton',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/0/0c/The_Man_with_the_Golden_Gun_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'The Spy Who Loved Me',
            'year' => 1977,
            'actor' => 'Roger Moore',
            'director' => 'Lewis Gilbert',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/d/d7/The_Spy_Who_Loved_Me_%28UK_cinema_poster%29.jpg',
        ),
        array(
            'title' => 'Moonraker',
            'year' => 1979,
            'actor' => 'Roger Moore',
            'director' => 'Lewis Gilbert',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/6/66/Moonraker_%28UK_cinema_poster%29.jpg',
        ),
        array(
            'title' => 'For Your Eyes Only',
            'year' => 1981,
            'actor' => 'Roger Moore',
            'director' => 'John Glen',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/c/cd/For_Your_Eyes_Only_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Octopussy',
            'year' => 1983,
            'actor' => 'Roger Moore',
            'director' => 'John Glen',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/b/b2/Octopussy_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'A View to a Kill',
            'year' => 1985,
            'actor' => 'Roger Moore',
            'director' => 'John Glen',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/0/03/A_View_to_a_Kill_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'The Living Daylights',
            'year' => 1987,
            'actor' => 'Timothy Dalton',
            'director' => 'John Glen',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/a/ae/The_Living_Daylights_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'License to Kill',
            'year' => 1989,
            'actor' => 'Timothy Dalton',
            'director' => 'John Glen',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c2/Licence_to_Kill_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'GoldenEye',
            'year' => 1995,
            'actor' => 'Pierce Brosnan',
            'director' => 'Martin Campbell',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/2/24/GoldenEye_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Tomorrow Never Dies',
            'year' => 1997,
            'actor' => 'Pierce Brosnan',
            'director' => 'Roger Spottiswoode',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/b/b3/Tomorrow_Never_Dies_%28UK_cinema_poster%29.jpg',
        ),
        array(
            'title' => 'The World Is Not Enough',
            'year' => 1999,
            'actor' => 'Pierce Brosnan',
            'director' => 'Michael Apted',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/0/0c/The_World_Is_Not_Enough_%28UK_cinema_poster%29.jpg',
        ),
        array(
            'title' => 'Die Another Day',
            'year' => 2002,
            'actor' => 'Pierce Brosnan',
            'director' => 'Lee Tamahori',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/3/3d/Die_another_Day_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Casino Royale',
            'year' => 2006,
            'actor' => 'Daniel Craig',
            'director' => 'Martin Campbell',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/1/15/Casino_Royale_2_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Quantum of Solace',
            'year' => 2008,
            'actor' => 'Daniel Craig',
            'director' => 'Marc Forster',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/2/2d/Quantum_of_Solace_-_UK_cinema_poster.jpg',
        ),
        array(
            'title' => 'Skyfall',
            'year' => 2012,
            'actor' => 'Daniel Craig',
            'director' => 'Sam Mendes',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/a/a7/Skyfall_poster.jpg',
        ),
        array(
            'title' => 'Spectre',
            'year' => 2015,
            'actor' => 'Daniel Craig',
            'director' => 'Sam Mendes',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Spectre_poster.jpg',
        ),
    );

    foreach ( $films as $key => $film_data ) :
        $film = get_page_by_title( $film_data['title'], OBJECT, 'films' );

        if ( ! $film ) :
            $post_id = wp_insert_post(
                array(
                    'post_title' => $film_data['title'],
                    'post_content' => '',
                    'post_type' => 'films',
                    'post_status' => 'publish',
                )
            );

            if ( ! is_wp_error( $post_id ) ) :
                $film_data[ $key ]['id'] = $post_id;
            endif;
        else :
            $post_id = $film->ID;
        endif;
        
        // get actor id
        foreach ($actors as $actor) :
            if ($film_data['actor'] == $actor['title']) :
                $actor_id = $actor['id'];
                break;
            endif;
        endforeach;

        // get director id
        foreach ($directors as $director) :
            if ($film_data['director'] == $director['title']) :
                $director_id = $director['id'];
                break;
            endif;
        endforeach;
        
        // add meta.
        update_post_meta($post_id, '_actor_id', $actor_id);
        update_post_meta($post_id, '_director_id', $director_id);                  

        // set featured image.
        //bond_api_install_insert_image($film_data['image'], $post_id);        
    endforeach;

    return $films;
}

/**
 * Insert image.
 * 
 * @access public
 * @param mixed $image
 * @param mixed $post_id
 * @return void
 */
function bond_api_install_insert_image($image, $post_id) {
        // load featured image. -- TURN INTO FUNCTION
        $image = $film_data['image'];
        
        // magic sideload image returns an HTML image, not an ID
        $media = media_sideload_image($image, $post_id);        

        // therefore we must find it so we can set it as featured ID
        if (!empty($media) && !is_wp_error($media)) :
            $args = array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_status' => 'any',
                'post_parent' => $post_id
            );
        
            // reference new image to set as featured
            $attachments = get_posts($args);
        
            if (isset($attachments) && is_array($attachments)) :
                foreach($attachments as $attachment) :
                    // grab source of full size images (so no 300x150 nonsense in path)
                    $image = wp_get_attachment_image_src($attachment->ID, 'full');
                    
                    // determine if in the $media image we created, the string of the URL exists
                    if (strpos($media, $image[0]) !== false) :
                        // if so, we found our image. set it as thumbnail
                        set_post_thumbnail($post_id, $attachment->ID);
                        
                        // only want one image
                        break;
                    endif;
                endforeach;
            endif;
        endif;    
}
