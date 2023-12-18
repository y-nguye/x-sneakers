<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá sản phẩm</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Hello</h1>
    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</body>

</html>