$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'add_user_to_db.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                if(response['result'] === 'user_created') {
                    location.href = 'index.php';
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