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

    <form action="{{ route('dpanel.product.store') }}" method="post" enctype="multipart/form-data"
        class="grid grid-cols-1 md:grid-cols-3 gap-y-2 gap-x-4 text-white bg-gray-800 rounded p-2">
        @csrf
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
        <button>Submit</button>
    </form>


@endsection
