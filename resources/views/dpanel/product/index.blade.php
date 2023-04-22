@extends('dpanel.layouts.app')

@section('title','Add Products')

@section('body_content')

<div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3">
    <p class="text-white font-medium text-lg">Add Product</p>
    <a href="{{route('dpanel.product.create')}}"  onclick="showBottomSheet('bottomSheet')" class="bg-violet-500 py-1 px-2 rounded-r">Create </a>
</div>

<div class="w-full flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-gray600 rounded-md">
                <table class="min-w-full divide-y divide-gray-600">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="pl-3 py-3 text-left w-12 text-xs font-medium text-gray-200 tracking-wider">
                                #
                            </th>
                            <th scope="col"
                                class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                Description
                            </th>
                            <th scope="col"
                                class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                Category
                            </th>
                            <th scope="col"
                                class="pl-3 py-3 text-left w-12 text-xs font-medium text-gray-200 tracking-wider">
                                Brand
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-center text-xs font-medium text-gray-200 tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                        @foreach ($data as $item)
                            <tr>
                                <td class="pl-3 py-1">
                                    <div class="text-sm text-gray-200">
                                        {{ $data->perPage()*($data->currentPage()-1)+ $loop-> iteration }}
                                    </div>
                                <td class="pl-3 py-3">
                                    <div class="text-sm text-gray-200">{{ $item->title}}</div>
                                </td>
                                <td class="pl-3 py-3">
                                    <div class="text-sm text-gray-200">{{ $item->description}}</div>
                                </td>
                                </td>
                                <td class="pl-3 py-3">
                                    <div class="text-sm text-gray-200"> {{ $item->category->name }} </div>
                                </td>
                                <td class="pl-3 py-3">
                                    <div class="text-sm text-gray-200"> {{ $item->brand->name }} </div>
                                </td>

                                <td class="flex px-4 py-3 justify-center text-lg">
                                    <a href="{{route('dpanel.product.edit', $item->id)}}"
                                        class="ml-1 text-blue-500 bg-blue-100 focus:outline-none border-blue-500 rounded-full w-8 h-8 flex justify-center items-center">
                                        <i class="bx bx-edit"></i></a>

                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$data->links()}}
</div>


@endsection
