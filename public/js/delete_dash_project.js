$(document).ready(function() {
	$(document).on('click', '#triggerFormSubmit2', function(e) {
	  	e.preventDefault();
 
		var formName = $(this).closest('form').attr('name');

	  	$.ajax({
		 	url: '../php/delete_dash_project.php',
		 	type: 'POST',
		 	data: { 
				pro_id: formName 
			},
		 	success: function(response) {
				console.log(response);
				location.reload();
		 	},
		 	error: function() {
				console.error(response);
		 	}
	  	});
	});
});