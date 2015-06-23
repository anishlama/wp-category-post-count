if ( ! function_exists( 'get_actual_cat_post_count_by_ID' ) ) :

/**
 * Simple function to get category post count including all subcategories
 *
 * @link http://wordpress.stackexchange.com/a/91551
 * @param  int $cat_id Category ID
 * @return int Total post count
 */
function get_actual_cat_post_count_by_ID( $cat_id ) {
    $q = new WP_Query( array(
        'nopaging' => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $cat_id,
                'include_children' => true,
            ),
        ),
        'fields' => 'ids',
    ) );
    return $q->post_count;
}

endif;
