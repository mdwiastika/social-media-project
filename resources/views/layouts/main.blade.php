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
    <link rel="stylesheet" href="{{ asset('/assets/toastr/toastr.css') }}">
    <script src="{{ asset('/assets/toastr/toastr.js') }}"></script>
    @if (request()->is('payment'))
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-tpYRzAqM1pmeORCI"></script>
    @endif

    @yield('style')
</head>

<body>

    <div id="wrapper">
        @include('partials.sidebar')
        <div class="main_content">
            @include('partials.header')
            @yield('container')
            @if (request()->is('profile/'.auth()->user()->username))
            <div id="coin-modal" class="uk-modal-container" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <h2 class="uk-modal-title">Top Up Coins</h2>
                    <div class="uk-grid-small uk-child-width-1-4@s uk-text-center" uk-grid>
                       @foreach ($coins as $coin)
                       <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 25px; fill: gold; display: inline-block"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg>
                            {{ $coin->coin }}
                            <form action="/payment" method="POST">
                                @csrf
                                <input type="hidden" name="coin" value="{{ $coin->coin }}">
                                <input type="hidden" name="name" value="{{ $coin->coin }} Coin">
                                <input type="hidden" name="id_topup" value="K-000{{ $coin->id }}">
                                <input type="hidden" name="price" value="{{ $coin->price }}">
                                <h2 class="mt-1 uk-text-danger">Rp {{ number_format($coin->price, 0, '.', ',') }}</h2>
                                <button type="submit">Pay!</button>
                            </form>
                        </div>
                    </div>
                       @endforeach
                    </div>
                </div>
            </div>
            @endif
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
                                    <form action="{{ route('follow.store', $user) }}" method="POST" id="follow_list">
                                        @csrf
                                        <button type="submit"
                                            class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800">
                                            Unfollow </button>
                                    </form>
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
            @if (request()->is('payment'))

            <script type="text/javascript">
                // For example trigger on button clicked, or any time you need
                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function () {
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay('{{ $snapToken }}');
                    // customer will be redirected after completing payment pop-up
                });
                payButton.click();
                </script>
            @endif
</body>

</html>
