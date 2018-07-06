$(document).ready(function() {
	$('#submit').on("click", function (e) {
    	e.preventDefault();
    	$('#frmForm').submit();
    });
	$('#frmForm').validate({
		rules: {
			name: {
				required:true,
				maxlength: 255
			},
			email: {
				required:true,
				email: true
			},
			password: {
				required:true,
				rangelength:[6,40]
			},
			password_confirmation: {
				required:true,
				rangelength:[6,40]
			}
		},
		messages: {
			name: {
				required:'Please input name',
				maxlength: 'Maximum is 255 char'
			},
			email: {
				required:'Please input email',
				email: 'Email is invalid'
			},
			password: {
				required:'Please input password',
				rangelength:'Length must be between 6 and 40 char',
			},
			password_confirmation: {
				required:'Please input pw confirmation',
				rangelength:'Length must be between 6 and 40 char',
			}
    	}
	});
});
