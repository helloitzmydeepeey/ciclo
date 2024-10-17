require(['jquery'], function ($) {
    $(document).ready(function () {
        var typingTimer;
        var doneTypingInterval = 5000; // 1 second

        $('#email_address').on('input', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(validateEmail, doneTypingInterval);
        });

        function validateEmail() {
            var email = $('#email_address').val();


            // Make an AJAX request to check if the email already exists
            $.ajax({
                url: '/customer/checkemail/validate',
                data: {email_check: email},
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        $('#email_address').after('<div id="email-error" style="color: red;">' + response.message + '</div>');
                    } else {
                        $('#email_address').after('<div id="email-error" style="color: green;">' + 'test' + '</div>');
                    }
                }
            });
        }
    });
});
