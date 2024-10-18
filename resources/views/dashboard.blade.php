<x-app-layout>
    <div class="py-12 mt-36">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8 px-5 rounded-md ">
            <div class=" shadow-md sm:rounded-lg">
                <div class="p-6  " >

                    <div class="typing-container">
                        <span class="text-5xl mb-2" class="typing-effect">
                   {{ __("Hello.") }}<br>
                       </span>
                    </div>
                </div>

            </div>
        </div>

        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8 px-5 rounded-md">
            <div class=" shadow-md sm:rounded-lg">
                <div class="p-6 " >

                    <span class="text-2xl">
                        {{ Auth::user()->name }} 🙂<br>
                    </span>

                </div>

            </div>
        </div>
    </div>


    <style>
.typing-container {
    white-space: nowrap;
    overflow: hidden;
    border-right: 3px solid;
    width: 0;
    animation: typing 1.5s steps(30) 1s forwards, blink-caret 0.75s step-end infinite;
}

        @keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}

@keyframes blink-caret {
    from { border-color: transparent; }
    to { border-color: black; }
}
    </style>
</x-app-layout>
