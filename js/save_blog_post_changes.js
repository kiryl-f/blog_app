$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        console.log('update form successfully sent');
        $.ajax({
            type: 'POST',
            url: '../update_blog_post.php',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (response) {
                if(response['res'] === 'saved') {
                    alert('Changes saved!');
                    location.href = '../my_blogs.php';
                } else if(response['res'] === 'error') {
                    alert('An error occurred while saving changes :(');
                } else {
                    alert(response['res']);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("error: " + errorThrown);
            }
        });
    });
});