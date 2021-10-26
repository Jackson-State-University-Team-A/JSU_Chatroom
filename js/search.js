// JavaScript Document
jQuery(document).ready(function($){
	function runEffect() {
		$(".displaysearch").toggle();
	}
	
    $( ".searchbar" ).on( "click", function() {
    	runEffect();
    });
});