$(document).ready(function() {
	$(document).on('click', '#triggerFormSubmit', function(e) {
		e.preventDefault();
		var formName = $(this).closest('form').attr('name');

		window.location.href = "../html/edit_project.html?projectid=" + formName;
	});
});