$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'add_blog_post_to_db.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                alert(response['res']);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("error: " + errorThrown);
            }
        });
    });
});