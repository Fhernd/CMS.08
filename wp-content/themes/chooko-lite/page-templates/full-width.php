<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Template Name: Full-width Page Template, No Sidebar
 *
 */

get_header();
global $header_image;

?>
<div id="main-content" class="container<?php echo ( ! $header_image ) ? ' no-header-image' : ''; ?>">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div id="page-container" <?php post_class(); ?>>
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :

				the_post();

				the_content();

				wp_link_pages(
					array(
						'before'           => '<br class="clear" /><div class="paged_nav">' . __( 'Pages:', 'chooko-lite' ),
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

				?>
				<br class="clear" />
				<?php

				edit_post_link(
					__( 'Edit', 'chooko-lite' ),
					'<div class="postmetadata"><span class="editlink"><span class="icon"></span>',
					'</span></div><br class="clear" />'
				);

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || '0' !== get_comments_number() ) :

					?>
					<div class="comments">
						<?php
						comments_template( '', true );
						next_comments_link();
						previous_comments_link();
						?>
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

</div>
<?php

get_footer();
