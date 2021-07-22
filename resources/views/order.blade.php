@extends('layouts.main')

@section('main-content')
<div class="container mx-auto px-4">
    {{-- Breadcrumbs --}}
    <div class="flex items-center text-sm space-x-1 my-4">
        <div>
            <a class="hover:underline" href="{{ route('orders') }}"> Orders </a>
        </div>
        <span class="text-xs text-gray-400">></span>
        <div class="text-gray-400">
            Order No. {{ $order[0]->order_id }}
        </div>
    </div>
    <h1 class="my-8 text-2xl font-semibold">Order No. {{ $order[0]->order_id }}</h1>
    <div class="flex flex-col my-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($order as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-center px-6 py-3 bg-gray-100 font-semibold">
                            Total: {{$order_total}}
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection