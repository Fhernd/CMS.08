<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Comments template
 *
 */


if ( post_password_required() ) :
	?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'chooko-lite' ); ?></p>
	<?php
	return;
endif;

if ( have_comments() ) :
	?>
	<h3 id="comments">
		<?php
		printf(
			// Translators: %1$s is the number of comments, %2$s is the post title
			esc_html( _n( '%1$s Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'chooko-lite' ) ),
			esc_html( number_format_i18n( get_comments_number() ) ),
			get_the_title()
		);
		?>
	</h3>

	<ol class="commentlist">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => 64,
			)
		);
		?>
	</ol>
	<?php

	if ( chooko_page_has_comments_nav() ) :
	?>
	<div class="comments_nav">
		<?php

		if ( chooko_page_has_previous_comments_link() ) :
		?>
		<div class="previous"><?php previous_comments_link( __( 'Older comments', 'chooko-lite' ) ); ?></div>
		<?php
		endif;

		if ( chooko_page_has_next_comments_link() ) :
		?>
		<div class="next"><?php next_comments_link( __( 'Newer comments', 'chooko-lite' ) ); ?></div>
		<?php
		endif;

		?>
	</div>
	<?php
	endif;

else : // this is displayed if there are no comments so far

	if ( ! comments_open() ) :
		?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'chooko-lite' ); ?></p>
		<?php
	endif;

endif;

if ( comments_open() ) :
	comment_form();
endif;
