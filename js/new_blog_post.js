$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'add_blog_post_to_db.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                if(response['result'] === 'blog_added') {
                    location.href = 'index.php';
                } else {
                    alert("Oooops! Something went wrong!");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("error: " + errorThrown);
            }
        });
    });
});