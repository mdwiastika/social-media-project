<style>
    .text-nonaktif {
        color: red;
    }
</style>
<div class="sidebar">
    <div class="sidebar_header border-b border-gray-200 from-gray-100 to-gray-50 bg-gradient-to-t  uk-visible@s">
        <a href="#">
            <img src={{ asset('/assets/images/logo.png') }}>
            <img src={{ asset('/assets/images/logo-light.png') }} class="logo_inverse">
        </a>
        <!-- btn night mode -->
        <a href="#" id="night-mode" class="btn-night-mode" data-tippy-placement="left" title="Switch to dark mode"></a>
    </div>
    <div class="border-b border-gray-20 flex justify-between items-center p-3 pl-5 relative uk-hidden@s">
        <h3 class="text-xl"> Navigation </h3>
        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: sidebar-active"></span>
    </div>
    <div class="sidebar_inner" data-simplebar>
        <div class="flex flex-col items-center my-6 uk-visible@s">
            <div
                class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                @if (auth()->user()->profile)
                    <img src={{ asset('storage/' . auth()->user()->profile) }}
                        class="bg-gray-200 border-4 border-white rounded-full w-full h-full object-cover">
                @else
                    <img src={{ asset('/assets/images/avatars/avatar-2.jpg') }}
                        class="bg-gray-200 border-4 border-white rounded-full w-full h-full object-cover">
                @endif

            </div>
            <a href="/user/{{ Auth::user()->username }}"
                class="text-xl font-medium capitalize mt-4 uk-link-reset">{{ auth()->user()->name }}
            </a>
            <a href=""
                class="text-xl font-medium capitalize mt-4 text-nonaktif">{{ auth()->user()->active == 'false' ? 'Akun Di Nonaktifkan' : '' }}</a>
            <div class="flex justify-around w-full items-center text-center uk-link-reset text-gray-800 mt-6">
                @if (auth()->user()->active == 'true')
                    <div>
                        <a href="#">
                            <strong>Post</strong>
                            <div>{{ $count->count() }}</div>
                        </a>
                    </div>
                    <div>
                        <a href="#story-modal66" uk-toggle>
                            <strong>Following</strong>
                            <div> {{ Auth::user()->follows->count('user_id') }}</div>
                        </a>
                    </div>
                    <div>
                        <a href="#story-modal77" uk-toggle>
                            <strong>Followers</strong>
                            <div> {{ Auth::user()->followers->count('user_id') }}</div>
                        </a>
                    </div>
                @else
                    <div>
                        <a href="#">
                            <strong>Post</strong>
                            <div>0</div>
                        </a>
                    </div>
                    <div>
                        <a href="#story-modal66" uk-toggle>
                            <strong>Following</strong>
                            <div> 0</div>
                        </a>
                    </div>
                    <div>
                        <a href="#story-modal77" uk-toggle>
                            <strong>Followers</strong>
                            <div> 0</div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <hr class="-mx-4 -mt-1 uk-visible@s">
        <ul>
            @if (auth()->user()->active == 'true')
                <li>
                    @yield('feed')
                    <a href="/feed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" style="transform: ;msFilter:;">
                            <path
                                d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z">
                            </path>
                        </svg>
                        <span> Feed </span> </a>
                </li>
                <li>
                    @yield('explore')
                    <a href="/explore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" style="transform: ;msFilter:;">
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                            </path>
                            <path d="m8 16 5.991-2L16 8l-6 2z"></path>
                        </svg>
                        <span> Explore </span> </a>
                </li>
                <li>
                    @yield('messages')
                    <a href="/chat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h1zM4 8h12v8h-5.277L7 18.234V16H4V8z">
                            </path>
                            <path
                                d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z">
                            </path>
                        </svg>
                        <span> Messages </span> <span class="nav-tag"> {{ $unreadMessage }}</span> </a>
                </li>
                <li>
                    @yield('trending')
                    <a href="/trending">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M16.5 8c0 1.5-.5 3.5-2.9 4.3.7-1.7.8-3.4.3-5-.7-2.1-3-3.7-4.6-4.6-.4-.3-1.1.1-1 .7 0 1.1-.3 2.7-2 4.4C4.1 10 3 12.3 3 14.5 3 17.4 5 21 9 21c-4-4-1-7.5-1-7.5.8 5.9 5 7.5 7 7.5 1.7 0 5-1.2 5-6.4 0-3.1-1.3-5.5-2.4-6.9-.3-.5-1-.2-1.1.3">
                            </path>
                        </svg>
                        <span> Trending </span> </a>
                </li>
                <li>
                    @yield('marketplace')
                    <a href="/product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                            </path>
                        </svg>
                        <span> Marketplace </span> </a>
                </li>
                <li>
                    @yield('profile')
                    <a href="/profile/{{ auth()->user()->username }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: currentColor;transform: ;msFilter:;">
                            <path
                                d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                            </path>
                        </svg>
                        <span> My Profile </span> </a>
                </li>
                <li>
                    <hr class="my-2">
                </li>
                <li>
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="display: inline-block;">
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;">
                                    <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
                                    <path
                                        d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z">
                                    </path>
                                </svg>
                                <span> Logout </span>
                            </a>
                        </button>
                    </form>
                </li>
            @else
                <li>
                    @yield('profile')
                    <a href="/uji-banding/create">
                        <i class="fa-regular fa-user fa-xl" style="width: 20px"></i>
                        <span> Uji Banding </span> </a>
                </li>
                <li>
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="display: inline-block;">
                            <a>
                                <svg style="display: inline-block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span> Logout </span>
                            </a>
                        </button>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</div>
