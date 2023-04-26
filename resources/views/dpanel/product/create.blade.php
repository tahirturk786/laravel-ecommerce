@extends('dpanel.layouts.app')

@section('title', 'Add New Product')

@push('scripts')
    <script>
        const addVariant = (e) => {
            let colorOption = '<option value="">Select Color</option>';
            let sizeOption = '<option value="">Select Size</option>';


            let colors = @json($colors);
            colors.forEach(colors => {
                colorOption += `<option value="${colors.id}">${colors.name}</option>`;
            });

            let sizes = @json($sizes);
            sizes.forEach(sizes => {
                sizeOption += `<option value="${sizes.id}">${sizes.name}</option>`;
            });

            let html = `
                    <div class="flex justify-between gap-3 mb-2 border-b border-gray-400 pb-2">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-3 text-white bg-gray-800  rounded p-2">
                            <div>
                                <label for="">Color</label>
                                <select name="color_id[]" id=""
                                    class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none" required>
                                        ${colorOption}
                                </select>
                            </div>

                            <div>
                                <label for="">Size</label>
                                <select name="size_id[]" id=""
                                    class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none" required>
                                        ${sizeOption}
                                </select>
                            </div>
                            <div>
                                <label for="">MRP</label>
                                <input type="number" name="mrp[]" placeholder="Enter Product MRP"
                                    class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none" required>
                            </div>
                            <div>
                                <label for="">Selling Price</label>
                                <input type="text" name="selling_price[]" placeholder="Enter Product MRP"
                                    class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none" required>
                            </div>
                            <div>
                                <label for="">Enter Available Stock</label>
                                <input type="text" name="stock[]" placeholder="Enter Available Stock"
                                    class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none" required>
                            </div>
                        </div>
                        <div class="flex items-end">
                            <button type="button" onclick="addVariant(this)" class="bg-indigo-500 w-16 py-1 rounded text-white">Add</button>
                        </div>
                    </div>
            `;
            e.parentElement.innerHTML =
                `<button type="button" onclick="removeVariant(this)" class="bg-red-500 w-16 py-1 rounded text-white">Remove</button>`;

            document.getElementById('product_variant').lastElementChild.insertAdjacentHTML('afterend', html);
        }

        const addMoreImage = () => {
            let id = 'img-' + Math.floor(Math.random() * 10000);

            let html = `<div class="relative">
                            <label for="${id}"
                                class="flex items-center justify-center bg-white rounded-md shadow-md p-1 cursor-pointer">
                                <input type="file" id="${id}" name="images[]" onchange="setImagePreview(this, event)" accept="image/*"  class="hidden">
                                <img src="https://placehold.jp/400*600.png?text=Add%20Image" class="rounded-md aspect-[2/3] object-fit" alt="">
                            </label>
                        </div>`;
            document.getElementById('image_container').lastElementChild.insertAdjacentHTML('afterend', html);
        }

        const setImagePreview = (r, e, isAdd = true) => {
            if (e.target.files.length > 0) {
                r.setAttribute('onchange', 'setImagePreview(this, event, false)');
                r.nextElementSibling.src = URL.createObjectURL(e.target.files[0]);

                let span = `

                <span onclick="deleteImage(this)" class="absolute top-1 right-1 cursor-pointer w-7 h-7 flex items-center
                        justify-center bg-white hover:bg-red-500 bg-opacity-25 hover:bg-opacity-100 text-red-500 hover:text-white
                        duration-300 shadow rounded-full ">
                    <i class="bx bx-trash text-xl"></i>
                </span>`;
                r.parentElement.insertAdjacentHTML('afterend', span);
                if (isAdd) addMoreImage();
            }
        }



        const removeVariant = e => e.parentElement.parentElement.remove();
        const deleteImage = e => e.parentElement.remove();
    </script>
@endpush


@section('body_content')



    <div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3">
        <p class="text-white font-medium text-lg py-1">Add New Product</p>
        <a href="{{ route('dpanel.product.create') }}" onclick="showBottomSheet('bottomSheet')"
            class="bg-violet-500 py-1 px-2 rounded-r">Create </a>
    </div>

    @if ($errors->all())

        <div class="bg-red-100 text-red-600 px-2 py-1 rounded border border-red-500 mb-3">
            <ul>
                @foreach ($errors->all() as $error)
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

        <section id="product_variant" class="bg-slate-600 px-3 pb-3 rounded mb-3">
            <h1 class="mb-1 pt-2 text-lg font-medium text-white">Product Variations</h1>

            <div class="flex justify-between gap-3 mb-2 border-b border-gray-400 pb-2">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3 text-white bg-gray-800  rounded p-2">
                    <div>
                        <label for="">Color</label>
                        <select name="color_id[]" id=""
                            class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none "
                            required>
                            <option value="">Select Color</option>
                            @foreach ($colors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="">Size</label>
                        <select name="size_id[]" id=""
                            class="mt-3 w-full  bg-gray-700 border border-gray-600 rounded py-0.5 focus:outline-none "
                            required>
                            <option value="">Select Size</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">MRP</label>
                        <input type="number" name="mrp[]" placeholder="Enter Product MRP"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none "
                            required>
                    </div>
                    <div>
                        <label for="">Selling Price</label>
                        <input type="text" name="selling_price[]" placeholder="Enter Product Selling"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none "
                            required>
                    </div>
                    <div>
                        <label for="">Enter Available Stock</label>
                        <input type="text" name="stock[]" placeholder="Enter Available Stock"
                            class="mt-3 w-full text-white bg-gray-700 border border-gray-600 rounded py-0.5 px-2 focus:outline-none "
                            required>
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="button" onclick="addVariant(this)"
                        class="bg-indigo-500 w-16 py-1 rounded text-white">Add</button>
                </div>
            </div>
        </section>

        <section class="bg-slate-600 px-3 pb-3 rounded mb-3">
            <h1 class="mb-1 pt-2 text-lg font-medium text-white">Product Image(800*1200 or 2:3)</h1>

            <div id="image_container" class="grid grid-cols-1 md:grid-cols-8 gap-3">

                <div class="relative">
                    <label for="img-1"
                        class="flex items-center justify-center bg-white rounded-md shadow-md p-1 cursor-pointer">
                        <input type="file" id="img-1" name="images[]" onchange="setImagePreview(this, event)"
                            accept="image/*" class="hidden" required>
                        <img src="https://placehold.jp/400*600.png?text=Add%20Image"
                            class="rounded-md aspect-[2/3] object-fit" alt="">
                    </label>
                </div>

            </div>

        </section>

        <button class="bg-indigo-500 text-center text-white font-medium w-full py-1 rounded shadow-md uppercase">Add
            Product</button>
    </form>


@endsection
