$( document ).ready(function(){
    $('.message').keydown(function(e){
        if(e.keyCode === 13){
            e.preventDefault();
            if($(this).val().length > 0){
                $post_id = $(this).prev().prev().val();
                $user_id = $(this).prev().val();
                $message = $(this).val();
                $comment = $(this).parents(".row").prev();
                var dataJSON = {};
                dataJSON['user_id'] = $user_id;
                dataJSON['post_id'] = $post_id;
                dataJSON['message'] = $message;
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: 'http://localhost/MusicProject/public/api/newComment',
                    contentType: "application/json;charset=utf-8",
                    data: JSON.stringify(dataJSON),
                    success: function (data) {
                        $('.message').val('');
                        $comment.append(
                            "<div class='row'>" +
                                "<div class='col-1 ml-3'>" +
                                    "<img class='rounded' src='"+ data.image +"' alt=''" +
                                    " style='width: 2rem;height: 2rem;'>" +
                                "</div>"+
                                "<div class='col-2'>"+
                                    "<p>"+ data.name +"</p>" +
                                "</div>" +
                                "<div class='col'>" +
                                    "<p>"+ $message +"</p>" +
                                "</div>" +
                            "</div>"
                        );
                    },

                });
            }
        }
    })
});


