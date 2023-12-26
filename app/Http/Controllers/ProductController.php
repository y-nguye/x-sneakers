<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ImgProduct;
use App\Models\Type;

class ProductController extends Controller
{
    private $dir_uploads = 'uploads/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('product.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->describe = $request->describe;
        $product->quantity = $request->quantity;
        $product->type_id = $request->type_id;
        $product->slug = Str::slug($product->name);

        $product->save();

        $product_id = $product->id;

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $img_filename = new ImgProduct;

                $img_filename->product_id = $product_id;
                $img_filename->file_name = $file->hashName();
                Storage::disk('public')->put($this->dir_uploads . $img_filename->file_name, file_get_contents($file));

                $img_filename->save();
            }
        }

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->first();
        $img_filenames = ImgProduct::where('product_id', $id)->get();
        return view('product.show', ['product' => $product, 'img_filenames' => $img_filenames]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();
        $types = Type::all();
        $img_filenames = ImgProduct::where('product_id', $id)->get();

        return view('product.edit', ['product' => $product, 'types' => $types, 'img_filenames' => $img_filenames]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id', $id)->first();

        $product->name = $request->name;
        $product->describe = $request->describe;
        $product->quantity = $request->quantity;
        $product->type_id = $request->type_id;
        $product->slug = Str::slug($product->name);

        $product->save();

        // Nếu có chọn ảnh mới trong input
        if ($request->hasfile('images')) {
            $img_filenames = ImgProduct::where('product_id', $id)->get();

            // Xoá các ảnh cũ
            foreach ($img_filenames as $file) {
                Storage::disk('public')->delete($this->dir_uploads . $file->file_name);
                $file->delete();
            }

            // Cập nhật ảnh mới
            foreach ($request->file('images') as $file) {
                $img_filename = new ImgProduct;

                $img_filename->product_id = $id;
                $img_filename->file_name = $file->hashName();

                Storage::disk('public')->put($this->dir_uploads . $img_filename->file_name, file_get_contents($file));

                $img_filename->save();
            }
        }

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $img_filenames = ImgProduct::where('product_id', $id)->get();
            foreach ($img_filenames as $file) {
                Storage::disk('public')->delete($this->dir_uploads . $file->file_name);
            }
            $product->delete();
        }

        return redirect(route('products.index'));
    }
}
