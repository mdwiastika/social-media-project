<div class="sidebar">
    <div class="sidebar_header border-b border-gray-200 from-gray-100 to-gray-50 bg-gradient-to-t  uk-visible@s"> 
        <a href="#">
            <img src={{ asset("/assets/images/logo.png") }}>
            <img src={{ asset("/assets/images/logo-light.png") }} class="logo_inverse">
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
                <img src={{ asset("storage/". auth()->user()->profile) }}
                class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
                @else
                    <img src={{ asset("/assets/images/avatars/avatar-2.jpg") }}
                    class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
                @endif
                
            </div>
            <a href="/user/{{ Auth::user()->username }}" class="text-xl font-medium capitalize mt-4 uk-link-reset">{{ auth()->User()->name }}
            </a>
            <div class="flex justify-around w-full items-center text-center uk-link-reset text-gray-800 mt-6">
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
            </div>
        </div>
        <hr class="-mx-4 -mt-1 uk-visible@s">
        <ul>
            <li>
                @yield('feed')
                <a href="/feed"> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg> 
                    <span> Feed </span> </a> 
            </li>
            <li>
                @yield('explore')
                <a href="/explore"> 
                    <i class="fa-regular fa-compass" style="width: 20px"></i>
                    <span> Explore </span> </a> 
            </li>
            <li>
            @yield('messages')
                <a href="/chat"> 
                    <i class="fa-regular fa-comments"></i>
                        <span> Messages </span> <span class="nav-tag"> 3</span>  </a> 
            </li>
            <li>
                @yield('trending')
                <a href="/trending"> 
                    <i class="fa-solid fa-chart-column" style="width: 20px"></i>
                    <span> Trending </span> </a> 
            </li>
            <li>
                @yield('profile')
                <a href="/profile/{{ auth()->user()->username }}"> 
                    <i class="fa-regular fa-user fa-xl" style="width: 20px"></i>
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
                    <svg style="display: inline-block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                      </svg>
                          <span> Logout </span>
                        </a>
                        </button>
                </form>
            </li>
        </ul>
    </div>
</div>