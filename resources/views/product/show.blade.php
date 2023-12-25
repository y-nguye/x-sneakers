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
                    <h1>{{ $product->name }}</h1>

                    <p>{{ $product->describe }}</p>

                    @foreach($img_filenames as $img)
                    <img src="{{ asset('storage/uploads/' . $img->file_name) }}" alt="img">
                    @endforeach

                    <a href="{{ route('products.edit', ['product' => $product->id]) }}">Sửa</a>

                    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button>Xoá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>