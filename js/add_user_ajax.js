$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'add_user.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                if(response['result'] === 'user_created') {
                    location.href = 'main_page.php';
                } else {
                    alert(response['result']);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("error: " + errorThrown);
            }
        });
    });
});