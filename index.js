function browseImage() {
    document.getElementById('imageInput').click();
}

function updateImagePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('image').value = e.target.result;
            document.getElementById('imagePreview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]); // Convert image to Data URL
    }
}
