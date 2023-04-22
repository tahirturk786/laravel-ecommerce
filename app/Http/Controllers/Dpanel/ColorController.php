<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{
    public function index()
    {
        $data = Color::all();
        return view('dpanel.layouts.color', compact('data'));
    }
    public function create()
    {
        #code
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colors',
            'code' => 'required|unique:colors',

        ]);
        $data = new Color();
        $data->name = $request->name;
        $data->code = $request->code;
        $data->is_active = true;
        $data->save();

        return back()->withSuccess('New Color Added Successfully');
    }
    public function edit($id)
    {
        #code
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:colors,name,' . $id,
            'code' => 'required|unique:Colors,code,' . $id

        ]);
        $data = Color::find($id);
        $data->name = $request->name;
        $data->code = $request->code;
        $data->is_active = $request->is_active;
        $data->save();

        return back()->withSuccess(' Color Updated Added Successfully');
    }
}
