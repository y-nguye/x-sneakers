<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Các sản phẩm nổi bật</h1>
                    @foreach($products as $product)
                    <x-nav-link :href="route('type.name', ['type' => $product->type_slug, 'name' => $product->slug])">Sản phẩm: {{ $product->name }}</x-nav-link>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>