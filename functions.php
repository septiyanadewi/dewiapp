<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/css/custom.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-style-responsive',get_stylesheet_directory_uri() . '/css/responsive.css', array(), $the_theme->get( 'Version' ) );

    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_filter('get_archives_link', 'translate_archive_month');
function translate_archive_month($list) {
    $patterns = array(
        '/January /', '/February /', '/March /', '/April /', '/May /', '/June /',
        '/July /', '/August /', '/September /', '/October /',  '/November /', '/December /'
      );

      $replacements = array( //PUT HERE WHATEVER YOU NEED
        '01/', '02/', '03/', '04/', '05/', '06/',
        '07/', '08/', '09/', '10/', '11/', '12/'
      );
    $list = preg_replace($patterns, $replacements, $list);
    return $list;
}

// function wp_custom_archive($args = '') {
//     global $wpdb, $wp_locale;

//     $defaults = array(
//         'type'            => 'monthly',
//         'limit'           => '',
//         'format'          => 'html',
//         'before'          => '',
//         'after'           => '',
//         'show_post_count' => false,
//         'echo'            => 1,
//         'order'           => 'DESC',
//         'category'        => 4,
//         'post_type'       => 'post'
//     );

//     $r = wp_parse_args( $args, $defaults );
//     extract( $r, EXTR_SKIP );

//     if ( '' != $limit ) {
//         $limit = absint($limit);
//         $limit = ' LIMIT '.$limit;
//     }

//     // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
//     $archive_date_format_over_ride = 0;

//     $archive_month_date_format = 'YYYY/mm';

//     // options for daily archive (only if you over-ride the general date format)
//     $archive_day_date_format = 'YYYY/mm';

//     // options for weekly archive (only if you over-ride the general date format)
//     $archive_week_start_date_format = 'YYYY/mm';
//     $archive_week_end_date_format   = 'YYYY/mm';

//     if ( !$archive_date_format_over_ride ) {
//         $archive_day_date_format = get_option('date_format');
//         $archive_week_start_date_format = get_option('date_format');
//         $archive_week_end_date_format = get_option('date_format');
//         $archive_month_date_format = get_option('date_format');
//     }

//     //filters
//     $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
//     $join = apply_filters('customarchives_join', "", $r);

//     $output = '<ul>';

//         $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
//         $key = md5($query);
//         $cache = wp_cache_get( 'wp_custom_archive' , 'general');
//         if ( !isset( $cache[ $key ] ) ) {
//             $arcresults = $wpdb->get_results($query);
//             $cache[ $key ] = $arcresults;
//             wp_cache_set( 'wp_custom_archive', $cache, 'general' );
//         } else {
//             $arcresults = $cache[ $key ];
//         }
//         if ( $arcresults ) {
//             $afterafter = $after;
//             foreach ( (array) $arcresults as $arcresult ) {
//                 $url = get_month_link( $arcresult->year, $arcresult->month );
//                 $year_url = get_year_link($arcresult->year);
//                 /* translators: 1: month name, 2: 4-digit year */
//                 $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
//                 $year_text = sprintf('%d', $arcresult->year);
//                 if ( $show_post_count )
//                     $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
//                 $year_output = get_archives_link($year_url, $year_text, $format, $before, $after);
//                 $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';
//                 $output .= get_archives_link($url, $text, $format, $before, $after);

//                 $temp_year = $arcresult->year;
//             }
//         }

//     $output .= '</ul>';

//     if ( $echo )
//         echo $output;
//     else
//         return $output;
// }
