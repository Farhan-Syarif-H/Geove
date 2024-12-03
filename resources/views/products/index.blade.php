<x-app-layout>
    {{-- botstrap icon--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet" />


    <div class="border-y-2 border-zinc-700 text-center p-2.5 py-4 mb-24 bg-white w-full sticky top-0 z-50 flex justify-between items-center">
        <h1 class="text-2xl text-center flex-grow">Step into Style, Walk with Confidence.</h1>
            <button data-modal-target="cart-modal" data-modal-toggle="cart-modal" class="bg-gray-800 bi bi-cart text-white px-4 py-2 rounded-full">
            {{$cartItems->count()}}
            </button>
    </div>

    <!-- Modal Keranjang -->
    <!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>

<div id="cart-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden overflow-y-auto bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <!-- Header -->
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h5 class="text-lg font-semibold text-gray-800">Keranjang Anda</h5>
            <button type="button" class="text-gray-500 hover:text-gray-800" data-modal-hide="cart-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 py-4">
            @if($cartItems->count() > 0)
                <ul class="space-y-4">
                    @foreach($cartItems as $item)
                        <?php $product = $item->product; ?>
                        <li class="flex flex-col p-3 bg-gray-50 rounded-lg shadow-sm border">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $item->quantity }} x Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>

                            </div>
                            <div class="flex gap-3 mt-2 text-right justify-end">
                                <form action="{{ route('remove.from.cart', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="text-sm text-white bg-red-600 px-4 py-2 rounded-lg hover:bg-red-800">
                                           Delete
                                        </button>
                                </form>
                                <!-- Tombol Checkout untuk Produk -->
                                <form action="{{ route('checkout.single', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-sm text-white bg-green-600 px-4 py-2 rounded-lg hover:bg-green-800">
                                        Checkout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600 text-center">Keranjang Anda kosong.</p>
            @endif
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t flex flex-col space-y-2">
            <div class="flex justify-between items-center">
                @if($cartItems->count() > 0)
                    <form action="{{ route('checkout.all') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary text-sm mb-2 text-white bg-green-600 px-4 py-2 rounded-lg hover:bg-green-800">
                            Checkout ({{ $cartItems->sum('quantity') }})
                        </button>
                    </form>
                @endif
            </div>
            @if($cartItems->count() > 0)
                <div class="text-right">
                    <p class="text-sm">
                        Total Harga: Rp{{ number_format($cartItems->sum(function ($item) {
                            return $item->quantity * $item->product->price;
                        }), 0, ',', '.') }}
                    </p>
                </div>
            @endif
        </div>


    </div>
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
            <h2 class=" text-xl text-white" id="box">List Products</h2>

            <a href="{{ route('products.create') }}">
                <button class=" flex items-center gap-2 bg-gray-100 px-10 py-2  rounded-md  ">Add</button>
            </a>
        </div>
        <form class="d-flex" role="search" action="{{ route('products.index') }}" method="GET">
            <div class="relative w-full max-w-xs">
                <input
                    class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    type="text" placeholder="Cari Produk..." aria-label="Search" name="search">
                <button
                    class="absolute top-0 right-0 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out"
                    type="submit">
                    Cari
                </button>
            </div>
        </form>

        <div class="grid grid-cols-2 md:grid-cols-4 mt-3 gap-3">
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
                            <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                                @csrf
                                <button class="bg-gray-100 px-4 py-2 w-full rounded-md" onclick="addToCart({{ $product->id }}, 1)"  ><i class="bi bi-cart"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 mb-8 text-white">
            {{ $products->links() }}
        </div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap");

       html {
         scroll-behavior: smooth;
      }

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
        transition: 0.6s ease;
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


   /* style for carrosel */
   .conteudo__geral {
  display: flex;
  justify-content: center;
  align-items: center;
}


img {
  display: block;
  max-width: 100%;
  height: 100%;
  object-fit: cover;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.container-carrossel {
  --widthItem: 150px;
  --heightItem: 100px;
  width: var(--widthItem);
  height: var(--heightItem);
  perspective: 1000px;
}

.carrossel {
  --rotatey: 0;
  font-size: 4rem;
  position: relative;
  transform: rotatey(var(--rotatey));
  transform-style: preserve-3d;
  user-select: none;
  cursor: grab;
}

.carrossel-item {
  opacity: 0.8;
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
  transition: opacity 0.5s;
}

.carrossel-item:hover {
  opacity: 1;
}

.carrossel,
.carrossel-item {
  width: 100%;
  height: 100%;
}
/* background: linear-gradient(-229deg, #642B73, #C6426E); */

.carrossel-item:nth-child(1) {
  --rotatey: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #fbd52d, #ef3a7b);
}

.carrossel-item:nth-child(2) {
  --rotatey: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #ff70af, #5fa8f5);
}

.carrossel-item:nth-child(3) {
  --rotatey: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #0cebeb, #29ffc6);
}
.carrossel-item:nth-child(4) {
  --rotatey: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #88f7f9, #048fff);
}

.carrossel-item:nth-child(5) {
  --rotate: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #0093e9, #80d0c7);
}

.carrossel-item:nth-child(6) {
  --rotatey: 0;
  transform: rotatey(var(--rotatey)) translatez(var(--tz));
  background: linear-gradient(-229deg, #cf91ff, #5782f5);
}

@media screen and (min-width: 576px) {
  .container-carrossel {
    --widthItem: 250px;
    --heightItem: 200px;
  }
}
</style>


<section>
    <div class="bg-white my-32 py-28 rounded-md">
        <div class="conteudo__geral">
            <div class="container">
                <div class="container-carrossel">
                    <div class="carrossel">
                        <div class="carrossel-item"><a href="#box"><img src="storage/download.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                        <div class="carrossel-item"><a href="#box"><img src="storage/jordan.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                        <div class="carrossel-item"><a href="#box"><img src="storage/download.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                        <div class="carrossel-item"><a href="#box"><img src="storage/jordan.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                        <div class="carrossel-item"><a href="#box"><img src="storage/download.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                        <div class="carrossel-item"><a href="#box"><img src="storage/jordan.jpg" alt="" style="width:100%; border-radius: 8px;"></a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>



    //script for carrosell

    const container = document.querySelector(".container");
const containercarrossel = container.querySelector(".container-carrossel");
const carrossel = container.querySelector(".carrossel");
const carrosselItems = carrossel.querySelectorAll(".carrossel-item");

// Iniciamos variables que cambiaran su estado.
let isMouseDown = false;
let currentMousePos = 0;
let lastMousePos = 0;
let lastMoveTo = 0;
let moveTo = 0;

const createcarrossel = () => {
  const carrosselProps = onResize();
  const length = carrosselItems.length; // Longitud del array
  const degress = 360 / length; // Grados por cada item
  const gap = 20; // Espacio entre cada item
  const tz = distanceZ(carrosselProps.w, length, gap);

  const fov = calculateFov(carrosselProps);
  const height = calculateHeight(tz);

  container.style.width = tz * 2 + gap * length + "px";
  container.style.height = height + "px";

  carrosselItems.forEach((item, i) => {
    const degressByItem = degress * i + "deg";
    item.style.setProperty("--rotatey", degressByItem);
    item.style.setProperty("--tz", tz + "px");
  });
};

// Funcion que da suavidad a la animacion
const lerp = (a, b, n) => {
  return n * (a - b) + b;
};

// https://3dtransforms.desandro.com/carousel
const distanceZ = (widthElement, length, gap) => {
  return widthElement / 2 / Math.tan(Math.PI / length) + gap; // Distancia Z de los items
};

// Calcula el alto del contenedor usando el campo de vision y la distancia de la perspectiva
const calculateHeight = (z) => {
  const t = Math.atan((90 * Math.PI) / 180 / 2);
  const height = t * 2 * z;

  return height;
};

// Calcula el campo de vision del carrossel
const calculateFov = (carrosselProps) => {
  const perspective = window
    .getComputedStyle(containercarrossel)
    .perspective.split("px")[0];

  const length =
    Math.sqrt(carrosselProps.w * carrosselProps.w) +
    Math.sqrt(carrosselProps.h * carrosselProps.h);
  const fov = 2 * Math.atan(length / (2 * perspective)) * (180 / Math.PI);
  return fov;
};

// Obtiene la posicion X y evalua si la posicion es derecha o izquierda
const getPosX = (x) => {
  currentMousePos = x;

  moveTo = currentMousePos < lastMousePos ? moveTo - 7 : moveTo + 7;

  lastMousePos = currentMousePos;
};

const update = () => {
  lastMoveTo = lerp(moveTo, lastMoveTo, 0.05);
  carrossel.style.setProperty("--rotatey", lastMoveTo + "deg");

  requestAnimationFrame(update);
};

const onResize = () => {
  // Obtiene la propiedades del tamaño de carrossel
  const boundingcarrossel = containercarrossel.getBoundingClientRect();

  const carrosselProps = {
    w: boundingcarrossel.width,
    h: boundingcarrossel.height,
  };

  return carrosselProps;
};

const initEvents = () => {
  // Eventos del mouse
  carrossel.addEventListener("mousedown", () => {
    isMouseDown = true;
    carrossel.style.cursor = "grabbing";
  });
  carrossel.addEventListener("mouseup", () => {
    isMouseDown = false;
    carrossel.style.cursor = "grab";
  });
  container.addEventListener("mouseleave", () => (isMouseDown = false));

  carrossel.addEventListener(
    "mousemove",
    (e) => isMouseDown && getPosX(e.clientX)
  );

  // Eventos del touch
  carrossel.addEventListener("touchstart", () => {
    isMouseDown = true;
    carrossel.style.cursor = "grabbing";
  });
  carrossel.addEventListener("touchend", () => {
    isMouseDown = false;
    carrossel.style.cursor = "grab";
  });
  container.addEventListener(
    "touchmove",
    (e) => isMouseDown && getPosX(e.touches[0].clientX)
  );

  window.addEventListener("resize", createcarrossel);

  update();
  createcarrossel();
};

initEvents();
    </script>
</section>

<x-footer/>
</x-app-layout>



