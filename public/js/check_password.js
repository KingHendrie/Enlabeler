$(document).ready(function() {
	$("#passwordForm").submit(function(event) {
	  	var passwordInput = $("#passwordInput");
	  	var password = passwordInput.val();
	  
		var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;
	  
	  	if (!pattern.test(password)) {
		 	event.preventDefault(); // Prevent form submission
		 	alert("Password should contain at least 8 characters with a max of 16, including at least one letter and one digit.");
	  	}
	});
 });