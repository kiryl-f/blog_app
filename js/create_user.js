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
                    console.log(1);
                } else {
                    alert(response['result']);
                    console.log(2);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(3);
                alert("errorrr: " + errorThrown);
            }
        });
    });
});