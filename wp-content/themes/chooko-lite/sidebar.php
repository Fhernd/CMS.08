<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Sidebar Template
 *
 */

?>
<ul id="sidebar">
	<?php
	if ( ! dynamic_sidebar( 'sidebar' ) ) :
		?>
		<li id="recent" class="widget-container widget_recent_entries">
			<h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'chooko-lite' ); ?></h3>
			<ul><?php wp_get_archives( 'type=postbypost&limit=5' ); ?></ul>
		</li>

		<li id="archives" class="widget-container widget_archive">
			<h3 class="widget-title"><?php esc_html_e( 'Archives', 'chooko-lite' ); ?></h3>
			<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
		</li>

		<li id="meta" class="widget-container widget_meta">
			<h3 class="widget-title"><?php esc_html_e( 'Meta', 'chooko-lite' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</li>
		<?php
endif;
?>
</ul>
<?php
