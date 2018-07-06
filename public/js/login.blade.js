$(document).ready(function() {
	$('#submit').on("click", function (e) {
    	e.preventDefault();
    	$('#frmForm').submit();
    });
	$('#frmForm').validate({
		rules: {
			username: {
				required:true,
				maxlength: 255
			},
			password: {
				required:true,
				rangelength: [6,40]
			}
		},
		messages: {
			username: {
				required: "Please input Username",
				maxlength: "Maximum is 255 character"
            },
            password: {
            	required: "Please input Password",
            	rangelength: "Input value must be between 6 and 40 char"
            }
    	}
	});
});
