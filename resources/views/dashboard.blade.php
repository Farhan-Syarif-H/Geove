<x-app-layout>
    <div class="py-12 mt-36">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8 px-5 rounded-md">
            <div class=" shadow-md sm:rounded-lg">
                <div class="p-6 " style="color:#D0C05B">

                    <span class="text-5xl">
               {{ __("Hello.") }}<br>
                   </span>
                </div>

            </div>
        </div>

        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8 px-5 rounded-md">
            <div class=" shadow-md sm:rounded-lg">
                <div class="p-6 " style="color:#D0C05B">

                    <span class="text-2xl">
                        {{ Auth::user()->name }}<br>
                    </span>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
