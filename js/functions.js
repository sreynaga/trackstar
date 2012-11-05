$(document).ready(function () {
	$('#username').live('blur', function () {
		var username = $(this).val();
		if (username !== '') {
			$.ajax({
				url : 'username_check_ajax',
				type : 'POST',
				data : {
					username : username
				},
				success : function (msg) {
					if (msg == 'TRUE') {
						$('.username').removeClass('username_taken');
						$('.username').addClass('username_notaken');
					} else if (msg == 'FALSE') {
						$('.username').removeClass('username_notaken');
						$('.username').addClass('username_taken');
					}
				}
			});
		} else {
			$('.username').removeClass('username_notaken');
			$('.username').removeClass('username_taken');
		}
	});

	$('#email').live('blur', function () {
		var email = $(this).val();
		if (email !== '') {
			$.ajax({
				url : 'email_check_ajax',
				type : 'POST',
				data : {
					email : email
				},
				success : function (msg) {
					if (msg == 'TRUE') {
						$('.email').removeClass('email_taken');
						$('.email').addClass('email_notaken');
					} else if (msg == 'FALSE') {
						$('.email').removeClass('email_notaken');
						$('.email').addClass('email_taken');
					}
				}
			});
		} else {
			$('.email').removeClass('email_notaken');
			$('.email').removeClass('email_taken');
		}
	});
});