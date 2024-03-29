<?php
/**
 * Custom template tags for this theme
 *
 * @package MiningTown
 * @since 1.0.0
 */

if ( ! function_exists( 'miningtown_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function miningtown_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			TwentyNineteen_SVG_Icons::get_svg( 'ui', 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;


if ( ! function_exists( 'miningtown_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function miningtown_entry_meta() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted on
			miningtown_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'miningtown' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'archive', 16 ),
					__( 'Posted in', 'miningtown' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'miningtown' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'tag', 16 ),
					__( 'Tags:', 'miningtown' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'miningtown_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function miningtown_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted on
			miningtown_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'miningtown' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'archive', 16 ),
					__( 'Posted in', 'miningtown' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'miningtown' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'tag', 16 ),
					__( 'Tags:', 'miningtown' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'miningtown_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function miningtown_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'chevron_left', 22 ),
					__( 'Newer posts', 'miningtown' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'miningtown' ),
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'chevron_right', 22 )
				),
			)
		);
	}
endif;
