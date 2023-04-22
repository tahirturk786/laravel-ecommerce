<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FBFBFB]">

    <div class="flex justify-between items-center px-20 bg-white shadow py-2">
        <img src="{{ asset('images/logo.png') }}" width="120">

        <div class="text-2xl relative">
            <i class='bx bx-heart'></i>
            <i class='bx bx-user'></i>
            <i class='bx bx-cart'></i>
            <spam class="absolute top-0 -right-2.5 bg-indigo-600 rounded-full w-4 h-4 text-xs text-white text-center">
                99</span>
        </div>
    </div>

    <div class="owl-carousel">
        <a href="#"><img src="{{ asset('images/banner.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/banner.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/banner.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/banner.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/banner.png') }}" alt=""></a>
    </div>

    <section class="px-20 mt-6">
        <h3 class="text-gray-800 font-medium mb-2">Flash Sale</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach (range(1, 4) as $item)
                < x-product.card-1 />
            @endforeach
        </div>
    </section>
    <section class=" px-20 mt-10 mb-6">
        <div class="flex flex-wrap gap-6">
            @foreach (range(1, 7) as $item)
                <div class="bg-white rounded-md shadow flex  justify-between items-center gap-2">
                    <div class="flex flex-col p-3">
                        <span class="text-gray-400">First Order</span>
                        <span class="text-orange-400">#FKFIRST</span>
                    </div>
                    <div class="bg-violet-600 w-12 font-medium text-white p-3 rounded-r-md">
                        20% Off
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="px-20 mt-8">
        <div class="flex items-center justify-between">
            <div class="flex gap-2">
                <h3 class="text-gray-800 font-medium mb-2 underline">Best Seller</h3>
                <h3 class="text-gray-800 font-medium mb-2">New Product</h3>
            </div>
            <h3 class="text-violet-600 font-medium mb-2">All Products</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach (range(1, 12) as $item)
                < x-product.card-1 />
            @endforeach
        </div>
    </section>

    <footer>
        <div></div>

    </footer>


    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        });
    </script>
</body>

</html>
