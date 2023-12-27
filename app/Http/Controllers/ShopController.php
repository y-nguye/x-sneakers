<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\Type;

class ShopController extends Controller
{
    public function index(string $type_slug, ?string $name_slug = null)
    {
        if ($type_slug !== 'new') {
            if ($name_slug !== null) {
                $product = Product::where('slug', $name_slug)->firstOrFail();
                return view('sneakers', ['product' => $product]);
            }

            $type = Type::where('type', $type_slug)->firstOrFail();
            $products = Product::where('type_id', $type->id)->get();

            return view('classify-pages', ['products' => $products, 'type' => $type_slug]);
        } else {
            $products = Product::all();
            foreach ($products as $product) {
                $type = Type::where('id', $product->type_id)->firstOrFail();
                $type_slug = Str::slug($type->type);
                $product['type_slug'] = $type_slug;
            }

            return view('new-featured', ['products' => $products]);
        }
    }

    public function show(string $slug)
    {
        return view('sneakers', ['sneakers' => $slug]);
    }
}
