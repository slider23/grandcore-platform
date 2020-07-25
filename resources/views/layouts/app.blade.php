@extends('layouts.base')

@section('body')
    <div>
        <nav x-data="{mobile_menu_open: false}" class="bg-primary">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="flex items-baseline">
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white uppercase focus:outline-none focus:text-white ">О фонде</a>
                                <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white focus:outline-none focus:text-white">Пожертвования</a>
                                <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white focus:outline-none focus:text-white">Участники</a>
                                <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white focus:outline-none focus:text-white">Новости</a>
                            </div>
                        </div>
                        <div class="md:hidden">
                            <x-logo-caption class="w-auto h-8 text-white"></x-logo-caption>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        @if(Auth::guest())
                            <a href="/login" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-blue-100 hover:text-white focus:text-white">
                                Вход
                            </a>
                            <a href="/register" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-blue-100 hover:text-white focus:text-white">
                                Регистрация
                            </a>
                        @else

                            <div class="ml-4 flex items-center md:ml-6">
                                <button class="p-1 border-2 border-transparent text-gray-300 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-600" aria-label="Notifications">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div class="ml-3 relative" x-data="{profile_dropdown_open: false}">
                                    <div>
                                        <button @click="profile_dropdown_open = true" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true">
                                            <img class="h-8 w-8 rounded-full" src="{{auth()->user()->gravatarUrl()}}" alt="" />
                                        </button>
                                    </div>
                                    <!--
                                      Profile dropdown panel, show/hide based on dropdown state.

                                      Entering: "transition ease-out duration-100"
                                        From: "transform opacity-0 scale-95"
                                        To: "transform opacity-100 scale-100"
                                      Leaving: "transition ease-in duration-75"
                                        From: "transform opacity-100 scale-100"
                                        To: "transform opacity-0 scale-95"
                                    -->
                                    <div x-show="profile_dropdown_open" @click.away="profile_dropdown_open = false" style="display: none;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                            @if(auth()->user()->isAdmin())
                                            <a href="{{route("admin")}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Админка
                                            </a>
                                            @endif
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Настройки
                                            </a>
                                            <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Выход
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="mobile_menu_open = !mobile_menu_open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-300 hover:text-white focus:outline-none focus:text-white">
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg x-show="mobile_menu_open === false" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg x-show="mobile_menu_open === true" style="display: none;" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!--
              Mobile menu, toggle classes based on menu state.

              Open: "block", closed: "hidden"
            -->
            <div x-show="mobile_menu_open" style="display:none" class="block md:hidden">
                <div class="px-2 pt-2 pb-3 sm:px-3">
                    <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-white uppercase focus:outline-none focus:text-white">О фонде</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Пожертвования</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Участники</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Новости</a>
                </div>
                <div class="px-2 pt-2 pb-3 sm:px-3 border-t border-gray-600">
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Софт</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Онлайн-сервисы</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Стандарты изделий</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Тесты</a>
                </div>
                @if(Auth::guest())
                    <div class="px-2 pt-2 pb-3 sm:px-3 border-t border-gray-600">
                        <a href="/login" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Вход</a>
                        <a href="/register" class="mt-1 block px-3 py-2 rounded-md text-sm font-medium text-blue-100 uppercase hover:text-white hover:bg-primary-light focus:outline-none focus:text-white focus:bg-primary-light">Регистрация</a>
                    </div>
                @else
                <div class="pt-4 pb-3 border-t border-blue-300">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{auth()->user()->gravatarUrl()}}" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{auth()->user()->name}}</div>
                            <div class="mt-1 text-sm font-medium leading-none text-blue-300">{{auth()->user()->email}}</div>
                        </div>
                    </div>
                    <div class="mt-3 px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                        @if(auth()->user()->isAdmin())
                        <a href="{{route("admin")}}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Админка</a>
                        @endif
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Настройки</a>
                        <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Выход</a>
                    </div>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                @endif
            </div>
        </nav>

        <header class="hidden md:block bg-white mt-4">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between items-center w-full">
                    <div>
                        <x-logo-caption class="w-auto h-10 lg:h-12 mx-auto text-primary" />
                    </div>
                    <div>
                        <div class="flex items-baseline">
                            <a href="#" class="font-medium text-primary uppercase underline focus:outline-none focus:text-white ">Софт</a>
                            <a href="#" class="ml-4 font-medium text-primary uppercase hover:underline focus:underline">Онлайн-сервисы</a>
                            <a href="#" class="ml-4 font-medium text-primary uppercase hover:underline focus:underline">Стандарты изделий</a>
                            <a href="#" class="ml-4 font-medium text-primary uppercase hover:underline focus:underline">Тесты</a>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 px-2 sm:px-6 lg:px-8">

                @yield('content')

            </div>
        </main>
    </div>


    <div class="bg-white mt-16">
        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                                Разные
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Marketing
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Analytics
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Commerce
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Insights
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                                Полезные
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Pricing
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Documentation
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Guides
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        API Status
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                                Ссылки
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        About
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Blog
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Jobs
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Press
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Partners
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                                по делу
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Claim
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Privacy
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                        Terms
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-8 xl:mt-0">
                    <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                        Подписка
                    </h4>
                    <p class="mt-4 text-gray-500 text-base leading-6">
                        Оставьте ваш email, если хотите получать новости:
                    </p>
                    <form class="mt-4 sm:flex sm:max-w-md">
                        <input aria-label="Email address" type="email" required class="appearance-none w-full px-5 py-3 border border-gray-300 text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline transition duration-150 ease-in-out" placeholder="Enter your email" />
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                    <a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <p class="mt-8 text-base leading-6 text-gray-400 md:mt-0 md:order-1">
                    &copy; 2020 Grandcore Platform
                </p>
            </div>
        </div>
    </div>



@endsection
