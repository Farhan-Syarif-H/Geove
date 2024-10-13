<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="flex mt-6">
            <h2 class="font-semibold text-xl text-white">Add Products</h2>
        </div>
                                    {{-- membuat image default nya adalah foto noimage.jpg ketika belum di input apa pun --}}
        <div class="mt-4" x-data="{ imageUrl : '/storage/noimage.png' }">
            {{-- Jika input berbasis file maka harus menggunakan enctype="multipart/form-data" --}}
            <form enctype="multipart/form-data" action="{{route('products.store')}}" method="POST" class="gap-8">
                @csrf
                {{--  --}}

                <div class="mt-4 ">
                    <x-input-label  class="text-white" for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label class="text-white" for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label class="text-white" for="description" :value="__('Description')" />
                    <textarea id="description" class="block mt-1 w-full" name="description">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <x-primary-button class="justify-center w-full mt-4 text-white" style="background-color:#d0c05B">
                    {{ __('Submit') }}
                </x-primary-button>
               </div>
            </form>
        </div>
    </div>
</x-app-layout>
