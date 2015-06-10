<?php

return array(
	'args'                  => array(
		'label'     	    => 'Podcast',
		'labels'            => array(
			'menu_name'     => 'Podcast',
			'add_new'       => 'Add a New Show',
		),
		'description'       => 'Articles for the Podcast',
		'public'            => true,
		'menu_position'     => 50,
		'hierarchical'	    => true,
		'rewrite'           => array(
			'slug'          => 'podcast',
		),
		'taxonomies'        => array( 'category', 'post_tag' ),
	),
	'columns_filter'        => array(
		'cb'    	        => true,
		'title' 	        => 'Show Title',
		'author' 	        => 'Author',
		'date'		        => 'Date',
	),
	'columns_data'          => array(
		'date'	            => array(
			'callback'      => 'the_date',
			'echo'          => false,
			'args'          => array(),
		),
	),
);