$(function() {
    // Get the form.
    var form = $('#message');
    var info = $('.info-alert');


    // Set up an event listener for the contact form.
    $(form).submit(function(event) {

        // Serialize the form data.
        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: '../endpoints/message.post.php',
            cache: false,
            data: formData,
            success: onSuccess,
            error: onError
        })

        function onSuccess(data, status) {

            var response = $.parseJSON(data);

            if (response[0].type == 'success') {

                $('.ui.modal.sms').modal('hide');
                $('.ui.modal.alert-info').modal('show');
                info.text(response[0].message);

            } else if (response[0].type == 'error') {

                $('.ui.modal.sms').modal('show');
                $('.ui.modal.alert-info').modal('show');
                info.text(response[0].message);

            } else {

                $('.ui.modal.sms').modal('show');
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