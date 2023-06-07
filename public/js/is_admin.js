$(document).ready(function() {
	$.ajax({
		url: "../php/is_admin.php",
		type: "GET",
		dataType: "text",
		success: function(response) {
			$('#admin').html(response);
		},
		error: function() {
			alert("Faild to load content.");
		}
	});
});