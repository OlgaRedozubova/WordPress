<?php
/*
Plugin Name: Списое фильмов
*/

add_filter('the_content', 'the_country');
function the_country ($content) {
    if (!is_single()){
        return $content;
    }
    if( $GLOBALS['post']->post_type != 'acme_films' )
        return $content;
    $content .= '<p><strong>Страна: </strong>';
    $cur_terms = get_the_terms( $GLOBALS['post']->ID, 'country' );
    if ($cur_terms) {
        foreach ($cur_terms as $cur_term) {
            $content .= '<span>' . $cur_term->name . '</span>, ';
        }
    }
    $content .= '</p>';
return $content;
}

add_filter('the_content', 'the_genre');
function the_genre ($content) {
    if (!is_single()){
        return $content;
    }
    if( $GLOBALS['post']->post_type != 'acme_films' )
    return $content;
    $content .= '<p><strong>Жанр: </strong>';
    $cur_terms = get_the_terms( $GLOBALS['post']->ID, 'genre' );
    if ($cur_terms) {
        foreach ($cur_terms as $cur_term) {
            $content .= '<span>' . $cur_term->name . '</span>, ';
        }
    }
    $content .= '</p>';
return $content;
}

add_filter('the_content', 'the_year');
function the_year ($content) {
    if (!is_single()){
        return $content;
    }
    if( $GLOBALS['post']->post_type != 'acme_films' )
    return $content;
    $content .= '<p><strong>Год выхода: </strong>';
    $cur_terms = get_the_terms( $GLOBALS['post']->ID, 'year' );
    if ($cur_terms) {
        foreach ($cur_terms as $cur_term) {
            $content .= '<span>' . $cur_term->name . '</span>, ';
        }
    }
    $content .= '</p>';
return $content;
}
?>