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
                    <a href="{{ route('products.create') }}">Thêm sản phẩm</a>
                    <br>

                    @foreach ($products as $product)
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">Sản phẩm: {{ $product->name }}</a>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>