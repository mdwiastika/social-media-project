<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link href="{{ asset('/assets/images/favicon.png') }}" rel="icon" type="image/png">

    <!-- Basic Page Needs
    ================================================== -->
    <title>SOMED | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Instello - Sharing Photos platform HTML Template">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/tailwind.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    @yield('style')
</head>

<body>

    <div id="wrapper">
        @include('partials.sidebar')
        <div class="main_content">
            @include('partials.header')
            @yield('container')
            <div id="story-modal66" class="" uk-modal>
                <div class="uk-modal-dialog">
                    <button
                        class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                        type="button" uk-close></button>
                    <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                        <div
                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                            <h2 class="font-semibold text-lg">Following</h2>
                        </div>

                        <div
                            class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                            @foreach (Auth::user()->follows()->get() as $user)
                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="profile.html">
                                            <img src="/assets/images/avatars/avatar-2.jpg"
                                                class="bg-gray-200 rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold"> {{ $user->name }} </span>
                                            <span class="block capitalize text-sm">
                                                {{ $user->pivot->created_at->diffForHumans() }} </span>
                                        </div>
                                    </div>

                                    <a href="#"
                                        class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800">
                                        Unfollow </a>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
            <div id="story-modal77" class="" uk-modal>
                <div class="uk-modal-dialog">
                    <button
                        class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                        type="button" uk-close></button>
                    <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                        <div
                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                            <h2 class="font-semibold text-lg">Followers</h2>
                        </div>

                        <div
                            class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                            @foreach (Auth::user()->followers()->get() as $user2)
                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="profile.html">
                                            <img src="/assets/images/avatars/avatar-2.jpg"
                                                class="bg-gray-200 rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold"> {{ $user2->name }} </span>
                                            <span class="block capitalize text-sm">
                                                {{ $user2->pivot->created_at->diffForHumans() }} </span>
                                        </div>
                                    </div>

                                    <a href="#"
                                        class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800">
                                        Delete </a>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
            @yield('script')
            <!-- Scripts
            ================================================== -->
            <script src="{{ asset('/assets/js/custom.js') }}"></script>
            <script src="{{ asset('/assets/js/tippy.all.min.js') }}"></script>
            <script src="{{ asset('/assets/js/uikit.js') }}"></script>
            <script src="{{ asset('/assets/js/simplebar.js') }}"></script>
            {{-- <script src="{{ asset('assets/unpkg.com/ionicons@5.2.3/dist/ionicons.js') }}"></script> --}}
            <script>
        
                (function (window, document, undefined) {
                    'use strict';
                    if (!('localStorage' in window)) return;
                    var nightMode = localStorage.getItem('gmtNightMode');
                    if (nightMode) {
                        document.documentElement.className += ' dark';
                    }
                })(window, document);
            
            
                (function (window, document, undefined) {
            
                    'use strict';
            
                    // Feature test
                    if (!('localStorage' in window)) return;
            
                    // Get our newly insert toggle
                    var nightMode = document.querySelector('#night-mode');
                    if (!nightMode) return;
            
                    // When clicked, toggle night mode on or off
                    nightMode.addEventListener('click', function (event) {
                        event.preventDefault();
                        document.documentElement.classList.toggle('dark');
                        if (document.documentElement.classList.contains('dark')) {
                            localStorage.setItem('gmtNightMode', true);
                            return;
                        }
                        localStorage.removeItem('gmtNightMode');
                    }, false);
            
                })(window, document);
            </script>
</body>

</html>
