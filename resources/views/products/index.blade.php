<x-app-layout>
    <div class="flex justify-center mt-8">
        <h1 class="font" style="color:#F5D042; ">Geove</h1>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <h1 class="flex justify-center text-5xl text-black mt-24 p-3.5  mb-24 bg-gray-300 w-full shadow-2xl font-bold rounded-lg" >SELECT YOUR STYLE</h1>

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
        <div class="flex justify-between items-center mt-6">
            <h2 class=" text-xl text-white">List Products</h2>

            <a href="{{ route('products.create') }}">
                <button class=" flex items-center gap-2 bg-gray-100 px-10 py-2  rounded-md  ">Add</button>
            </a>
        </div>

        <div class="grid md:grid-cols-5 grid-cols-2 mt-3 gap-6">
            @foreach ($products as $product)
                <div>
                    <img src="{{ url('storage/' . $product->foto) }}" alt="{{ $product->name }}" class="rounded-md">
                    <div class="my-2 ">
                        <p class="text-xl font-light text-white ">{{ $product->name }}</p>
                        <p class=" text-gray-200">Rp. {{ number_format($product->price) }}</p>
                    </div>

                    <a href="{{ route('products.edit', $product) }}">

                        <button class="bg-gray-100 px-10 py-2 w-full rounded-md mb-2">Edit</button>
                    </a>

                    <a href="">

                        <button class="bg-green-400 px-10 py-2 w-full rounded-md  text-white">Buy</button>
                    </a>
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
