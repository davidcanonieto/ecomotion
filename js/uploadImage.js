$(document).ready(function () {
    $('#upload').click(function () {

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        // AJAX request
        $.ajax({
            url: '../ddatabase/uploadImage.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    // Show image preview
                    $('#preview').append("<img src='" + response + "' width='100' height='100' style='display: inline-block;'>");
                } else {
                    alert('file not uploaded');
                }
            }
        });
    });
});