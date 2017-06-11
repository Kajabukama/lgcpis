$(function() {
    // Get the form.
    var form = $('#recovery_password');
    var info = $('.info-alert');


    // Set up an event listener for the contact form.
    $(form).submit(function(event) {

        // Serialize the form data.
        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: './endpoints/recovery.post.php',
            cache: false,
            data: formData,
            success: onSuccess,
            error: onError
        })

        function onSuccess(data, status) {

            if (status === 'success') {
                response = $.parseJSON(data);
                $('.ui.modal.alert-info').modal('show');
                info.text(response[0].message);

            }
        }

        function onError(data, status) {
            console.log('data');
        }

        return false;
    });

});