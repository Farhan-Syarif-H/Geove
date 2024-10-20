<x-app-layout>
    {{-- botstrap icon--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <div class=" border-y-2 border-zinc-700 text-center  p-2.5 py-4 mb-24 bg-white w-full items-center sticky top-0 z-50">
        <h1 class="text-2xl" >Step into Style, Walk with Confidence.</h1>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}" />
        @endif

    <div class="mb-24">
    {{-- slider img--}}
    <section class="slider-container">
        <div class="slider-image">
          <div class="slider-img">
            <img src="storage/AD.jpg" alt="1" />
            <h1>Adidas</h1>
            <div class="details">
              <h2>Adidas</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/NK.jpg" alt="2" />
            <h1>Nike</h1>
            <div class="details">
              <h2>Nike</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/BALEN.jpg" alt="3" />
            <h1>Balenciaga</h1>
            <div class="details">
              <h2>Balenciaga</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/AD.jpg" alt="4" />
            <h1>Adidas</h1>
            <div class="details">
              <h2>Adidas</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/BALEN.jpg" alt="5" />
            <h1>Balenciaga</h1>
            <div class="details">
              <h2>Balenciaga</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/NK.jpg" alt="6" />
            <h1>Nike</h1>
            <div class="details">
              <h2>Nike</h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/AD.jpg" alt="7" />
            <h1>Adidas</h1>
            <div class="details">
              <h2>Adidas</h2>
              <p></p>
            </div>
          </div>
        </div>
      </section>
    </div>

 <!-- Slider container  : slide auto-->
 <div class="relative w-full max-w-full mx-auto mt-10 overflow-hidden rounded-lg">
    <!-- Slide items -->
    <div id="slider" class="flex transition-transform duration-500">
      <div class="w-full flex-shrink-0">
        <img src="/storage/bg.jpg" class="w-full">
      </div>
      <div class="w-full flex-shrink-0">
        <img src="/storage/bg_2.jpg" class="w-full">
      </div>
      <div class="w-full flex-shrink-0">
        <img src="/storage/bg.jpg" class="w-full">
      </div>
    </div>

    <!-- Left Button -->
    <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-r focus:outline-none" onclick="prevSlide()">
      &#10094; <!-- Left Arrow -->
    </button>

    <!-- Right Button -->
    <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-l focus:outline-none" onclick="nextSlide()">
      &#10095; <!-- Right Arrow -->
    </button>

    <!-- Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button class="w-3 h-3 bg-gray-300 rounded-full focus:outline-none" onclick="goToSlide(0)"></button>
      <button class="w-3 h-3 bg-gray-300 rounded-full focus:outline-none" onclick="goToSlide(1)"></button>
      <button class="w-3 h-3 bg-gray-300 rounded-full focus:outline-none" onclick="goToSlide(2)"></button>
    </div>
  </div>

  <script>
    const slider = document.getElementById('slider');
    let currentSlide = 0;
    const totalSlides = slider.children.length;

    function goToSlide(slideIndex) {
      slider.style.transform = `translateX(-${slideIndex * 100}%)`;
      currentSlide = slideIndex;
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      goToSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      goToSlide(currentSlide);
    }

    function autoSlide() {
      nextSlide();
    }

    // Automatically change slides every 3 seconds
    setInterval(autoSlide, 3000);
  </script>

        <div class="flex justify-between items-center mt-6">
            <h2 class=" text-xl text-white">List Products</h2>

            <a href="{{ route('products.create') }}">
                <button class=" flex items-center gap-2 bg-gray-100 px-10 py-2  rounded-md  ">Add</button>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 mt-3 gap-6">
            @foreach ($products as $product)
                <div>
                    <div class="max-w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="flex flex-col sm:flex-row items-center p-4">
                            <div class="w-full sm:w-1/3">
                                <img src="{{ url('storage/' . $product->foto) }}" class="object-contain h-24 w-full rounded-xl mb-2 sm:mb-0">
                            </div>
                            <div class="w-full sm:w-2/3 pl-4">
                                <h3 class="text-lg sm:text-xl font-semibold">{{ $product->name }}</h3>
                                <p class="text-gray-500 text-sm">36EU - 4US</p>
                                <p class="mt-2 text-lg sm:text-xl font-bold text-gray-800">Rp. {{ number_format($product->price) }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-2 mx-3 mb-3">
                            <a href="{{ route('products.edit', $product) }}">
                                <button class="bg-gray-100 px-4 py-2 w-full rounded-md mb-2"><i class="bi bi-pencil-square"></i> Edit</button>
                            </a>
                            <a href="https://www.instagram.com/lexnvert">
                                <button class="bg-gray-100 px-4 py-2 w-full rounded-md"><i class="bi bi-cart"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 mb-8 text-white">
            {{ $products->links() }}
        </div>

         <!-- Services Section -->
   <section id="services" class="services section bg-white py-16 mt-12 mb-12 rounded-md">
    <div class="flex flex-wrap justify-center">
      <div class="w-full md:w-1/3 px-4 mb-8">
        <div class="text-center" data-aos="fade-up">
          <div class="text-4xl text-blue-600 mb-4">
            <i class="bi bi-box"></i>
          </div>
          <h3 class="text-xl font-semibold">Geove</h3>
          <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
        </div>
      </div>
      <div class="w-full md:w-1/3 px-4 mb-8">
        <div class="text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="text-4xl text-blue-600 mb-4">
            <i class="bi bi-box"></i>
          </div>
          <h3 class="text-xl font-semibold">Geove</h3>
          <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
        </div>
      </div>
      <div class="w-full md:w-1/3 px-4 mb-8">
        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="text-4xl text-blue-600 mb-4">
            <i class="bi bi-box"></i>
          </div>
          <h3 class="text-xl font-semibold">Geove</h3>
          <p class="mt-2 text-gray-600">Separated they live in Bookmarksgrove right at the coast</p>
        </div>
      </div>
    </div>
  </section>





<style>
    @import url("https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Jost", sans-serif;
    }

    .font {
        font-family: "Jost", sans-serif;
        font-size: 40px;
        font-weight: 700;
    }

    .slider-container {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slider-image {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .slider-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
        filter: brightness(90%);
        transition: transform 0.5s ease; /* Transition effect for hover */
    }

    .slider-img {
        width: 100px;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        transition: 0.5s ease;
    }

    .slider-image .slider-img:first-child,
    .slider-image .slider-img:last-child {
        height: 300px;
    }

    .slider-image .slider-img:nth-child(2),
    .slider-image .slider-img:nth-child(6) {
        height: 400px;
    }

    .slider-image .slider-img:nth-child(3),
    .slider-image .slider-img:nth-child(4),
    .slider-image .slider-img:nth-child(5) {
        height: 500px;
    }

    .slider-container h1 {
        font-size: 40px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) rotate(270deg);
        transition: 0s ease;
    }

    .details {
        position: absolute;
        bottom: 43px;
        left: 43px;
    }

    .details h2 {
        font-size: 25px;
        font-weight: 700;
        line-height: 42px;
        text-align: left;
        color: #fff;
        text-transform: uppercase;
        transition: 0.7s ease;
        display: none;
    }

    .details p {
        font-size: 20px;
        font-weight: 700;
        line-height: 33px;
        text-align: left;
        color: #fff;
        text-transform: uppercase;
        transition: 0.7s ease;
        display: none;
    }

    .slider-img:hover {
        width: 500px !important; /* Scale up on hover */
        height: 450px !important; /* Maintain aspect ratio */
    }

    .slider-img:hover h1 {
        display: none;
    }

    .slider-img:hover .details p,
    .slider-img:hover .details h2 {
        display: block;
    }

    @media (max-width: 768px) {
        .slider-image .slider-img:first-child,
    .slider-image .slider-img:last-child {
        height: 300px;
    }

    .slider-image .slider-img:nth-child(2),
    .slider-image .slider-img:nth-child(6) {
        height: 300px;
    }

    .slider-image .slider-img:nth-child(3),
    .slider-image .slider-img:nth-child(4),
    .slider-image .slider-img:nth-child(5) {
        height: 300px;
    }

    .slider-img:hover {
        width: 300px !important; /* Scale up on hover */
        height: 300px !important; /* Maintain aspect ratio */
    }

        .slider-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-image {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
            overflow-x: auto; /* Enable horizontal scrolling */
        }

        .slider-image .slider-img {
            height: 100px; /* Set a static height for mobile */
        }

        .slider-container h1 {
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) rotate(270deg);
            transition: 0s ease;
        }

        .details h2 {
            font-size: 0px;
            font-weight: 0;
            display: none;
        }

        .details p {
            font-size: 20px;
            font-weight: 700;
            line-height: 33px;
            text-align: left;
            color: #fff;
            text-transform: uppercase;
            transition: 0.7s ease;
            display: none;
        }
    }
</style>


</x-app-layout>
<x-footer/>
