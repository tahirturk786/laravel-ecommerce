<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with('brand', 'category')->paginate(20);
        return view('dpanel.product.index', compact('data'));
    }

    public function create()
    {
        $brands = Brand::where('is_active', true)->get();
        $categories = Category::where('is_active', true)->get();
        $colors = Color::where('is_active', true)->get();
        $sizes = Size::where('is_active', true)->get();


        return view('dpanel.product.create', compact('brands', 'categories','colors','sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'title' => 'required|max:255|unique:products',
            'description' => 'required',
        ]);

        $product = new Product;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->is_active = true;
        $product->save();

        return redirect()->route('dpanel.product.index')->withSuccess('Product Added Successfully');
    }
}
