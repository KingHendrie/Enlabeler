$(document).ready(function() {
	$.ajax({
		url: "../php/load_project.php",
		type: "GET",
		dataType: "json",
		success: function(response) {
			var tableBody = $('#load_admin');
			response.forEach(function(row) {
				var newRow = $('<tr>');
				newRow.append($('<td>').text(row.project_name));
				newRow.append($('<td>').text(row.member_id));
				newRow.append($('<td>').text(row.serv_id));
				newRow.append($('<td>').text(row.budget));
				newRow.append($('<td>').text(row.budget_remaining));
				newRow.append($('<td>').text(row.billing_cur));
				newRow.append($('<td>').text(row.pro_cost));
				newRow.append($('<td>').html(
					`<form name="${row.pro_id}" id="formToSubmit" method="post">
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