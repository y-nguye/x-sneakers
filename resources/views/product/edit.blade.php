<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <a href="{{ route('products.index') }}">Trở lại danh sách</a>

    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <input type="text" name="name" class="rounded" placeholder="Tên" value="{{ $product->name }}">
        <br>
        <input type="text" name="describe" placeholder="Mô tả" value="{{ $product->describe }}">
        <br>
        <input type="text" name="quantity" placeholder="Số lượng" value="{{ $product->quantity }}">
        <br>
        <input type="file" name="images[]" placeholder="Choose image" id="image_input" multiple>
        <br>

        <div id="preview-image-container" class="form-group mt-3">
            @foreach ($img_filenames as $img)
            @if ($img->file_name != NULL)
            <div class="preview-image-container-item">
                <img src="{{ asset('storage/uploads/' . $img->file_name) }}" class="preview-img" alt="img">
            </div>
            @endif
            @endforeach
        </div>

        <button type="submit" class="bg-indigo-800">Cập nhật</button>

    </form>

    <script>
        const fileInput = document.getElementById('image_input');
        const imagePreviewContainer = document.getElementById('preview-image-container');

        fileInput.addEventListener('change', function() {
            // Xóa tất cả hình ảnh hiện có trong container
            imagePreviewContainer.innerHTML = '';

            // Lặp qua từng tệp đã chọn và hiển thị chúng
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageContainerItem = document.createElement('span');
                    const imageTitle = document.createElement('div');
                    const image = document.createElement('img');

                    image.src = e.target.result;

                    imageContainerItem.classList.add('preview-image-container-item');
                    image.classList.add('preview-img');

                    imageContainerItem.appendChild(image);
                    imageContainerItem.appendChild(imageTitle);
                    imagePreviewContainer.appendChild(imageContainerItem);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>