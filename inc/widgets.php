<?php

function create_widget( $name, $id, $description ) {

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

function social_widget( $name, $id, $description ) {

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

function home_widgets( $name, $id, $description ) {

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


function endofpost_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="endofpost">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// Create Widgets for Homepage

home_widgets( 'Homepage Call to Action Bar', 'front-bar', 'Call to action bar and button on the homepage' );
home_widgets( 'Homepage Bottom Left', 'home-left', 'Free content area at the bottom of the homepage - left box' );
home_widgets( 'Homepage Bottom Right', 'home-right', 'Free content area at the bottom of the homepage - right box' );

// Create Widget areas for Pages and Blog Posts

create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of blog posts' );
endofpost_widget( 'End of Posts', 'end-post', 'Displays at the bottom of blog posts' );

// Create Widget areas for Footer

social_widget( 'Social Icons', 'social-icons', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

?>