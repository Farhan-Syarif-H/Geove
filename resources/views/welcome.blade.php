<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geove - Discover Your Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-primary {
            background-color: #F5D042;
            color: #0A174E;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0A174E;
            color: #F5D042;
        }

        .bg-primary {
            background-color: #F5D042;
        }

        .text-primary {
            color: #F5D042;
        }

        .bg-secondary {
            background-color: #0A174E;
        }

        .text-secondary {
            color: #0A174E;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-lg">
        <nav class="container mx-auto p-6 flex justify-between items-center">
            <div class="text-3xl font-bold text-secondary">Geove</div>
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                             @auth
                                 <a
                                     href="{{ url('/dashboard') }}"
                                     class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black dark:focus-visible:ring-white"
                                 >
                                     Dashboard
                                 </a>
                             @else
                                 <a
                                     href="{{ route('login') }}"
                                     class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black dark:focus-visible:ring-white"
                                 >
                                     Log in
                                 </a>

                                 @if (Route::has('register'))
                                     <a
                                         href="{{ route('register') }}"
                                         class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black dark:focus-visible:ring-white"
                                     >
                                         Register
                                     </a>
                                 @endif
                             @endauth
                         </nav>
                     @endif
        </nav>
        <div class="bg-secondary text-primary text-center py-20">
            <h1 class="text-6xl font-bold mb-4">Discover Your Style</h1>
            <p class="text-xl mb-8">Shop the latest trends in fashion, electronics, and more!</p>
            <a href="#products" class="btn-primary px-8 py-4 rounded-full font-semibold hover:bg-secondary hover:text-primary transition">Shop Now</a>
        </div>
    </header>

    <!-- Product Section -->
    <section id="products" class="container mx-auto py-20">
        <h2 class="text-4xl font-bold text-center text-secondary mb-12">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <img src="product1.jpg" alt="Product 1" class="rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-2 text-secondary">Product Name 1</h3>
                <p class="text-primary text-lg">$29.99</p>
            </div>
            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <img src="product2.jpg" alt="Product 2" class="rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-2 text-secondary">Product Name 2</h3>
                <p class="text-primary text-lg">$39.99</p>
            </div>
            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <img src="product3.jpg" alt="Product 3" class="rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-2 text-secondary">Product Name 3</h3>
                <p class="text-primary text-lg">$49.99</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary text-primary text-center py-6">
        <p>&copy; 2024 Geove. All rights reserved.</p>
    </footer>

</body>
</html>
