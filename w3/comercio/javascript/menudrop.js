// JavaScript Document
$(document).ready(function() {
	if(document.all) {
		$('#Menu li.HasSubMenu').hover(function() {
			$(this).addClass('over');
			return false;
		},
		function() {
			$(this).removeClass('over');
		});
	}
});