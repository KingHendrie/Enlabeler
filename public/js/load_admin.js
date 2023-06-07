$(document).ready(function() {
	$.ajax({
		url: "../php/load_admin.php",
		type: "GET",
		dataType: "json",
		success: function(response) {
			var tableBody = $('#load_admin');
			response.forEach(function(row) {
				var newRow = $('<tr>');
				newRow.append($('<td>').text(row.name));
				newRow.append($('<td>').text(row.last_name));
				newRow.append($('<td>').text(row.email));
				newRow.append($('<td>').html(
					`<form name="${row.member_id}" id="formToSubmit" method="post">
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