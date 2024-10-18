<x-app-layout>
    <div class="border-black text-center  text-black p-2.5 py-4 mb-24 bg-white w-full font-bold items-center sticky top-0 z-50">
        <h1 class="text-4xl" >SELECT YOUR STYLES</h1>
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
              <h2></h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/NK.jpg" alt="2" />
            <h1>Nike</h1>
            <div class="details">
              <h2></h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/BALEN.jpg" alt="3" />
            <h1>Balenciaga</h1>
            <div class="details">
              <h2></h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/AD.jpg" alt="4" />
            <h1>Adidas</h1>
            <div class="details">
              <h2></h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/BALEN.jpg" alt="5" />
            <h1>Balenciaga</h1>
            <div class="details">
              <h2></h2>
              <p></p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/NK.jpg" alt="6" />
            <h1>Nike</h1>
            <div class="details">
              <h2></h2>
              <p>Vocalist</p>
            </div>
          </div>
          <div class="slider-img">
            <img src="storage/AD.jpg" alt="7" />
            <h1>Adidas</h1>
            <div class="details">
              <h2></h2>
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

        <div class="grid md:grid-cols-3 grid-cols-2 mt-3 gap-6">
            @foreach ($products as $product)
                <div>
                    {{-- <img src="{{ url('storage/' . $product->foto) }}" alt="{{ $product->name }}" class="rounded-md">
                    <div class="my-2 ">
                        <p class="text-xl font-light">{{ $product->name }}</p>
                        <p class="">Rp. {{ number_format($product->price) }}</p>
                    </div> --}}

                    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="flex items-center p-4">
                            <div class="w-1/3">
                                <img src="{{ url('storage/' . $product->foto) }}" class="object-contain h-24 rounded-xl">
                            </div>
                            <div class="w-2/3 pl-4">
                                <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                                <p class="text-gray-500 text-sm">36EU - 4US</p>
                                <p class="mt-2 text-xl font-bold text-gray-800">Rp. {{ number_format($product->price) }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2 mx-3">

                            <a href="{{ route('products.edit', $product) }}">

                                <button class="bg-gray-100 px-10 py-2 w-full rounded-md mb-2">Edit</button>
                            </a>

                            <a href="https://www.instagram.com/lexnvert">

                                <button class="bg-gray-100 px-10 py-2 w-full rounded-md ">Buy</button>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-4 mb-8 text-white">
            {{ $products->links() }}
            </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
        $(document).ready(function () {
          $(".slider-img").on("click", function () {
            $(".slider-img").not(this).removeClass("active");
            $(this).toggleClass("active");
          });
        });
      </script>

   <style>
    @import url("https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Jost", sans-serif;
}


.font{
    font-family: "Jost", sans-serif;
    font-size: 40px;
    box-sizing: border-box;
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
  filter: brightness(70%);
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
  font-family: "Jost", sans-serif;
  font-size: 40px;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) rotate(270deg);
  transition: 0.7s ease;
}
.details {
  position: absolute;
  bottom: 43px;
  left: 43px;
}
.details h2 {
  font-family: "Jost", sans-serif;
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
  font-family: "Jost", sans-serif;
  font-size: 20px;
  font-weight: 700;
  line-height: 33px;
  text-align: left;
  color: #fff;
  text-transform: uppercase;
  transition: 0.7s ease;
  display: none;
}
.slider-img.active {
  width: 500px !important;
  height: 450px !important;
}
.slider-img.active h1 {
  display: none;
}
.slider-img.active .details p,
.slider-img.active .details h2 {
  display: block;
}
   </style>
    <x-footer/>

</x-app-layout>
