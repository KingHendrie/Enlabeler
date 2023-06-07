$(document).ready(function() {
	$.ajax({
		url: "../php/load_project_instance.php",
		type: "GET",
		dataType: "json",
		success: function(response) {
			var html = '';
			
			response.forEach(function(row) {
				html +=
					`<div class="projects">
						<div class="projects-block-title"> ${row.project_name} </div>
						<div style="text-align:center" class="projects-block-inner">
							<p>${row.service}</p>
							<p>Budget: ${row.billing_cur}${row.budget}</p>
							<p>Cost: ${row.pro_cost}</p>
							<p>Budget Remaining: ${row.billing_cur}${budget_remaining}</p>
							<form name="${row.pro_id}" id="formToSubmit" method="post">
								<button id="triggerFormSubmit" type="submit">
									<i class="fa-solid fa-pen-to-square"></i>
								</button>
							</form>
						</div>
					</div>`;
			});

			$('#projects').html(html);
		},
		error: function() {
			console.log(response);
			alert("Failed to load data.");
		}
	});
});