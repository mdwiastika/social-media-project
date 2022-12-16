@extends('layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('feed')
    <li class="active">
    @endsection
    @section('container')
        <div class="container m-auto" id="containn">

            <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-5"> Feed </h1>

            <!-- users-->

            <div class="relative uk-visible@s" uk-slider="finite: true">

                <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                    href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
                <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                    href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                <div class="uk-slider-container pb-3 lg:mr-3">

                    <ul class="uk-slider-items uk-grid uk-grid-small">

                        <li>
                            <div
                                class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                                @if (auth()->user()->profile)
                                <img src="{{ asset('/storage/'.auth()->user()->profile) }}"
                                    class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">    
                                @else
                                <img src="assets/images/avatars/avatar-2.jpg"
                                class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                                @endif
                                <a href="/story/create"
                                    class=" bg-gray-400 p-2 rounded-full w-8 h-8 flex justify-center items-center text-white border-4 border-white absolute right-2 bottom-0 bg-blue-600">
                                    + </a>
                            </div>
                            <a href="profile.html" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                                You </a>
                        </li>
                        @foreach ($storiesUser as $story)
                            <li>
                                <a href="#story-view{{ $story->first()->user_id }}" uk-toggle>
                                    <div
                                        class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                                        @if (strpos($story->first()->image, '.mp4'))
                                            <video class="rounded-md w-full lg:h-76 object-cover" controls preload="auto">
                                                <source src="{{ asset('/storage/' . $story->first()->image) }}"
                                                    type="video/mp4">
                                            </video>
                                        @else
                                            <img src="{{ asset('/storage/' . $story->first()->image) }}"
                                                class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                                        @endif
                                    </div>
                                </a>
                                <a href="profile.html"
                                    class="block font-medium text-center text-gray-500 text-x truncate w-24">
                                    {{ $story->first()->user->username }} </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5" id="myCobaAjax">

                <!-- left sidebar-->
                <div class="space-y-5 flex-shrink-0 lg:w-7/12" id="sateSate">
                    {{-- Get result from paginatefeed with ajax request and paginate laravel --}}
                    <div class="flex justify-center mt-6 ajax-loading" style="display: none" id="toggle"
                        uk-toggle="target: #toggle ;animation: uk-animation-fade">
                        <a href="#"
                            class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                            Load more ..</a>
                    </div>
                </div>

                <!-- right sidebar-->
                <div class="lg:w-5/12">

                    <div class="shadow-md rounded-md overflow-hidden">

                        <div
                            class="border-b border-gray-100 flex items-baseline justify-between py-4 px-6">
                            <h2 class="font-semibold text-lg">Who to follow</h2>
                            <a href="#"> Refresh</a>
                        </div>

                        @foreach ($randomFollows as $randfollow)
                            <div
                                class="bg-white divide-opacity-50 divide-y px-4">

                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="profile.html">
                                            @if ($randfollow->profile)
                                            <img src="{{ asset('/storage/'.$randfollow->profile) }}"
                                            class="bg-gray-200 rounded-full w-10 h-10">
                                            @else
                                            <img src="assets/images/avatars/avatar-2.jpg"
                                            class="bg-gray-200 rounded-full w-10 h-10">
                                            @endif
                                            
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold"> {{ $randfollow->name }} </span>
                                            <span class="block capitalize text-sm"> {{ $randfollow->username }} </span>
                                        </div>
                                    </div>
                                    <form action="{{ route('follow.store', $randfollow) }}" method="post" class="my-2">
                                        @csrf
                                        <button>
                                            <a
                                                class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600">
                                                Follow
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="mt-5" uk-sticky="offset:28; bottom:true ; media @m">
                        <div class="shadow-md rounded-md overflow-hidden">

                            <div
                                class="border-b border-gray-100 flex items-baseline justify-between py-4 px-6">
                                <h2 class="font-semibold text-lg">Latest</h2>
                                <a href="explore.html"> See all</a>
                            </div>

                            <div class="bg-white grid grid-cols-2 gap-2 p-3 uk-link-reset">
                                @foreach ($latestPosts as $singlePost)
                                    @if ($loop->index == 0)
                                        <div
                                            class="bg-red-500 max-w-full h-32 mb-8 rounded-lg relative overflow-hidden uk-transition-toggle">
                                            <a href="#story-modal" uk-toggle>
                                                <img src="{{ asset('/storage/' . unserialize(base64_decode($singlePost->image))[0]) }}"
                                                    class="w-full h-full absolute object-cover inset-0">
                                            </a>
                                            <div
                                                class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                                                <a href="#"> <i class="uil-heart"></i> 150 </a>
                                                <a href="#"> <i class="uil-heart"></i> 30 </a>
                                            </div>
                                        </div>
                                    @elseif ($loop->index == 1)
                                        <div
                                            class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle">
                                            <a href="#story-modal" uk-toggle>
                                                <img src="{{ asset('/storage/' . unserialize(base64_decode($singlePost->image))[0]) }}"
                                                    class="w-full h-full absolute object-cover inset-0">
                                            </a>
                                            <div
                                                class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                                                <a href="#"> <i class="uil-heart"></i> 150 </a>
                                                <a href="#"> <i class="uil-heart"></i> 30 </a>
                                            </div>
                                        </div>
                                    @elseif($loop->index == 2)
                                        <div
                                            class="bg-red-500 max-w-full h-32 -mt-8 rounded-lg relative overflow-hidden uk-transition-toggle">
                                            <a href="#story-modal" uk-toggle>
                                                <img src="{{ asset('/storage/' . unserialize(base64_decode($singlePost->image))[0]) }}"
                                                    class="w-full h-full absolute object-cover inset-0">
                                            </a>
                                            <div
                                                class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                                                <a href="#"> <i class="uil-heart"></i> 150 </a>
                                                <a href="#"> <i class="uil-heart"></i> 30 </a>
                                            </div>
                                        </div>
                                    @elseif($loop->index == 3)
                                        <div
                                            class="bg-red-500 max-w-full h-32 -mt-8 rounded-lg relative overflow-hidden uk-transition-toggle">
                                            <a href="#story-modal" uk-toggle>
                                                <img src="{{ asset('/storage/' . unserialize(base64_decode($singlePost->image))[0]) }}"
                                                    class="w-full h-full absolute object-cover inset-0">
                                            </a>
                                            <div
                                                class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                                                <a href="#"> <i class="uil-heart"></i> 150 </a>
                                                <a href="#"> <i class="uil-heart"></i> 30 </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- Story modal -->
        <div id="story-modal" class="uk-modal-container" uk-modal>
            <div class="uk-modal-dialog story-modal">
                <button
                    class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                    type="button" uk-close></button>

                <div class="story-modal-media">
                    <img src="assets/images/post/img4.jpg" alt="" class="inset-0 h-full w-full object-cover">
                </div>
                <div class="flex-1 bg-white dark:text-gray-100">

                    <!-- post header-->
                    <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                    <img src="assets/images/avatars/avatar-2.jpg"
                                        class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                </div>
                            </a>
                            <span class="block text-lg font-semibold"> Johnson smith </span>
                        </div>
                        <a href="#">
                            <i class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        @foreach ($storiesUser as $story)
            <div id="story-view{{ $story->first()->user_id }}" class="uk-modal-container" uk-modal>
                <div class="uk-modal-dialog story-modal">
                    <button
                        class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                        type="button" uk-close></button>

                    <div class="story-modal-media">
                        <div uk-lightbox="animation: scale">
                            <div class="grid grid-cols-2">
                                @foreach ($story as $singleStory)
                                    @if (strpos($singleStory->image, '.mp4'))
                                        @if ($loop->index == 0)
                                            <a href="{{ asset('/storage/' . $singleStory->image) }}" class="col-span-2"
                                                data-caption="{{ $singleStory->content }}">
                                                <video class="rounded-md w-full lg:h-76 object-cover" controls
                                                    preload="auto">
                                                    <source src="{{ asset('/storage/' . $singleStory->image) }}"
                                                        type="video/mp4">
                                                </video>
                                            </a>
                                        @else
                                            <a href="{{ asset('/storage/' . $singleStory->image) }}"
                                                class="col-span-2 hidden" data-caption="{{ $singleStory->content }}">
                                                <video class="rounded-md w-full lg:h-76 object-cover" controls
                                                    preload="auto">
                                                    <source src="{{ asset('/storage/' . $singleStory->image) }}"
                                                        type="video/mp4">
                                                </video>
                                            </a>
                                        @endif
                                    @else
                                        @if ($loop->index == 0)
                                            <a href="{{ asset('/storage/' . $singleStory->image) }}" class="col-span-2"
                                                data-caption="{{ $singleStory->content }}">
                                                <img src="{{ asset('/storage/' . $singleStory->image) }}" alt=""
                                                    class="inset-0 h-full w-full object-cover" style="height: 600px">
                                            </a>
                                        @else
                                            <a href="{{ asset('/storage/' . $singleStory->image) }}" class="col-span-2"
                                                data-caption="{{ $singleStory->content }}">
                                                <img src="{{ asset('/storage/' . $singleStory->image) }}" alt=""
                                                    class="inset-0 h-full w-full object-cover hidden"
                                                    style="height: 600px">
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 bg-white dark:bg-gray-900 px-4">

                        <div class="flex items-center justify-between mt-4 mb-2">
                            <h3 class="font-bold text-lg"> Story </h3>
                        </div>
                        <ul class="space-y-1 -mx-1.5">
                            <li>
                                <a
                                    class="flex items-center space-x-4 hover:bg-gray-100 dark:hover:bg-gray-900 p-2 rounded-md cursor-pointer">
                                    <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                        <img src="assets/images/avatars/avatar-1.jpg"
                                            class="bg-gray-200 border border-white rounded-full w-12 h-12">
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-lg font-semibold"> {{ $story->first()->user->name }} </div>
                                        <div class="text-sm">
                                            <span> Share a photo or video </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        @endforeach
        <script>
            var page = 1;
            var resPaginate;
            const sate = document.getElementById('sateSate');
            sate.addEventListener('click', function(e) {
                if (e.target.className == "uil-thumbs-up") {
                    let user_id = e.target.parentElement.previousElementSibling.previousElementSibling.getAttribute(
                        'value');
                    let user_name = e.target.parentElement.previousElementSibling.previousElementSibling
                        .previousElementSibling.getAttribute('value')
                    let post_id = e.target.parentElement.previousElementSibling.getAttribute('value');
                    let _token = $('input[name="_token"]').val();
                    let url = '{{ route('like.add') }}';
                    let hii = e.target.previousElementSibling.value;
                    let paginatePost = e.target.previousElementSibling.previousElementSibling.value;
                    console.log(paginatePost);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            user_id: user_id,
                            user_name: user_name,
                            post_id: post_id,
                            _token: _token,
                        },
                        success: function(response) {
                            if (response) {
                                $('#' + hii).load(`/feed?page=${paginatePost} ` + '#' + hii);
                            }
                        },
                        error: function(error) {
                            console.log(JSON.stringify(error));
                        }
                    });
                } else if (e.target.className == "uil-arrow-circle-right") {
                    let post_id = e.target.parentElement.previousElementSibling.value;
                    let user_id = e.target.parentElement.previousElementSibling.previousElementSibling.value;
                    let comment_body = e.target.parentElement.previousElementSibling.previousElementSibling
                        .previousElementSibling.value;
                    let commentBoxId = e.target.parentElement.parentElement.parentElement.parentElement.getAttribute(
                        'id');
                    let getPostPaginate = e.target.nextElementSibling.value;

                    let url = '{{ route('comment.add') }}';
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            user_id: user_id,
                            post_id: post_id,
                            comment_body: comment_body,
                            _token: _token,
                        },
                        success: function(response) {
                            if (response) {
                                $('#' + commentBoxId).load(`/feed?page=${getPostPaginate} ` + '#' +
                                    commentBoxId);

                            }
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                } else if (e.target.className == "moreeee") {
                    let dots = e.target.previousElementSibling.children[0];
                    let moreText = e.target.previousElementSibling.children[1];
                    let btnText = e.target;
                    if (dots.style.display === "none") {
                        dots.style.display = "inline";
                        btnText.innerHTML = "Read more";
                        moreText.style.display = "none";
                    } else {
                        dots.style.display = "none";
                        btnText.innerHTML = "Read less";
                        moreText.style.display = "inline";
                    }
                }

            });
        </script>
        <script>
            $(document).on("click", "#arrowKirim", function(event) {
                const post_id = event.target.parentElement.previousElementSibling.previousElementSibling.value;
                const user_id = event.target.parentElement.previousElementSibling.previousElementSibling
                    .previousElementSibling.value;
                const comment_body = event.target.parentElement.previousElementSibling.value;
                let url = '{{ route('comment.add') }}';
                let _token = $('input[name="_token"]').val();
                let loadID = event.target.parentElement.parentElement.parentElement.parentElement.parentElement
                    .getAttribute('id');
                let getPostPaginate = event.target.nextElementSibling.value;
                console.log(getPostPaginate);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        user_id: user_id,
                        post_id: post_id,
                        comment_body: comment_body,
                        _token: _token,
                    },
                    success: function(response) {
                        if (response) {
                            $('#' + loadID).load(`/feed?page=${getPostPaginate} ` + '#' + loadID);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
        <script>
            $(document).on("click", "#replyCommentUser", function(event) {
                console.log(event.target);
                let comment_id = event.target.previousElementSibling.previousElementSibling.getAttribute('value');
                let comment_head = document.querySelectorAll('.comment_reply');
                let panah_head = document.querySelectorAll('.selalu-ada');
                let input_reply = event.target.previousElementSibling.previousElementSibling.children[0];
                let panah = event.target.previousElementSibling.previousElementSibling.children[2];
                console.log(panah);
                panah_head.forEach(function(panahan) {
                    panahan.classList.add("tidak-ada");
                })
                comment_head.forEach(function(reply) {
                    reply.className = 'comment_reply bg-transparent max-h-8 shadow-none';
                    reply.setAttribute("type", "hidden");
                });
                input_reply.setAttribute("type", "text");
                input_reply.focus()
                panah.classList.remove("tidak-ada");

            });
        </script>
        <script>
            $(document).on("click", "#reply-comment-class", function(event) {
                const comment_reply = event.target.parentElement.previousElementSibling.previousElementSibling.value;
                const post_id = event.target.parentElement.nextElementSibling.nextElementSibling.value;
                const user_id = event.target.parentElement.nextElementSibling.value;
                const comment_parent = event.target.parentElement.previousElementSibling.value;
                const headee = event.target.parentElement.parentElement.parentElement.parentElement.parentElement
                    .parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement
                    .getAttribute('id');
                const getPostPaginate = event.target.nextElementSibling.value
                console.log(getPostPaginate);
                let _token = $('input[name="_token"]').val();
                let url = '{{ route('comment.add') }}';
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        user_id: user_id,
                        post_id: post_id,
                        comment_reply: comment_reply,
                        comment_parent: comment_parent,
                        _token: _token,
                    },
                    success: function(response) {
                        if (response) {
                            $('#' + headee).load(`/feed?page=${getPostPaginate} ` + '#' + headee);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });


            });
        </script>
        <script>
            infinteLoadMore(page);
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() + 100 >= $(document).height()) {
                    // console.log(page);
                    page++;
                    infinteLoadMore(page);
                }
            });

            function infinteLoadMore(page) {
                $.ajax({
                        url: "?page=" + page,
                        datatype: "html",
                        type: "get",
                        beforeSend: function() {
                            $("#toggle").show()
                        }
                    })
                    .done(function(response) {
                        if (response.length == 0) {
                            $('#toggle').html("We don't have more data to display :(");
                            return;
                        }
                        $('#toggle').hide();
                        $("#toggle").before(response);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occured');
                    });
            }
        </script>
    @endsection
