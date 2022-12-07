$(document).ready(function() {
	function check_session()
	{
		$.ajax({
			url: '.user/assets/checkinactive.ajax.php',
			method:"POST",
			success: function(data) {
                if (data == 'logout_redirect') {
                    window.location.href = "../?login";
                }
			}
		})
	}
	setInterval(function() {
		check_session()
	}, 5000);
});