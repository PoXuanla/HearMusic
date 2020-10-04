$(function(){
    var text = $('#text_leaveMessage');
    var btn = $('#btn_leaveMessage');
    $(document).on('click','#btn_leaveMessage',function(){
        let user_id = $('#user_id').val();
        let music_id = $('#song_id').val();
        let contents = text.val();
        var dataJSON = {};
        dataJSON['user_id'] = user_id;
        dataJSON['music_id'] = music_id;
        dataJSON['contents'] = contents;
        if(text.val().trim().length > 0){
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: 'http://localhost/MusicProject/public/api/song/comment',
                contentType: "application/json;charset=utf-8",
                data: JSON.stringify(dataJSON),
                success: function (data) {
                    text.val('');
                    let comment = $('#leaveMessage')
                    comment.prepend(
                        '<div class="row shadow rounded mt-3 mb-3">' +
                            '<div class="col-12 text-center">' +
                                '<div class="row text-center p-2">' +
                                    "<div class='col-1 ml-3'>" +
                                        "<img class='rounded' src='"+ data.image + '?' +Date.now() + "' alt=''" +
                                        " style='width: 2rem;height: 2rem;'>" +
                                    "</div>"+
                                    "<div class='col-2'>"+
                                        "<p>"+ data.name +"</p>" +
                                    "</div>" + ":"+
                                    "<div class='col text-left'>" +
                                        "<p>"+ contents +"</p>" +
                                    "</div>" +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    );
                }
            });
        }
    })
})
