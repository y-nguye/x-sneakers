<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>

    <h1>{{ $product->name }}</h1>

    <p>{{ $product->describe }}</p>

    <a href="{{ route('products.edit', ['product' => $product->id]) }}">Sửa</a>

    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
        @csrf
        @method('DELETE')
        <button>Xoá</button>
    </form>

</body>

</html>