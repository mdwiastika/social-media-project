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

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Jumlah User</p>
                                        <h3><span class="counter">{{ $user_count }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn">All</a>
                                    <div id="bar1" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="100"></span>
                                    </div>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Jumlah Postingan</p>
                                        <h3><span class="counter">{{ $post_count }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn yellow_btn">All</a>
                                    <div id="bar2" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="100"></span>
                                    </div>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Jumlah Story</p>
                                        <h3><span class="counter">{{ $story_count }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn green_btn">All</a>
                                    <div id="bar3" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="100"></span>
                                    </div>
                                </div>
                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Jumlah Uji Banding User</p>
                                        <h3><span class="counter">{{ $banding_count }}</span> </h3>
                                    </div>
                                    <a href="#" class="notification_btn purple_btn">All</a>
                                    <div id="bar4" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="100"></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection