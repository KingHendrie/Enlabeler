$(document).ready(function() {
	$.ajax({
	  	url: "../php/is_logedin.php",
	  	type: "GET",
	  	dataType: "json",
	  	success: function(response) {
			if (response.redirect) {
				window.location.href = response.redirect_url;
			} else {
				console.log(response);
			}
	  	},
	  	error: function(xhr, status, error) {
		 	console.log("Error: " + error);
	  	}
	});
 });