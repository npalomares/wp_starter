<?
function create_portfolio() {
	$labels = array(
		'name'                => 'Portfolio Items',
		'singular_name'       => 'Portfolio Items',
		'menu_name'           => 'Portfolio Items',
		'parent_item_colon'   => 'Parent Portfolio Item:',
		'all_items'           => 'All Portfolio Items',
		'view_item'           => 'View Portfolio Item',
		'add_new_item'        => 'Add New Portfolio Item',
		'add_new'             => 'New Portfolio Item',
		'edit_item'           => 'Edit Portfolio Item',
		'update_item'         => 'Update Portfolio Item',
		'search_items'        => 'Search Portfolio Items',
		'not_found'           => 'No Portfolio Items found',
		'not_found_in_trash'  => 'No Portfolio Items found in Trash',
	);

	$args = array(
		'label'               => 'Portfolio Items',
		'description'         => 'Portfolio Items post type',
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'capability_type'     => 'page',
		'menu_icon' => plugins_url( 'gm_icon_bw.png', __FILE__ ),
		'rewrite'            => array( 'slug' => 'projects' ),
	);

	register_post_type( 'portfolio', $args );
}

// Hook into the 'init' action
add_action( 'init', 'create_portfolio', 0 );

  // Custom image size for Gaslamp Portfolio pages

  add_image_size('portfolio-thumb', 720, 460, true);

?>