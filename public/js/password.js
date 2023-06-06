$(document).ready(function() {
	$(".clear").val("");

	$(".password-input").click(function() {
		var $this=$(".password");
		if ($($this).attr("type") === "password") {
		 	$($this).attr("type", "text");
	  	} else {
		 	$($this).attr("type", "password");
	  	}

		var $this=$(".confirm-password");

		if ($this != null) {
			if ($($this).attr("type") === "password") {
				$($this).attr("type", "text");
			} else {
				$($this).attr("type", "password");
			}
		}
	});
 });