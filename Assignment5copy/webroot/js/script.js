function imgSelect() {
    document.querySelector("#image").click();
}

function showImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document
                .querySelector("#imgdisplay")
                .setAttribute("src", e.target.result);
        };
        reader.readAsDataURL(e.files[0]);
    }
}
