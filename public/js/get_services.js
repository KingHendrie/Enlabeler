$(document).ready(function() {
	$.ajax({
	  	url: "../php/get_services.php",
	  	type: "GET",
	  	dataType: "json",
	  	success: function(response) {
			var serviceDropdown = $('#serviceDropdown');
	
			response.forEach(function(service) {
				var option = $('<option>', {
				value: service.serv_id,
				text: service.service,
				data: service.price_p_unit
				});
	
				serviceDropdown.append(option);
			});
		},
		error: function() {
			alert("Failed to load services.");
		}
	});
 });