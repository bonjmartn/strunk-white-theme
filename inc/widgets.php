<?php

function strunk_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function strunk_social_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function strunk_home_widgets( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}


// Create Widgets for Homepage

strunk_home_widgets( 'Homepage Call to Action Bar', 'front-bar', 'Call to action bar and button on the homepage' );

// Create Widget areas for Pages and Blog Posts

strunk_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages' );
strunk_create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of blog posts' );

// Create Widget areas for Footer

strunk_social_widget( 'Social Icons', 'social-icons', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

?>