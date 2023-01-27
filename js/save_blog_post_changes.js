function saveChanges(id) {
    $.ajax({
        type: 'POST',
        url: 'update_blog_post.php',
        dataType: 'json',
        data: ({id: id}),
        success: function (response) {
            if(response['res'] === 'deleted') {
                alert('Blog post successfully deleted!');
                $("#blogpost" + id).remove();
            } else {
                alert('An error occurred while deleting the blog post :(');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            alert("error: " + errorThrown);
        }
    });
}