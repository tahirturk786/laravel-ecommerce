<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::all();
        return view('dpanel.layouts.brand', compact('data'));
    }
    public function create()
    {
        #code
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',

        ]);
        $data = new Brand();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->is_active = true;
        $data->save();

        return back()->withSuccess('Brand Added Successfully');
    }
    public function edit($id)
    {
        #code
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $id,

        ]);
        $data = Brand::find($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->is_active = $request->is_active;
        $data->save();

        return back()->withSuccess(' Brand Updated Added Successfully');
    }
}
