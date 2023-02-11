$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '../check_user.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                if(response['result'] === 'cool') {
                    location.href = '../index.php';
                } else if(response['result'] === 'password_incorrect'){
                    alert('Incorrect password');
                } else {
                    alert('No user with such username');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("error: " + errorThrown);
            }
        });
    });
});