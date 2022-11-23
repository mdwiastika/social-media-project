<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area d-flex align-items-center">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here...">
                            </div>
                            <button type="submit"> <img src="img/icon/icon_search.svg" alt="">
                            </button>
                        </form>
                    </div>
                    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="profile_info">
                        @if (Auth::check())    
                        <img src="{{ asset('/admin-tem/img/client_img.png') }}" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>{{ auth()->user()->role }} </p>
                                <h5>{{ auth()->user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="bg-transparent border-0 p-0 text-danger">Log Out </button>
                                </form>
                            </div>
                        </div>
                        @else
                        <img src="{{ asset('/admin-tem/img/client_img.png') }}" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_info_details">
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>