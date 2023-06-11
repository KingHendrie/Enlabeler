$(document).ready(function() {
	$.ajax({
		url: "../php/get_billing.php",
		type: "GET",
		dataType: "json",
		success: function(response) {
			var billingCurrencyDropdown = $('#billingDropdown');
	
			response.forEach(function(currency) {
				var option = $('<option>', {
				value: currency.rate,
				text: currency.currency,
				name: currency.currency
				});
	
				billingCurrencyDropdown.append(option);
			});
		},
		error: function() {
			alert("Failed to load billing currencies.");
		}
	});
 });