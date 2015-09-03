<?
function portfolio_industries_init() {
	register_taxonomy(
		'Industry',
		'portfolio',
		array(
			'label' => __( 'Industries' ),
			'rewrite' => array( 
				'slug' => 'industry',
				'show_ui' => true,
			),
			'hierarchical' => true,
		)
	);
	
	register_taxonomy(
		'Services',
		'portfolio',
		array(
			'label' => __( 'Services' ),
			'rewrite' => array( 
				'slug' => 'service',
				'show_ui' => true,
			),
			'hierarchical' => true,
		)
	);
	
}
add_action( 'init', 'portfolio_industries_init' );
?>