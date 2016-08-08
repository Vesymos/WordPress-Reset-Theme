<?php
//Register style sheets and scripts
function theme_assets() {
  //wp_enqueue_style( 'gfonts-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', false );
  wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', '1.0', true);
  wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/css/lib/foundation.min.css', '1.0', true);
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', '1.0', true);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizer', get_stylesheet_directory_uri() . '/js/lib/modernizr.js', '1.0', true );
  wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/js/lib/foundation.min.js', '1.0', true );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/functions.js', '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_assets' );

// Hide WP version strings from scripts and styles
function remove_wp_version_strings( $src ) {
  global $wp_version;
  parse_str(parse_url($src, PHP_URL_QUERY), $query);
  if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
      $src = remove_query_arg('ver', $src);
  }
  return $src;
}
add_filter( 'script_loader_src', 'remove_wp_version_strings' );
add_filter( 'style_loader_src', 'remove_wp_version_strings' );

/* Hide WP version strings from generator meta tag */
function remove_version() {
  return '';
}
add_filter('the_generator', 'remove_version');

//Add post thumbnails
add_theme_support( 'post-thumbnails' );

//Add navigation menus
register_nav_menus( array(
    'primary' => 'Main Menu',
    'footer'  => 'Footer Menu',
) );

//ACF config
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

//Highlight search term in search results
function highlight_search_term($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-term">\0</span>', $text);
	}
    return $text;
}
add_filter('the_excerpt', 'highlight_search_term');
add_filter('the_title', 'highlight_search_term');
