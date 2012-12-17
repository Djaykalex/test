$(document).ready(function() {
	
	$( "#accordion" ).accordion({
		collapsible: true
	});
	
	$( ".draggable" ).draggable();
	$( "#droppable" ).droppable({
		drop: function( event, ui ) {
			$( this )
				.addClass( "ui-state-highlight" )
				.find( "p" )
				.html( "Dropped!" );
		}
	});	
});