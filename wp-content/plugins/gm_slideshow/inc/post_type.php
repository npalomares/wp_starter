<?
// Custom Post Type for Slides
function register_cpt_slide() {

    $labels = array( 
        'name'                  => _x( 'Slides', 'slide' ),
        'singular_name'         => _x( 'Slide', 'slide' ),
        'add_new'               => _x( 'Add New', 'slide' ),
        'add_new_item'          => _x( 'Add New Slide', 'slide' ),
        'edit_item'             => _x( 'Edit Slide', 'slide' ),
        'new_item'              => _x( 'New Slide', 'slide' ),
        'view_item'             => _x( 'View Slide', 'slide' ),
        'search_items'          => _x( 'Search Slides', 'slide' ),
        'not_found'             => _x( 'No slides found', 'slide' ),
        'not_found_in_trash'    => _x( 'No slides found in Trash', 'slide' ),
        'parent_item_colon'     => _x( 'Parent Slide:', 'slide' ),
        'menu_name'             => _x( 'Slideshow', 'slide' ),
    );

    $args = array( 
        'labels'                => $labels,
        'hierarchical'          => true,
        
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        //'taxonomies'            => array('category'),
        //'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        
        
        'show_in_nav_menus'     => true,
        //'publicly_queryable'    => true,
        'exclude_from_search'   => true,
        //'has_archive'           => true,
        //'query_var'             => true,
        //'can_export'            => true,
        //'rewrite'               => true,
        'capability_type'       => 'post',
    );

    register_post_type( 'slide', $args );
}
add_action( 'init', 'register_cpt_slide' );
?>