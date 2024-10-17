<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Geove</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

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
  <header id="header" class="header sticky top-0 bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-4 py-4">
     <img src="logo.jpg" alt="" style="width:45px">
      <nav id="navmenu" class="hidden md:flex space-x-6">
        @if (Route::has('login'))

                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth

                        @endif
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- About Section -->
    <section id="about" class="about section py-16">
      <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between">
          <div class="w-full lg:w-7/12 mb-8 lg:mb-0 order-last lg:order-first" data-aos="fade-up" data-aos-delay="400">
            <!-- Swiper -->
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="storage/bg2.jpg" alt="Image" class=" h-auto rounded-md">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="w-full lg:w-4/12">
            <span class="text-gray-500 uppercase tracking-wide" data-aos="fade-up">Welcome</span>
            <h1 class="text-4xl font-bold mb-4" data-aos="fade-up">
              Excepteur sint occaecat cupidatat non proident
            </h1>
            <p class="text-gray-700" data-aos="fade-up">
              Far far away, behind the word mountains, far from the countries
              Vokalia and Consonantia, there live the blind texts. Separated they
              live in Bookmarksgrove right at the coast of the Semantics, a large
              language ocean.
            </p>
            <p class="mt-5" data-aos="fade-up">
              <a href="#" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Get Started</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section bg-gray-100 py-16">
      <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-20">
          <div class="w-full lg:w-5/12 mb-8 lg:mb-0 order-last lg:order-last" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center lg:text-left">
              <img src="storage/bg2.jpg" alt="circle image" class="w-full h-auto rounded-full">
            </div>
          </div>
          <div class="w-full lg:w-5/12 lg:ml-16" data-aos="fade-up">
            <span class="text-gray-500 uppercase tracking-wide">Our Mission</span>
            <h2 class="text-3xl font-bold mt-4">
              The Big Oxmox advised her not to do so, because there were thousands.
            </h2>
            <p class="mt-4 text-gray-700">
              A small river named Duden flows by their place and supplies it
              with the necessary regelialia. It is a paradisematic country.
            </p>
            <p class="mt-4 text-gray-700 mb-5">
              The Big Oxmox advised her not to do so, because there were
              thousands of bad Commas, wild Question Marks and devious Semikoli.
            </p>
            <p>
              <a href="#" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Get Started</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /About 2 Section -->

    <!-- Services Section -->
    <section id="services" class="services section bg-gray-100 py-16">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center">
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="text-center" data-aos="fade-up">
              <div class="text-4xl text-blue-600 mb-4">
                <i class="bi bi-bullseye"></i>
              </div>
              <h3 class="text-xl font-semibold">Technology</h3>
              <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
              <div class="text-4xl text-blue-600 mb-4">
                <i class="bi bi-command"></i>
              </div>
              <h3 class="text-xl font-semibold">Web Design</h3>
              <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
              <div class="text-4xl text-blue-600 mb-4">
                <i class="bi bi-bar-chart"></i>
              </div>
              <h3 class="text-xl font-semibold">Branding</h3>
              <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Services Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section bg-gray-100 py-16">
      <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center">
          <div class="w-full lg:w-5/12 mb-8 lg:mb-0" data-aos="fade-up">
            <img src="storage/bg2.jpg" alt="student" class="w-full h-auto rounded">
          </div>
          <div class="w-full lg:w-5/12 lg:ml-16">
            <span class="text-gray-500 uppercase tracking-wide">Why Us</span>
            <h2 class="text-3xl font-bold mt-4">Far far away Behind the Word Mountains</h2>
            <p class="mt-4 text-gray-700">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt reiciendis vel autem consequatur vitae consectetur!
            </p>
            <p class="mt-4 text-gray-700 mb-5">
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eius at officia, ipsa dicta labore! Ullam cumque beatae omnis officiis voluptates voluptas excepturi, quia deserunt.
            </p>

          </div>
        </div>
      </div>
    </section>
    <!-- /Stats Section -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section py-16">
      <!-- Section Title -->
      <div class="container mx-auto px-4 text-center mb-12" data-aos="fade-up">
        <p class="text-gray-500 uppercase tracking-wide">Recent Posts</p>
        <h2 class="text-3xl font-bold">Blog Posts</h2>
      </div>


        <!-- End Section Title -->
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
              <img src="storage/bg2.jpg" alt="Image" class="w-full h-48 object-cover">
              <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-2">
                  <a href="#" class="mr-2">Development</a> •
                  <span class="ml-2">July 20, 2020</span>
                </div>
                <h3 class="text-xl font-semibold mb-2"><a href="#">There live the blind texts they live</a></h3>
                <p class="text-gray-700 mb-4">
                  Far far away, behind the word mountains, far from the countries
                  Vokalia and Consonantia, there live the blind texts.
                </p>
                <div class="flex items-center">
                  <img src="storage/bg2.jpg" alt="Image" class="w-10 h-10 rounded-full mr-4">
                  <div>
                    <p class="text-gray-800 font-semibold">Winston Gold</p>
                    <p class="text-gray-600 text-sm">Lead Product Designer</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>







    </section>
    <!-- /Blog Posts Section -->

  </main>

  <!-- Footer -->
  <footer id="footer" class="footer bg-gray-100 py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/3 px-4 mb-8">
          <h3 class="text-xl font-semibold mb-4">About Us</h3>
          <p class="text-gray-700 mb-4">
           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae maxime laboriosam nulla aut praesentium? Hic ut facilis praesentium qui. Inventore, consequatur ratione? Vitae, perferendis necessitatibus.
          </p>
          <a href="#" class="text-blue-600 hover:underline">Learn more</a>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-8">
          <h3 class="text-xl font-semibold mb-4">Navigation</h3>
          <div class="flex">
            <ul class="mr-8">
              <li><a href="#" class="text-gray-700 hover:text-blue-600">Overview</a></li>
              <li><a href="#" class="text-gray-700 hover:text-blue-600">About Us</a></li>
              <li><a href="#" class="text-gray-700 hover:text-blue-600">Find Buyers</a></li>
            </ul>
            <ul>
              <li><a href="#" class="text-gray-700 hover:text-blue-600">Overview</a></li>
              <li><a href="#" class="text-gray-700 hover:text-blue-600">About Us</a></li>
              <li><a href="#" class="text-gray-700 hover:text-blue-600">Services</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center justify-between">
        <p class="text-gray-600">© <span>Copyright</span> <strong class="text-blue-600">Active.</strong> <span>All Rights Reserved</span></p>
        <div class="text-gray-600">
          Designed by <a href="https://bootstrapmade.com/" class="text-blue-600 hover:underline">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- /Footer -->

  <!-- Scripts -->
  <!-- Include Swiper JS if you are using it -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      // Swiper options
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</body>

</html>
