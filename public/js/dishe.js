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