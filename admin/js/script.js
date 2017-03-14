/*
 * This code is based on Theme Foundry's "Make" theme
 * Make WordPress Theme, Copyright 2014 The Theme Foundry
 * Make is distributed under the terms of the GNU GPL
 */
( function( $ ) {

		upgrade = $('<a class="gem-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/checkout?edd_action=add_to_cart&download_id=1988')
			.attr('target', '_blank')
			.text(gem_upgrade.message);

		$('.preview-notice').append(upgrade);

		// Remove accordion click event
		$('.gem-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});

} )( jQuery );