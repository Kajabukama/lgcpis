$(function() {
    // Get the form.
    var btn = $('.delete-forum');
    var info = $('.info-alert');


    // Set up an event listener for the contact form.
    $(btn).on('click', function() {


        $.ajax({
            type: 'POST',
            url: '../endpoints/delete.forum.php',
            cache: false,
            success: onSuccess,
            error: onError
        })

        function onSuccess(data, status) {
            var response = $.parseJSON(data);
            console.log(response)
        }

        function onError(data, status) {
            console.log(data);
        }


    });

});