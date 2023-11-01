
function previewImage() {
    let fileInput = document.getElementById('uploadImage');
    let preview = document.getElementById('preview');
    if (fileInput.files && fileInput.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        preview.src = "";
    }
}
let id = $('#btnEdit').data('edit')
alert(id)
    $('#updateImage').on('change', function () {
        let input = this;
        let dataId = $("#id").data("id");
        console.log(dataId);
        if (dataId) {
            let image = $('#changeImage');

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    image.attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                image.attr('src', '');
            }
        }
       
    });

    $('.close').on('click', function() {
        $('#preview').attr('src', '');

        $('#changeImage').attr('src', '');

        $('#createDish input').attr('val', '');

        $('#updateImage').attr('src', '');
    })
    
