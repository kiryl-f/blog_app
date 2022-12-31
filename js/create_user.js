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
                    //location.href = 'main_page.php';
                    alert('cool!');
                } else {
                    alert("result" + response['result']);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("errorr: " + errorThrown);
            }
        });
    });
});