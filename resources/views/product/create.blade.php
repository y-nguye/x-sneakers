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

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- <input type="text" name="name" class="rounded" placeholder="Tên"> -->
                        <x-text-input name="name" type="text" class="mt-1 block w-1/2" placeholder="{{ __('Tên') }}" />
                        <br>
                        <x-text-input type="text" name="describe" class="mt-1 block w-3/4" placeholder="{{ __('Mô tả') }}" />
                        <br>
                        <x-text-input type="text" name="quantity" class="mt-1 block w-3/4" placeholder="{{ __('Số lượng') }}" />
                        <br>
                        <x-text-input type="file" name="images[]" class="mt-1 block w-3/4" placeholder="Choose image" id="image_input" multiple />
                        <br>

                        <div id="preview-image-container" class=""></div>

                        <button type="submit" class="bg-indigo-800">Thêm</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>