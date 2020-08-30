function toggleTrack(id, userId) {
    //fan text
    var dataJSON = {};
    dataJSON["id"] = id;
    dataJSON["user_id"] = userId;
    if ($('#trackButton').hasClass('btn-danger')) {
        $('#trackButton').removeClass('btn-danger');
        $('#trackButton').addClass('btn-outline-danger');
        $('#trackButton').html('已追蹤');
        console.log(APP_URL);
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: APP_URL + '/api/fan',
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify(dataJSON),
            success: function (data) {
                $fansQuantity = parseInt($('#fansQuantity').text(), 10);

                $('#fansQuantity').html($fansQuantity + 1);

            },
            error: function (data) {
                console.log(data);
            }
        });
    } else {
        $('#trackButton').removeClass('btn-outline-danger');
        $('#trackButton').addClass('btn-danger');
        $('#trackButton').html('追蹤 + ');
        $.ajax({
            type: "DELETE",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: APP_URL + '/api/fan',
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify(dataJSON),
            success: function (data) {
                $fansQuantity = parseInt($('#fansQuantity').text(), 10);
                $('#fansQuantity').html($fansQuantity - 1);

                console.log(data);
            },

        });
    }

};
