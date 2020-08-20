$(document).ready(function () {
    $("#personImageInput").change(function() {
        readURL(this,$("#personImage"));
    });
    $("#coverImageInput").change(function() {
        readURL(this,$("#coverImage"));
    });
});
function readURL(input,img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            img.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
