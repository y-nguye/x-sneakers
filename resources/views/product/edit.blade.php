<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản lý sản phẩm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>