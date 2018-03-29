<?php

function my_theme_enqueue_styles() {

    $parent_style = 'nucleare-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'necromantic-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function nucleare_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a> | </span>';

	echo '<span class="comments-link">' . $posted_on . ' | </span><span class="comments-link">' . $byline . '</span>'; // WPCS: XSS OK.
	
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'nucleare' ), esc_html__( '1 Comment', 'nucleare' ), esc_html__( '% Comments', 'nucleare' ) );
		echo '</span>';
	}

}

function nucleare_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {		
		$tags_list = get_the_tag_list( '', ', ' );
		
		if ( $tags_list ) {
						printf( '<div class="entry-bottom smallPart"><span class="tags-links">' . __( '%1$s', 'nucleare' ) . '</span><br /><br /></div>', $tags_list );
		}
	}
}