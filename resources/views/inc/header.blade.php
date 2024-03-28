<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0  block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto   border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 bg-white">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
            href="{{ config('app.url') }}" >
            <img src="{{ config('app.url') }}/assets/img/sFAV.png"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <span style="    font-size: 11px;" class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">V.Ram Chandra Iron & Steel
            </span>
        </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
    <div class="items-center block w-auto max-h-screen overflow-auto   grow basis-full">
        <p class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors uppercase text-center">{{ auth()->user()->role }} Panel</p>
        <ul class="flex flex-col pl-0 mb-0">

            @if (auth()->user()->role=='admin' || auth()->user()->role=='subadmin')
             <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ config('app.url') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-dashboard"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </a>
            </li>
             <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ route('report') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-file"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Reports</span>
                </a>
            </li>

            @endif



            <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ route('order.index') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Order Details (step1)</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ route('transport.index') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-truck"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Transport Details (step2)</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ route('delivery.index') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-shipping-fast"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Delivery Details (step3)</span>
                </a>
            </li>


            @if (auth()->user()->role=='admin')
            <li class="mt-0.5 w-full">
                <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors"
                    href="{{ route('user.index') }}">
                    <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Users</span>
                </a>
            </li>

            @endif

            <li class="mt-0.5 w-full">



                                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg   px-4 font-semibold text-slate-700 transition-colors" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <div
                        class="bg-gradient-to-tl  to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>



        </ul>
    </div>
    <div class="mx-4">

        <p
            class="invisible hidden text-gray-800 text-red-500 text-red-600 after:bg-gradient-to-tl after:from-gray-900 after:to-slate-800 after:from-blue-600 after:to-cyan-400 after:from-red-500 after:to-yellow-400 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-rose-400 after:from-slate-600 after:to-slate-300 text-lime-500 text-cyan-500 text-slate-400 text-fuchsia-500">
        </p>



    </div>
</aside>
<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">

    <nav class="w-fill mx-2 my-2 px-2 py-3 relative flex flex-wrap items-center justify-between  transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
        navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>

                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50 text-slate-700" href="{{ config('app.url') }}">Home</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                        aria-current="page">{{ $title ?? '' }}</li>
                </ol>
                <h6 class="mb-0 font-bold capitalize">{{ $title ?? '' }}</h6>
            </nav>
            <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">

                <ul class="flex items-center md:ml-auto md:pr-4">


                    <li class="flex items-center">
                        <a href="{{ route('logout') }}"
                            class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                            <i class="fa fa-sign-out sm:mr-1" aria-hidden="true"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </a>
                    </li>
                    <li class="flex items-center pl-4 xl:hidden">
                        <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500"
                            sidenav-trigger>
                            <div class="w-4.5 overflow-hidden">
                                <i
                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                <i
                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            </div>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>
