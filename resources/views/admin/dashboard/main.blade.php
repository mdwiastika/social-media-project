@extends('admin.layout.app')
@section('content')
<div class="container-fluid p-0 ">
    <div class="row ">
        <div class="col-lg-12">
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap">

                                {{-- <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Kas Masuk</p>
                                        <h3>Rp <span class="counter">{{ number_format($kas_masuk, 0, '.',',') }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn">All</a>
                                    <div id="bar1" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="95"></span>
                                    </div>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Kas Keluar</p>
                                        <h3>Rp <span class="counter">{{ number_format($kas_keluar, 0, '.',',') }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn yellow_btn">All</a>
                                    <div id="bar2" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="65"></span>
                                    </div>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Saldo Akhir</p>
                                        <h3>Rp <span class="counter">{{ number_format($total_kas, 0, '.',',') }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn green_btn">All</a>
                                    <div id="bar3" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="75"></span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection