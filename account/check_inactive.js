$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            type: 'GET',
            async: false,
            url: 'checkinactive.ajax.php',
            success: function(response) {
                if (response == 'logout_redirect') {
                    location.href = "../?login";
                }
            }
        });
    }, 5000);
});