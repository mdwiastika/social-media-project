<header>
    <div class="header_inner">
        <div class="left-side">
            <!-- Logo -->
            <div id="logo" class=" uk-hidden@s">
                <a href="home">
                    <img src="/assets/images/logo-mobile.png" alt="">
                    <img src="/assets/images/logo-mobile-light.png" class="logo_inverse">
                </a>
            </div>

            <div class="triger" uk-toggle="target: #wrapper ; cls: sidebar-active">
                <i class="uil-bars"></i>
            </div>
            @if (request()->path() == 'explore')
            <div class="header_search">
                <input type="text" id="searchUser" placeholder="Search..">
                <div class="icon-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        @endif

        </div>
        <div class="right-side lg:pr-4">
             <!-- upload -->
            <a href="/create"
                class="bg-pink-600 flex font-bold hidden hover:bg-fuchsia-500 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-1 rounded shadow text-white">
                <ion-icon name="add-circle" class="-mb-1
                 mr-1 opacity-90 text-xl uilus-circle"></ion-icon> Upload
            </a>
             <!-- upload dropdown box -->
                                    
             <!-- Notification -->

             {{-- <a href="#" class="header-links-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </a>
            <div uk-drop="mode: click;offset: 4" class="header_dropdown">
                <h4
                    class="-mt-5 -mx-5 bg-gradient-to-t from-gray-100 to-gray-50 border-b font-bold px-6 py-3">
                    Notification </h4>
                <ul class="dropdown_scrollbar" data-simplebar>
                    <li>
                        <a href="#">
                            <div class="drop_avatar"> <img src={{ asset("/assets/images/avatars/avatar-1.jpg") }} alt="">
                            </div>
                            <div class="drop_content">
                                <p> <strong>Adrian Mohani</strong>  Lorem ipsum dolor cursus
                                    <span class="text-link"> Adipiscing massa convallis  </span>
                                </p>
                                <span class="time-ago"> 2 hours ago </span>
                            </div>
                        </a>
                    </li>
                </ul>
                <a href="#" class="see-all">See all</a>
            </div> --}}

            <!-- Messages -->

            <a href="/chat" class="header-links-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </a>
            <div uk-drop="mode: click;offset: 4" class="header_dropdown">
                <h4
                    class="-mt-5 -mx-5 bg-gradient-to-t from-gray-100 to-gray-50 border-b font-bold px-6 py-3">
                    Messages </h4>
                <ul class="dropdown_scrollbar" data-simplebar>
                    <li>
                        <a href="#">
                            <div class="drop_avatar"> 
                                @if (auth()->user()->profile)
                                <img src={{ asset("/storage/".auth()->user()->profile) }} alt="">
                                    
                                @else
                                    
                                <img src={{ asset("/assets/images/avatars/avatar-2.jpg") }} alt="">
                                @endif
                            </div>
                            <div class="drop_content">
                                <strong> John menathon </strong> <time> 6:43 PM</time>
                                <p> Lorem ipsum dolor sit amet, consectetur </p>
                            </div>
                        </a>
                    </li>
                </ul>
                <a href="#" class="see-all">See all</a>
            </div>

            <!-- profile -->

            <a href="#">
                @if (auth()->user()->profile)
                <img src={{ asset("/storage/".auth()->user()->profile) }} class="header-avatar" alt="">
                @else
                <img src={{ asset("/assets/images/avatars/avatar-2.jpg") }} class="header-avatar" alt="">
                @endif
            </a>
            <div uk-drop="mode: click;offset:9" class="header_dropdown profile_dropdown border-t">
                <ul>
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="display: inline-block;">
                            <li><a> Log Out</a></li>
                            </button>
                    </form>
                </ul>
            </div>

        </div>
    </div>
</header>