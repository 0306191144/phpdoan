function previewImage(input, preview) {

    const chooseFile = document.getElementById(input);
    const imgPreview = document.getElementById(preview);

    chooseFile.addEventListener("change", function () {
        getImgData();
    });


    function getImgData() {
        const files = chooseFile.files;
        var html = "";
        if (files.length > 0) {
            for (var i = 0; i < files.length; i++) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files[i]);
                fileReader.addEventListener("load", function () {
                    var child = document.createElement("img");
                    child.style.objectFit = "cover";
                    child.style.marginTop = "1rem";
                    child.style.marginRight = "0.5rem";
                    child.height = 150;
                    child.width = 100;
                    child.src = this.result;
                    imgPreview.appendChild(child);
                });
            }
        }

    }

}