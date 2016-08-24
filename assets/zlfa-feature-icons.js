window.zlfa_featured_icons = ( function( window, document, $ ) {

	var app = {};

	app.init = function() {

		$( '.zlfai-icons' ).select2({
			containerCssClass: 'zlfa-icons-select2',
			dropdownCssClass: 'zlfa-icons-dropdown',
			escapeMarkup: function( content ) { return content },
			templateResult: function( result ) {
				var originalOption = result.element;
				if ( result.text == 'No Icon' ) {
					return '<i class="fa fa-times faded"></i>';
				}
				return '<i class="fa ' + $( originalOption ).attr( 'value' ) + '"></i>';
			}
		});

	};

	$( document ).on( 'widget-added', app.init );
	return app;

} )( window, document, jQuery );