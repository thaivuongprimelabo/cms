$(document).ready(function() {
	$('#submit').on("click", function (e) {
    	e.preventDefault();
    	$('#frmForm').submit();
    });
	$('#frmForm').validate({
		rules: {
			email: {
				required:true,
				maxlength: 255,
				email:true
			},
			password: {
				required:true,
				rangelength: [6,40]
			}
		},
		messages: {
			email: {
				required: "Please input Email",
				maxlength: "Maximum is 255 character",
				email:"Email is invalid"
            },
            password: {
            	required: "Please input Password",
            	rangelength: "Input value must be between 6 and 40 char",
            }
    	}
	});
});
