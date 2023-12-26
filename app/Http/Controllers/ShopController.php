<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\Type;

class ShopController extends Controller
{
    public function index(string $slug)
    {
        if ($slug !== 'new') {
            $type = Type::where('type', $slug)->first();
            $products = Product::where('type_id', $type->id)->get();
        } else {
            $products = Product::all();
        }
        return view('shop', ['products' => $products]);
    }

    public function show(string $slug)
    {
        $product->slug = Str::slug($product->name);
        return view('sneakers', ['sneakers' => $slug]);
    }
}
