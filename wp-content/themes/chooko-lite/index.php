<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Main Index
 *
 */

get_header();
global $header_image;

?>
<div id="main-content" class="container<?php echo ( ! $header_image ) ? ' no-header-image' : ''; ?>">
	<?php

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ) :
		?>
		<h1 class="page-title">
			<?php
			// Translators: %s is the search term.
			printf( esc_html__( 'Search Results for "%s"', 'chooko-lite' ), get_search_query() );
			?>
		</h1>
		<?php
	endif;

	/* ARCHIVE CONDITIONAL TITLE */
	if ( is_archive() ) :
		?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<?php
	endif;

	/* DEFAULT CONDITIONAL TITLE */
	if ( is_home() && ! is_front_page() ) :
		?>
		<h1 class="page-title"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
		<?php
	endif;

	?>
	<div id="page-container" class="left with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>

					<div class="postmetadata">
						<?php
						if ( 'post' === get_post_type() ) :  // Do not display this for pages
							?>
							<span class="meta-date published"><span class="icon"></span><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
							<?php

							// Echo updated date for hatom-feed - not to be displayed on front end
							?>
							<span class="updated"><?php the_modified_date( get_option( 'date_format' ) ); ?></span>

							<span class="meta-author vcard author"><span class="icon"></span>
								<?php
									printf(
										// Translators: %s is the author's name
										wp_kses_post( __( 'by %s', 'chooko-lite' ) ),
										'<span class="fn">' . get_the_author() . '</span>'
									);
								?>
							</span>

							<span class="meta-category"><span class="icon"></span><?php esc_html_e( 'in', 'chooko-lite' ); ?> <?php the_category( ', ' ); ?></span>
							<?php

							if ( comments_open() || '0' !== get_comments_number() ) :
								?>
								<span class="meta-comments"><span class="icon"></span>
								<?php
								comments_popup_link(
									__( 'No Comment', 'chooko-lite' ),
									__( '1 Comment', 'chooko-lite' ),
									__( '% Comments', 'chooko-lite' ),
									'',
									__( 'Comments Off', 'chooko-lite' )
								);
								?>
								</span>
								<?php
							endif;

						endif;

						edit_post_link(
							__( 'Edit', 'chooko-lite' ),
							'<span class="editlink"><span class="icon"></span>',
							'</span>'
						);

						?>
					</div>

					<div class="post-contents">
						<?php
						if ( '' !== get_the_post_thumbnail() ) : // As recommended from the WP codex, to avoid potential failure of has_post_thumbnail()
							?>
							<div class="thumbnail">
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
									<?php
									the_post_thumbnail(
										'post-thumbnail',
										array(
											'class' => 'scale-with-grid',
										)
									);
									?>
								</a>
							</div>
							<?php
						endif;
						?>
						<div class="post-content">
							<?php
							if (
								get_post_format()
								|| post_password_required()
								|| 'content' === get_theme_mod( 'chooko_blog_index_content' )
							) :
								the_content();
							else :
									the_excerpt();
							endif;
							?>
						</div>
						<?php

						if ( has_tag() ) :
							the_tags( '<span class="tags"><span>', '</span><span>', '</span></span>' );
						endif;

						?>
					</div>
				</div>

				<hr />
				<?php

			endwhile;

		else :

			if ( is_search() ) : // Empty search results

				?>
				<h2><?php esc_html_e( 'Not Found', 'chooko-lite' ); ?></h2>
				<p>
					<?php
					echo sprintf(
						// Translators: %s is the search term
						esc_html__( 'Your search for "%s" did not return any result.', 'chooko-lite' ),
						get_search_query()
					);
					?>
					<br />
					<?php esc_html_e( 'Would you like to try another search ?', 'chooko-lite' ); ?>
				</p>
				<?php
				get_search_form();

			else : // Empty loop (this should never happen!)

				?>
				<h2><?php esc_html_e( 'Not Found', 'chooko-lite' ); ?></h2>
				<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'chooko-lite' ); ?></p>
				<?php

			endif;

		endif;

		?>
		<div class="page_nav">
			<?php
			if ( null !== get_next_posts_link() ) :
				?>
				<div class="previous"><?php next_posts_link( __( 'Previous Posts', 'chooko-lite' ) ); ?></div>
				<?php
			endif;

			if ( null !== get_previous_posts_link() ) :
				?>
				<div class="next"><?php previous_posts_link( __( 'Next Posts', 'chooko-lite' ) ); ?></div>
				<?php
			endif;
			?>
		</div>
	</div>

	<div id="sidebar-container" class="right">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php

get_footer();
