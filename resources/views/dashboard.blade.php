<x-app-layout>
    <div class="py-12 mt-36">
        <!-- Greeting Section -->
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 px-5 rounded-lg bg-white shadow-xl transition-transform transform hover:scale-105 duration-300">
            <div class="p-6">
                <div class="typing-container">
                    <span class="text-6xl font-extrabold text-gray-800 mb-4 typing-effect">
                        {{ __("Hello.") }}<br>
                    </span>
                </div>
            </div>
        </div>

        <!-- User Name Section -->
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 px-5 mt-6 rounded-lg bg-gray-200 shadow-xl transition-transform transform hover:scale-105 duration-300">
            <div class="p-6">
                <span class="text-3xl font-semibold text-gray-900 tracking-wide">
                    {{ Auth::user()->name }} <span id="dynamic-emoji"></span><br>
                </span>
            </div>
        </div>
    </div>

    <style>
        .typing-container {
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid currentColor;
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

    <script>
        // Array of emojis
        const emojis = ['🙂', '😃',];

        // Function to get a random emoji
        function getRandomEmoji() {
            const randomIndex = Math.floor(Math.random() * emojis.length);
            return emojis[randomIndex];
        }

        // Function to set the emoji in the span
        function setEmoji() {
            document.getElementById('dynamic-emoji').textContent = getRandomEmoji();
        }

        // Initial emoji set and continuous update
        document.addEventListener('DOMContentLoaded', function () {
            setEmoji(); // Set initial emoji
            setInterval(setEmoji, 500); // Change emoji every 1 second
        });
    </script>
</x-app-layout>
