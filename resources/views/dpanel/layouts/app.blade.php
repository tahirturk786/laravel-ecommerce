<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dd4you/dpanel/js/cute-alert/style.css') }}">
    @vite('resources/css/app.css')
    @stack('css')

</head>

<body class="w-full flex flex-no-wrap bg-gray-100">

    <header class="fixed w-full bg-gray-800 text-white px-3 flex items-center shadow-lg gap-3 h-14 z-50">
        <span>
            <i onclick="openSidebar(this)" class='bx bx-menu-alt-left cursor-pointer  text-white text-3xl'></i>
        </span>
        <div class="w-full flex justify-between items-center">
            <span class="font-medium">Dashboard</span>
            <div class="flex items-center gap-2">
                <span class="font-medium">Logout</span>
                <a href="{{ route(config('dpanel.prefix') . '.logout') }}"><i
                        class='bx bx-log-in-circle cursor-pointer  text-gray-300 hover:text-red-500 duration-300 text-2xl'></i></a>
            </div>
        </div>
    </header>

    <x-dpanel::sidebar.container name="DD Admin">

        <x-dpanel::sidebar.item name="Dashboard" icon="bx-home" url=""
            isActive="{{ request()->segment(2) == 'dashboard' }}" />

        <x-dpanel::sidebar.dropdown name="Product Details " icon="bx-menu"
            isActive="{{ request()->segment(2) == 'Product Details' }}">
            <x-dpanel::sidebar.dropdown-item name="Brands" url="{{ route('dpanel.brand.index') }}"
                isActive="{{ request()->segment(2) == 'brand' }}" />
            <x-dpanel::sidebar.dropdown-item name="Categories" url="{{ route('dpanel.category.index') }}"
                isActive="{{ request()->segment(2) == 'category' }}" />
            <x-dpanel::sidebar.dropdown-item name="Size" url="{{ route('dpanel.size.index') }}"
                isActive="{{ request()->segment(2) == 'size' }}" />
            <x-dpanel::sidebar.dropdown-item name="Color" url="{{ route('dpanel.color.index') }}"
                isActive="{{ request()->segment(2) == 'color' }}" />
        </x-dpanel::sidebar.dropdown>

        <x-dpanel::sidebar.dropdown name="Add Products" icon="bx-shopping-bag"
        isActive="{{ request()->segment(2) == 'product' }}">
        <x-dpanel::sidebar.dropdown-item name="Products" url="{{ route('dpanel.product.index') }}"
            isActive="{{ request()->segment(2) == 'product' }}" />
            <x-dpanel::sidebar.dropdown-item name="List Products" url="{{}}"
            isActive="{{ request()->segment(2) == 'list product' }}" />
        </x-dpanel::sidebar.dropdown>


        <x-dpanel::sidebar.dropdown name="Variations" icon="bx-menu"
        isActive="{{ request()->segment(2) == 'varition' }}">
        <x-dpanel::sidebar.dropdown-item name="Add varient" url="{{ route('dpanel.brand.index') }}"
            isActive="{{ request()->segment(2) == 'varient' }}" />
        </x-dpanel::sidebar.dropdown>


        <x-dpanel::sidebar.item name="Menu 3" icon="bx-menu" url=""
            isActive="{{ request()->segment(2) == 'menu-2' }}" />
        <x-dpanel::sidebar.item name="Menu 4" icon="bx-menu" url=""
            isActive="{{ request()->segment(2) == 'menu-2' }}" />
        <x-dpanel::sidebar.item name="Menu 5" icon="bx-menu" url=""
            isActive="{{ request()->segment(2) == 'menu-2' }}" />

        {{-- Global Settings Menu --}}
        <x-dpanel::sidebar.item name="Global Settings" icon="bx-cog"
            url="{{ route(config('dpanel.prefix') . '.global-settings.index') }}"
            isActive="{{ request()->segment(2) == 'global-settings' }}" />

    </x-dpanel::sidebar.container>



    <main class="dd-main">
        <div class="px-4 py-6">
            @yield('body_content')
        </div>
    </main>

    <script src="{{ asset('dd4you/dpanel/js/dd4you.js') }}"></script>
    <script src="{{ asset('dd4you/dpanel/js/cute-alert/cute-alert.js') }}"></script>
    <script src="{{ asset('dd4you/dpanel/js/jquery-3.6.1.min.js') }}"></script>
    @stack('scripts')
    <script>
        @if (Session::has('success'))
            cuteToast({
                type: "success",
                message: "{{ session('success') }}",
            })
        @endif

        @if (Session::has('error'))
            cuteToast({
                type: "error",
                message: "{{ session('error') }}",
            })
        @endif

        @if (Session::has('info'))
            cuteToast({
                type: "info",
                message: "{{ session('info') }}",
            })
        @endif

        @if (Session::has('warning'))
            cuteToast({
                type: "warning",
                message: "{{ session('warning') }}",
            })
        @endif

        const openSidebar = (e) => {
            // e.classList.remove();
            // e.classList.add('bxl-xing');
            document.querySelector('.dd-aside').classList.toggle('left-0');
            if (!isMobileResponsive()) document.querySelector('.dd-main').classList.toggle('w-[calc(100%-220px)]');
        }

        if (isMobileResponsive()) {
            document.querySelector('.dd-aside').classList.remove('left-0')
            document.querySelector('.dd-main').classList.remove('w-[calc(100%-220px)]')
        } else {
            document.querySelector('.dd-aside').classList.add('left-0')
            document.querySelector('.dd-main').classList.add('w-[calc(100%-220px)]')
        }
        window.addEventListener('resize', function() {
            if (isMobileResponsive()) {
                document.querySelector('.dd-aside').classList.remove('left-0')
                document.querySelector('.dd-main').classList.remove('w-[calc(100%-220px)]')
            } else {
                document.querySelector('.dd-aside').classList.add('left-0')
                document.querySelector('.dd-main').classList.add('w-[calc(100%-220px)]')
            }
        });

        const toggleSubmenu = (e) => {
            let ele = e.nextElementSibling;
            ele.classList.toggle('show');
            e.querySelector('.bx-chevron-right').classList.toggle('bx-rotate-90');
            ele.style.height = ele.style.height ? null : ele.scrollHeight + 'px';
        }
    </script>

</body>

</html>
