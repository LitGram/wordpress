jQuery(document).ready(function($) {
    // Existing code...

    // Login functionality
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: litgramStudy.ajax_url,
            type: 'POST',
            data: {
                action: 'login_user',
                nonce: litgramStudy.nonce,
                username: $('#loginForm input[name="username"]').val(),
                password: $('#loginForm input[name="password"]').val()
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data);
                    location.reload();
                } else {
                    alert('Error: ' + response.data);
                }
            }
        });
    });

    // Signup functionality
    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        var password = $('#password').val();
        var confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            $('#signup-message').html('<p class="error">Passwords do not match.</p>');
            return;
        }

        $.ajax({
            url: litgramStudy.ajax_url,
            type: 'POST',
            data: {
                action: 'register_user',
                nonce: litgramStudy.nonce,
                username: $('#username').val(),
                email: $('#email').val(),
                password: password
            },
            success: function(response) {
                if (response.success) {
                    $('#signup-message').html('<p class="success">' + response.data + '</p>');
                    $('#signupForm')[0].reset();
                } else {
                    $('#signup-message').html('<p class="error">Error: ' + response.data + '</p>');
                }
            }
        });
    });

    // Logout functionality
    $('#logoutBtn').on('click', function() {
        $.ajax({
            url: litgramStudy.ajax_url,
            type: 'POST',
            data: {
                action: 'logout_user',
                nonce: litgramStudy.nonce
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data);
                    location.reload();
                }
            }
        });
    });

    // Show signup modal
    $('#signupBtn').on('click', function() {
        $('#signupModal').show();
    });

    // Close modals when clicking on close button or outside the modal
    $('.close, .modal').on('click', function(event) {
        if (event.target == this) {
            $('.modal').hide();
        }
    });

    // Prevent modal from closing when clicking inside the modal content
    $('.modal-content').on('click', function(event) {
        event.stopPropagation();
    });
});