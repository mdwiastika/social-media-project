<style>
    .color-li-red{
        color: red;
    }
</style>
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ route('dashboard') }}"><img src="{{ asset('admin-tem/img/logo.png') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        @if (Auth::check())    
        <li class="">
            <a class="" href="{{ route('dashboard') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('/admin-tem/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                @if ($title == 'Dashboard')
                    <span class="dashboard-active">Dashboard</span>
                @else
                    <span>Dashboard</span>
                @endif
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
        @if ($active == 'table')
        <li class="mm-active">
        @else
        <li class="">
        @endif    
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i class="ti-harddrives m-auto"></i>
                </div>
                <span>Table</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="/admin/table/users" style="color: {{ $act == 'tableusers' ? 'red' : '' }}">Data Users</a></li>
                <li><a href="/admin/table/posts" style="color: {{ $act == 'tableposts' ? 'red' : '' }}">Data Posts</a></li>
                <li><a href="/admin/table/stories" style="color: {{ $act == 'tablestories' ? 'red' : '' }}">Data Stories</a></li>
                <li><a href="/admin/table/bandings" style="color: {{ $act == 'tablebandings' ? 'red' : '' }}">Data Bandings</a></li>
            </ul>
        </li>
        @endif
        @endif
    </ul>
</nav>
