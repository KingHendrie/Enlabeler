$(document).ready(function() {
	$.ajax({
	  	url: "../php/get_services.php",
	  	type: "GET",
	  	dataType: "json",
	  	success: function(response) {
			var serviceDropdown = $('#serviceDropdown');
	
			response.forEach(function(service) {
				var option = $('<option>', {
				id: service.serv_id,
				value: service.price_p_unit,
				text: service.service,
				name: service.unit,
				description: service.description
				});
	
				serviceDropdown.append(option);
			});
		},
		error: function() {
			alert("Failed to load services.");
		}
	});
 });