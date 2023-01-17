/*$(function () {
   $("button").click(function () {
       alert("clicked");

   })
});*/

function deleteBlogPost(id) {
    console.log(id);
    var id_json = {'id': id};
    if(confirm("Are you sure you want to delete this blog post?")) {
        $.ajax({
            type: 'post',
            url: 'delete_blog_post.php',
            dataType: 'text',
            data: JSON.stringify(id_json),
            success: function (response) {
                /*if(response['res'] === 'cool') {
                    alert('success!');
                } else {
                    alert('not success');
                }*/
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                alert("error: " + errorThrown);
            }
        });
        //alert('cool!');
    }
    //alert("clicked");
}
