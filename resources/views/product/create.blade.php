<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <a href="{{ route('products.index') }}">Trở lại danh sách</a>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <input type="text" name="name" class="rounded" placeholder="Tên">
        <br>
        <input type="text" name="describe" placeholder="Mô tả">
        <br>
        <input type="text" name="quantity" placeholder="Số lượng">
        <br>
        <button type="submit" class="bg-indigo-800">Thêm</button>

    </form>

</body>

</html>