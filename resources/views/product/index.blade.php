<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các sản phẩm</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <a href="{{ route('products.create') }}">Thêm sản phẩm</a>
    <br>

    @foreach ($products as $product)
    <a href="{{ route('products.show', ['product' => $product->id]) }}">Sản phẩm: {{ $product->name }}</a>
    <br>
    @endforeach

</body>

</html>