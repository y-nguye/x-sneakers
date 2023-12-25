const fileInput = document.getElementById("image_input");

if (fileInput) {
    const imagePreviewContainer = document.getElementById(
        "preview-image-container"
    );

    fileInput.addEventListener("change", function () {
        // Xóa tất cả hình ảnh hiện có trong container
        imagePreviewContainer.innerHTML = "";

        // Lặp qua từng tệp đã chọn và hiển thị chúng
        for (let i = 0; i < fileInput.files.length; i++) {
            const file = fileInput.files[i];
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageContainerItem = document.createElement("span");
                const imageTitle = document.createElement("div");
                const image = document.createElement("img");

                image.src = e.target.result;

                imageContainerItem.classList.add(
                    "preview-image-container-item"
                );
                image.classList.add("preview-img");

                imageContainerItem.appendChild(image);
                imageContainerItem.appendChild(imageTitle);
                imagePreviewContainer.appendChild(imageContainerItem);
            };
            reader.readAsDataURL(file);
        }
    });
}
