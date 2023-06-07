$(document).ready(function() {
	$.ajax({
		url: "../php/load_service.php",
		type: "GET",
		dataType: "json",
		success: function(response) {
			console.log(response);
			var tableBody = $('#load_admin');
			response.forEach(function(row) {
				var newRow = $('<tr>');
				newRow.append($('<td>').text(row.service));
				newRow.append($('<td>').text(row.description));
				newRow.append($('<td>').text(row.price_p_unit));
				newRow.append($('<td>').text(row.unit));
				newRow.append($('<td>').html(
					`<form name="${row.serv_id}" id="formToSubmit" method="post">
						<button id="triggerFormSubmit" type="submit" style="border:none; background:none; padding:0px;">
							<i style="color:#ff0000" class="fa-solid fa-trash"></i>
						</button>
					</form>`
				));
				tableBody.append(newRow);
			});
		},
		error: function() {
			alert("Failed to load data.");
		}
	});
});