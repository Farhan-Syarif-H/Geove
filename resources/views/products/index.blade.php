<x-app-layout>
    <div class="flex justify-center mt-8">
        <h1 class="text-3xl" style="color:#D0c05B;">Geove</h1>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">


        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}" />
        @endif
        <div class="flex justify-between items-center mt-6">
            <h2 class="font-semibold text-xl text-white">List Products</h2>

            <a href="{{ route('products.create') }}">
                <button class=" flex items-center gap-2 bg-gray-100 px-10 py-2  rounded-md font-semibold ">Add</button>
            </a>
        </div>

        <div class="grid md:grid-cols-5 grid-cols-2 mt-3 gap-6">
            @foreach ($products as $product)
                <div>
                    <img src="{{ url('storage/' . $product->foto) }}" alt="{{ $product->name }}" class="rounded-md">
                    <div class="my-2 ">
                        <p class="text-xl font-light text-white ">{{ $product->name }}</p>
                        <p class="font-semibold text-gray-200">Rp. {{ number_format($product->price) }}</p>
                    </div>

                    <a href="{{ route('products.edit', $product) }}">

                        <button class="bg-gray-100 px-10 py-2 w-full rounded-md font-semibold">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $products->links() }}
            </div>

    </div>
    <x-footer/>

</x-app-layout>
