<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-400">
    <div class="min-h-screen">
        @include('layouts.navigation')


        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 mt-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Orders</h3>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">ID</th>
                                        <th class="py-3 px-6 text-left">Username</th>
                                        <th class="py-3 px-6 text-left">Status</th>
                                        <th class="py-3 px-6 text-left">Total Price</th>
                                        <th class="py-3 px-6 text-left">Order Items</th>
                                        <th class="py-3 px-6 text-left">Created At</th>
                                        <th class="py-3 px-6 text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">
                                    @foreach ($orders as $order)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6">{{ $order->id }}</td>
                                        <td class="py-3 px-6">{{ $order->user->name}}</td>
                                        <td class="py-3 px-6">
                                            <button
                                                class="text-white hover:underline py-1 px-3 rounded-md
                                                {{ $order->status == 'cancel' ? 'bg-red-500' : ($order->status == 'pending' ? 'bg-orange-500' : 'bg-green-500') }}"
                                                onclick="openModal({{ $order->id }}, '{{ $order->status }}')">
                                                {{ ucfirst($order->status) }}
                                            </button>
                                        </td>

                                        <td class="py-3 px-6">{{ number_format($order->total_price, 2) }}</td>
                                        <td class="py-3 px-6">
                                            @foreach ($order->orderItems as $item)
                                                <p>{{ $item->product->name }} (x{{ $item->quantity }}) - {{ number_format($item->price, 2) }}</p>
                                            @endforeach
                                        </td>
                                        <td class="py-3 px-6">{{ $order->created_at->format('d M Y H:i') }}</td>
                                        <td class="py-3 px-6">
                                            <div class="flex justify-end m-4 p-4">
                                                <a href="{{ route('orders.receipt', ['id' => $order->id]) }}"
                                                   class="inline-block px-6 py-2.5" style="border-radius: 20px; padding: 8px 16px; background-color: #0A174E; color: #fff; text-decoration: none;">
                                                    Download PDF
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{ $orders->links() }}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-center bg-white rounded-md mb-24 py-2 " style="width: 150px;">
                    <h3 class="text-lg sm:text-lg ">Total Orders</h3>
                    <p class="text-gray-500 text-sm">{{ DB::table('orders')->count()}}</p>
                </div>
            </div>
        </main>

      <!-- Modal Edit Status -->
<div id="editStatusModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div class="relative w-full max-w-md">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-4  border-b border-gray-300 rounded-t-lg">
                <h3 class="text-xl font-semibold text-black">
                    Edit Order Status
                </h3>
                <button type="button" class="text-white hover:text-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeModal()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="updateStatusForm" action="{{ route('orders.updateStatus') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <input type="hidden" id="orderId" name="order_id">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="success">Success</option>
                        <option value="pending">Pending</option>
                        <option value="cancel">Cancel</option>
                    </select>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-4 border-t border-gray-300 rounded-b-lg">
                    <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 ease-in-out transform hover:scale-105">
                        Save
                    </button>
                    <button type="submit" onclick="closeModal()" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 ease-in-out transform hover:scale-105">
                        Cancel
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>


        <script>
    function openModal(orderId, currentStatus) {
        // Set the form values
        document.getElementById('orderId').value = orderId;
        document.getElementById('status').value = currentStatus;

        // Open the modal
        document.getElementById('editStatusModal').classList.remove('hidden');
    }

    function closeModal() {
        // Close the modal
        document.getElementById('editStatusModal').classList.add('hidden');
    }
</script>




    </div>
</body>

</html>
