$(function () {
    if(confirm("confirm")) {
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'check_user.php',
                dataType: 'json',
                data: $('form').serialize(),
                success: function (response) {
                    if(confirm("conf")) {
                        if(response['result'] === 'cool') {
                            location.href = 'index.php';
                        } else {
                            alert("result: " + response['result']);
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                    alert("error: " + errorThrown);
                }
            });
        });
    }
});