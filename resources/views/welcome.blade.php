<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Geove - Elevate Your Steps</title>
    <meta name="description"
        content="Discover the perfect blend of comfort and style with Geove's innovative footwear collection.">
    <meta name="keywords" content="Geove, shoes, footwear, comfort, style, fashion">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Lato:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <!-- Header -->
    <header id="header" class="sticky top-0 bg-white shadow-md z-40">
        <div class="container mx-auto flex items-center justify-between px-4 py-4">
            <img src="logo.jpg" alt="Geove Logo" class="w-12">
            <nav id="navmenu" class="hidden md:flex space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black">Your Collection</a>
                    @else
                        {{-- <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black">Sign In</a> --}}
                        <button
                            class="px-4 py-2 rounded-md focus:ring-2 focus:ring-gray-400"
                            type="button" data-modal-target="loginModal" data-modal-toggle="loginModal">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Modal -->
    <div id="loginModal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-20 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md w-full relative">
            <!-- Close Button (X) -->
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 hover:text-gray-900"
                data-modal-hide="loginModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button
                        class="ml-3 bg-gray-700 hover:bg-gray-400 focus:ring-2 focus:ring-gray-400 text-white px-4 py-2 rounded-md">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle modal visibility
        document.querySelectorAll('[data-modal-toggle]').forEach((button) => {
            button.addEventListener('click', () => {
                const target = document.getElementById(button.getAttribute('data-modal-target'));
                target.classList.toggle('hidden');
            });
        });

        // Close modal when 'X' button is clicked
        document.querySelectorAll('[data-modal-hide]').forEach((button) => {
            button.addEventListener('click', () => {
                button.closest('.fixed').classList.add('hidden');
            });
        });
    </script>

    <main class="main">

        <!-- About Section -->
        <section id="about" class="py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <div class="w-full lg:w-7/12 mb-8 lg:mb-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide mt-4">
                                    <img src="storage/bg2.jpg" alt="Geove Shoes Collection"
                                        class="w-full h-auto rounded-md">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12" data-aos="fade-up">
                        <span class="text-gray-500 uppercase tracking-wide">Welcome to Geove</span>
                        <h1 class="text-4xl font-bold mb-4">Step into Comfort and Style</h1>
                        <p class="text-gray-700">At Geove, we combine fashion-forward design with unparalleled comfort,
                            ensuring that every step you take is one you’ll love.</p>
                        <p class="mt-5">
                            <a href="#"
                                class="inline-block bg-gray-400 text-white px-6 py-2 rounded transition">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About 2 Section -->
        <section id="about-2" class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center gap-20">
                    <div class="w-full lg:w-5/12 mb-8 lg:mb-0 text-center lg:text-left" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="storage/bg2.jpg" alt="Craftsmanship at Geove" class="w-full h-auto rounded-full">
                    </div>
                    <div class="w-full lg:w-5/12" data-aos="fade-up">
                        <span class="text-gray-500 uppercase tracking-wide">Our Mission</span>
                        <h2 class="text-3xl font-bold mt-4">Crafting Shoes that Empower Every Step</h2>
                        <p class="mt-4 text-gray-700">At Geove, we are dedicated to creating shoes that not only look
                            good but feel even better. Our mission is to provide footwear that lets you conquer your day
                            with confidence and comfort.</p>
                        <p class="mt-4 text-gray-700 mb-5">Every pair is a testament to quality craftsmanship and
                            sustainable design, ensuring you step forward with purpose and style.</p>
                        <p>
                            <a href="#"
                                class="inline-block bg-gray-400 text-white px-6 py-2 rounded lg:mb-4">Discover the
                                Collection</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="text-center" data-aos="fade-up">
                            <div class="text-4xl text-blue-600 mb-4">
                                <i class="bi bi-bullseye"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Innovation</h3>
                            <p class="mt-2 text-gray-600">We merge cutting-edge technology with timeless style,
                                delivering footwear that evolves with you.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="text-4xl text-blue-600 mb-4">
                                <i class="bi bi-command"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Design Excellence</h3>
                            <p class="mt-2 text-gray-600">Each Geove shoe is meticulously designed to ensure it meets
                                the highest standards of both comfort and aesthetics.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                            <div class="text-4xl text-blue-600 mb-4">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Sustainability</h3>
                            <p class="mt-2 text-gray-600">Geove is committed to eco-friendly practices, crafting shoes
                                with sustainable materials and a vision for a greener future.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section id="stats" class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="w-full lg:w-5/12 mb-8 lg:mb-0" data-aos="fade-up">
                        <img src="storage/bg2.jpg" alt="Why Geove" class="w-full h-auto rounded">
                    </div>
                    <div class="w-full lg:w-5/12 lg:ml-16" data-aos="fade-up">
                        <span class="text-gray-500 uppercase tracking-wide">Why Choose Geove</span>
                        <h2 class="text-3xl font-bold mt-4">Step Into Confidence with Geove</h2>
                        <p class="mt-4 text-gray-700">At Geove, we don't just sell shoes – we create experiences. Each
                            pair is crafted to elevate your confidence and style, ensuring you feel your best with every
                            step.</p>
                        <p class="mt-4 text-gray-700 mb-5">Join thousands of satisfied customers who trust Geove to
                            deliver unparalleled comfort, style, and quality.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="py-16">
            <div class="container mx-auto px-4 text-center mb-12" data-aos="fade-up">
                <p class="text-gray-500 uppercase tracking-wide">Recent Posts</p>
                <h2 class="text-3xl font-bold">Blog Posts</h2>
            </div>
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden" data-aos="fade-up"
                            data-aos-delay="100">
                            <img src="storage/bg2.jpg" alt="Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">Blog Post One</h3>
                                <p class="mt-2 text-gray-600">Far far away, behind the word mountains...</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden" data-aos="fade-up"
                            data-aos-delay="200">
                            <img src="storage/bg2.jpg" alt="Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">Blog Post Two</h3>
                                <p class="mt-2 text-gray-600">Far far away, behind the word mountains...</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden" data-aos="fade-up"
                            data-aos-delay="300">
                            <img src="storage/bg2.jpg" alt="Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">Blog Post Three</h3>
                                <p class="mt-2 text-gray-600">Far far away, behind the word mountains...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


</body>

<x-footer />

</html>
