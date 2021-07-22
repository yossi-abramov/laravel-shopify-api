@extends('layouts.main')

@section('main-content')
<div class="container mx-auto px-4">
    {{-- Breadcrumbs --}}
    <div class="flex items-center text-sm  my-4">
        <div class="text-gray-400">Orders</div>
    </div>
    <h1 class="mb-8 text-2xl font-semibold">Orders</h1>
    <div class="flex flex-col my-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        order no.
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        order date
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Customer Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Order Total
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Order Items
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ date('d/m/Y', strtotime($order->ordered_at))}}</td>
                        <td class="px-6 py-4 whitespace-nowrap"> {{ $order->customer_first_name . ' ' . $order->customer_last_name }} </td>
                        <td class="px-6 py-4 whitespace-nowrap"> {{ $order->order_sum . ' ' . $order->order_currency }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a
                            class="bg-blue-400 inline-block py-1.5 px-2 rounded text-white transition hover:opacity-80" 
                            href="{{route('order', ['order_id' => $order->order_id])}}">View Order Items</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection