$(document).ready(function() {
	var $url = window.location.href;

	var $index = $url.indexOf('=');
	var $var = $url.substring($index+1);

	$(".url-var").val($var);
});