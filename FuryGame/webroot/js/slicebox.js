$(document).ready(function(){

	$(function() {
		
		var Page = (function() {

			var $navArrows = $( '#nav-arrows' ).hide(),
				$shadow = $( '#shadow' ).hide(),
				slicebox = $( '#sb-slider' ).slicebox( {
					onReady : function() {

						$navArrows.show();
						$shadow.show();

					},
					orientation : 'r',
					cuboidsRandom : true,
					disperseFactor : 30
				} ),
				
				init = function() {

					initEvents();
					
				},
				initEvents = function() {

					// add navigation events
					$navArrows.children( ':first' ).on( 'click', function() {

						slicebox.next();
						return false;

					} );

					$navArrows.children( ':last' ).on( 'click', function() {
						
						slicebox.previous();
						return false;

					} );
					
					// Permet de faire une pause sur l'image du slider lorsque ma souris est en hover, et dès que je sort ma souris de l'image, le slider recommence. 
					$( '#sb-slider' ).hover(
						function(){slicebox.pause();}, 
						function(){slicebox.play();} 
					);
				};
				return { init : init };
		})();
		Page.init();
	});	
});