<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Single Post Template
 *
 */

get_header();
global $header_image;

?>
<div id="main-content" class="container<?php echo ( ! $header_image ) ? ' no-header-image' : ''; ?>">
	<div id="page-container" class="left with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="postmetadata">
						<span class="meta-date published"><span class="icon"></span>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</a>
						</span>
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
						<?php

						if ( has_category() ) :
							?>
							<span class="meta-category"><span class="icon"></span><?php esc_html_e( 'in', 'chooko-lite' ); ?> <?php the_category( ', ' ); ?></span>
							<?php
						endif;

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
								<a href="<?php the_permalink(); ?>">
									<?php
									the_post_thumbnail(
										'large',
										array(
											'class' => 'scale-with-grid',
										)
									);
									?>
								</a>
							</div>
							<?php
						endif;

						the_content();

						?>
						<div class="clear"></div>
						<?php

						wp_link_pages(
							array(
								'before'           => '<br class="clear" /><div class="paged_nav"><span class="paged_nav_label">' . __( 'Pages', 'chooko-lite' ) . '</span>',
								'after'            => '</div>',
								'link_before'      => '<span>',
								'link_after'       => '</span>',
								'next_or_number'   => 'number',
								'nextpagelink'     => __( 'Next page', 'chooko-lite' ),
								'previouspagelink' => __( 'Previous page', 'chooko-lite' ),
								'pagelink'         => '%',
								'echo'             => 1,
							)
						);

						the_tags( '<span class="tags"><span>', '</span><span>', '</span></span>' );

						?>
					</div>
					<br class="clear" />
				</div>

				<div class="page_nav">
					<?php
					if ( is_attachment() ) :
						// Use image navigation links on attachment pages, post navigation otherwise
						if ( chooko_adjacent_image_link( false ) ) : // Is there a previous image ?
							?>
							<div class="previous"><?php previous_image_link( 0, __( 'Previous Image', 'chooko-lite' ) ); ?></div>
							<?php
						endif;

						if ( chooko_adjacent_image_link( true ) ) : // Is there a next image ?
							?>
							<div class="next"><?php next_image_link( 0, __( 'Next Image', 'chooko-lite' ) ); ?></div>
							<?php
						endif;

					else :

						if ( '' !== get_adjacent_post( false, '', true ) ) : // Is there a previous post?
							?>
							<div class="previous"><?php previous_post_link( '%link', __( 'Previous Post', 'chooko-lite' ) ); ?></div>
							<?php
						endif;

						if ( '' !== get_adjacent_post( false, '', false ) ) : // Is there a next post?
							?>
							<div class="next"><?php next_post_link( '%link', __( 'Next Post', 'chooko-lite' ) ); ?></div>
							<?php
						endif;

					endif;

					?>
					<br class="clear" />
				</div>
				<?php

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || '0' !== get_comments_number() ) :
					?>
					<hr />
					<div class="comments">
						<?php comments_template( '', true ); ?>
					</div>

					<div class="page_nav">
						<?php
						if ( '' !== get_adjacent_post( false, '', true ) ) : // Is there a previous post?
							?>
							<div class="previous"><?php previous_post_link( '%link', __( 'Previous Post', 'chooko-lite' ) ); ?></div>
							<?php
						endif;

						if ( '' !== get_adjacent_post( false, '', false ) ) : // Is there a next post?
							?>
							<div class="next"><?php next_post_link( '%link', __( 'Next Post', 'chooko-lite' ) ); ?></div>
							<?php
						endif;
						?>
						<br class="clear" />
					</div>
					<?php

				endif;

			endwhile;

		else :

			?>
			<h2><?php esc_html_e( 'Not Found', 'chooko-lite' ); ?></h2>
			<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'chooko-lite' ); ?></p>
			<?php

		endif;

		?>
	</div>

	<div id="sidebar-container" class="right">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php

get_footer();
