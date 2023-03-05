<?php
add_action( 'init', 'register_citygovt_gallery_postype' );

function register_citygovt_gallery_postype() {
	$labels = array(
		'name'               => __( 'Gallery', 'citygovt-core' ),
		'custom-fields'      => __( 'Add subtitle', 'citygovt-core' ),
		'singular_name'      => __( 'Gallery', 'citygovt-core' ),
		'add_new'            => __( 'Add New', 'citygovt-core' ),
		'add_new_item'       => __( 'Add New Gallery', 'citygovt-core' ),
		'edit_item'          => __( 'Edit Gallery', 'citygovt-core' ),
		'new_item'           => __( 'New Gallery', 'citygovt-core' ),
		'view_item'          => __( 'View Gallery', 'citygovt-core' ),
		'search_items'       => __( 'Search Gallery', 'citygovt-core' ),
		'not_found'          => __( 'No Gallery found', 'citygovt-core' ),
		'not_found_in_trash' => __( 'No Gallery found in Trash', 'citygovt-core' ),
		'parent_item_colon'  => '',
	);

	register_post_type(
		'gallery',
		array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => 10,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'            => array( 'slug' => __( 'gallery', 'citygovt-core' ) ),
		)
	);

	$labels = array(
		'name'              => _x( 'Gallery Categories', 'portfolio categories', 'citygovt-core' ),
		'singular_name'     => _x( 'Gallery Category', 'portfolio category', 'citygovt-core' ),
		'search_items'      => __( 'Search Gallery Categories', 'citygovt-core' ),
		'all_items'         => __( 'All Gallery Categories', 'citygovt-core' ),
		'parent_item'       => __( 'Parent Gallery Category', 'citygovt-core' ),
		'parent_item_colon' => __( 'Parent Gallery Category:', 'citygovt-core' ),
		'edit_item'         => __( 'Edit Gallery Category', 'citygovt-core' ),
		'update_item'       => __( 'Update Gallery Category', 'citygovt-core' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'citygovt-core' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'citygovt-core' ),
		'menu_name'         => __( 'Gallery Category', 'citygovt-core' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery-cat' ),
	);
	register_taxonomy( 'gallery-cat', array( 'gallery' ), $args );

}


add_action( 'init', 'register_citygovt_department' );

function register_citygovt_department() {
	$labels = array(
		'name'               => __( 'department', 'citygovt-core' ),
		'custom-fields'      => __( 'Add subtitle', 'citygovt-core' ),
		'singular_name'      => __( 'Department', 'citygovt-core' ),
		'add_new'            => __( 'Add New', 'citygovt-core' ),
		'add_new_item'       => __( 'Add New department', 'citygovt-core' ),
		'edit_item'          => __( 'Edit Department', 'citygovt-core' ),
		'new_item'           => __( 'New Department', 'citygovt-core' ),
		'view_item'          => __( 'View Department', 'citygovt-core' ),
		'search_items'       => __( 'Search Department', 'citygovt-core' ),
		'not_found'          => __( 'No Department found', 'citygovt-core' ),
		'not_found_in_trash' => __( 'No Department found in Trash', 'citygovt-core' ),
		'parent_item_colon'  => '',
	);

	register_post_type(
		'department',
		array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => 17,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'            => array( 'slug' => __( 'department', 'citygovt-core' ) ),
		)
	);


}
