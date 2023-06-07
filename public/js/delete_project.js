$(document).ready(function() {
	$(document).on('click', '#triggerFormSubmit', function(e) {
		e.preventDefault(); // Prevent form submission

		var formName = $(this).closest('form').attr('name');

		$.ajax({
			url: "../php/delete_project.php",
			type: 'POST',
			data: {
				formName: formName
			},
			success: function(response) {
				console.log(response);
				location.reload();
			},
			error: function() {
				console.log(response);
			}
		});
	});
});