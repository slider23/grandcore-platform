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
                                    <div x-show="profile_dropdown_open" @click.away="profile_dropdown_open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Dashboard
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Настройки
                                            </a>
                                            <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
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
                            <svg x-show="mobile_menu_open === true" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <div x-show="mobile_menu_open" class="block md:hidden">
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
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Your Profile</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Settings</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue-300 hover:text-white hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600" role="menuitem">Sign out</a>
                    </div>
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
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

                @yield('content')

            </div>
        </main>
    </div>



@endsection
