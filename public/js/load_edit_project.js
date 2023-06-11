$(document).ready(function() {
	var urlParam = new URLSearchParams(window.location.search);
	var projectId = urlParam.get('projectid');

	$.ajax({
		url: '../php/load_edit_project.php',
		type: 'GET',
		data: { projectID: projectId },
		dataType: 'json',
		success: function(response) {
			if (response.success) {
				var project = response.project;

				$('#project_name').val(project.project_name);
				$('#budget').val(project.budget);
				$('#serviceDropdown option').prop('selected', function() {
					return $(this).attr('id') === project.serv_id;
				});
				$('#billingDropdown option').prop('selected', function() {
					return $(this).attr('name') === project.billing_cur;
				});
            $('#units').val(project.units);

				var selectedService = $('#serviceDropdown option:selected');
            $('#serviceDescription').text(selectedService.attr('description'));

				$('#cost').text('Cost: ' + project.billing_cur + project.pro_cost);
            $('#budgetRemaining').text('Budget Remaining: ' + project.billing_cur + project.budget_remaining);

				if (parseInt(project.budget_remaining) < 0) {
					$('#budgetRemaining').attr('style', 'color:red;font-size:30px;');
	  			} else {
		 			$('#budgetRemaining').attr('style', 'color:black;font-size:30px;');
	  			}

				$('#idserviceid').val(project.serv_id);
            $('#idbillingDropdown').val(project.billing_cur);
            $('#idunits').val(project.units);
            $('#idcost').val(project.pro_cost);
            $('#idbudgetRemaining').val(project.budget_remaining);
				$('#idprojectid').val(projectId);
			} else {
				console.error('Failed to fetch project data');
			}
		},
		error: function() {
			console.error('Failed to fetch project data');
		}
	});
});