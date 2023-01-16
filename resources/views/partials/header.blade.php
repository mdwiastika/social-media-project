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
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
      @endif

    </div>
    <div class="right-side lg:pr-4">
      @if (auth()->user()->active == 'true')
        <!-- upload -->
        <a href="/create"
          class="bg-pink-600 flex font-bold hidden hover:bg-fuchsia-500 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-1 rounded shadow text-white">
          <ion-icon name="add-circle" class="-mb-1
                 mr-1 opacity-90 text-xl uilus-circle"></ion-icon>
          Upload
        </a>
        <!-- upload dropdown box -->

        <!-- Notification -->
        @if (request()->is('profile/' . auth()->user()->username))
          <a href="#coin-modal" uk-tooltip="title:Top-up" uk-toggle class="bg-gray-400 px-2 py-1 border-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
              style="fill: gold; width: 9px; display: inline-block; margin-top: -10px">
              <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
              style="width: 20px; fill: gold; display: inline-block">
              <path
                d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z" />
            </svg>
            <h1 class="uk-display-inline-block uk-margin-small-left text-white">
              {{ number_format(auth()->user()->coin, 0, ',', '.') }}</h1>
          </a>
        @endif

        <!-- Messages -->

        <a href="/chat" class="header-links-item">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
          </svg>
        </a>
        <div uk-drop="mode: click;offset: 4" class="header_dropdown">
          <h4 class="-mt-5 -mx-5 bg-gradient-to-t from-gray-100 to-gray-50 border-b font-bold px-6 py-3">
            Messages </h4>
          <ul class="dropdown_scrollbar" data-simplebar>
            <li>
              <a href="#">
                <div class="drop_avatar">
                  @if (auth()->user()->profile)
                    <img src={{ asset('/storage/' . auth()->user()->profile) }} alt="">
                  @else
                    <img src={{ asset('/assets/images/avatars/avatar-2.jpg') }} alt="">
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
            <img src={{ asset('/storage/' . auth()->user()->profile) }} class="header-avatar" alt="">
          @else
            <img src={{ asset('/assets/images/avatars/avatar-2.jpg') }} class="header-avatar" alt="">
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
      @endif
    </div>
  </div>
</header>
