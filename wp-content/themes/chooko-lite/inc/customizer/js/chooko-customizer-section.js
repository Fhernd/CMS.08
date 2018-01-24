/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add Chooko Pro upgrade message
	upgrade = $('<a class="chooko-customize-pro"></a>')
	.attr('href', "https://www.iceablethemes.com/shop/chooko-pro/")
	.attr('target', '_blank')
	.text(chooko_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.chooko-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );
