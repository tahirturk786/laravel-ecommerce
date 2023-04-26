@extends('dpanel.layouts.app')

@section('title', 'Add New Product')

@section('body_content')

    <div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3">
        <p class="text-white font-medium text-lg py-1">Add New Product</p>
        <a href="{{ route('dpanel.product.create') }}" onclick="showBottomSheet('bottomSheet')"
            class="bg-violet-500 py-1 px-2 rounded-r">Create </a>
    </div>

    @if ($errors->any())

        <div class="bg-red-100 text-red-100 px-2 py-1 rounded border border-red-500 mb-3">
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('dpanel.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="bg-slate-600 px-3 pb-3 rounded mb-3">
            <h1 class="mb-1 pt-2 text-lg font-medium text-white">Product Details</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-2 gap-x-4 text-white bg-gray-800 rounded p-2">
                <div>
                    <label for="">Product Category</label>
                    <select name="category_id" id=""
                        class="mt-2 w-full text-white bg-gray-700 border border-gray-700 rounded py-0.5 focus:outline-none ">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Product Brand</label>
                    <select name="brand_id" id=""
                        class="mt-2 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none ">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Product Name</label>
                    <input type="text" name="title" placeholder="Enter Product Name"
                        class="mt-2 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none ">
                </div>
                <div class="md:col-span-3">
                    <label for="">Product Description</label>
                    <textarea name="description" rows="3" placeholder="Enter Product Description"
                        class="mt-2 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none "></textarea>
                </div>
            </div>

        </section>

        <section id="product_varient" class="bg-slate-600 px-3 pb-3 rounded mb-3">
            <h1 class="mb-1 pt-2 text-lg font-medium text-white">Product Variations</h1>

            <div class="flex justify-between gap-3 mb-2 border-b border-gray-400 pb-2">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3 text-white bg-gray-800  rounded p-2">
                    <div>
                        <label for="">Color</label>
                        <select name="color_id" id=""
                            class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none ">
                            <option value="">Select Color</option>
                            @foreach ($colors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="">Size</label>
                        <select name="size_id" id=""
                            class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none ">
                            <option value="">Select Size</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">MRP</label>
                        <input type="number" name="mrp" placeholder="Enter Product MRP"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none ">
                    </div>
                    <div>
                        <label for="">Selling Price</label>
                        <input type="text" name="Selling_price" placeholder="Enter Product MRP"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none ">
                    </div>
                    <div>
                        <label for="">Enter Available Stock</label>
                        <input type="text" name="stock" placeholder="Enter Available Stock"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none ">
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="button" class="bg-indigo-500 w-16 py-1 rounded text-white">Add</button>
                </div>
            </div>
        </section>
    </form>


@endsection
