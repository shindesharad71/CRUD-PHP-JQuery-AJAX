$(document).ready(function() {

    $.get("view.php", function(data) {
        $("#table_content").html(data);
    });

    $('#link-add').hide();

    $('#show-add').click(function() {
        $('#link-add').slideDown(500);
        $('#show-add').hide();
    });

    $('#add').click(function() {
        var name = $('#name').val();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: "add.php",
            type: "POST",
            data: { name: name, username: username, password: password },
            success: function(data, status, xhr) {
                $('#name').val('');
                $('#username').val('');
                $('#password').val('');
                $.get("view.php", function(html) {
                    $("#table_content").html(html);
                });
                $('#records_content').fadeOut(1100).html(data);
            },
            error: function() {
                $('#records_content').fadeIn(3000).html('<div class="text-center">error here</div>');
            },
            beforeSend: function() {
                $('#records_content').fadeOut(700).html('<div class="text-center">Loading...</div>');
            },
            complete: function() {
                $('#link-add').hide();
                $('#show-add').show(700);
            }
        });
    }); // add close

}); // document ready close
