@extends('layouts.main')
@section('style')
<style>
    @media (min-width: 1024px) {
        header .header_inner {
            max-width: 980px;
        }

        .pro-container {
            max-width: 860px;
        }
    }
</style>
@endsection
@section('profile')
<li class="active">
@endsection
@section('container')
    
            <div class="container pro-container m-auto">
                
                <!-- profile-cover-->
                <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

                    <div>
                        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle"> 
                            @if ($usere->profile)
                            <img src="{{ asset('/storage/'.$usere->profile) }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
                            @else
                                 <img src="{{ asset('/assets/images/avatars/avatar-2.jpg') }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
                            @endif 
                           

                            <div class="absolute -bottom-3 custom-overly1 flex justify-center pt-4 pb-7 space-x-3 text-2xl text-white uk-transition-slide-bottom-medium w-full">
                                <a href="#" class="hover:text-white">
                                    <i class="uil-camera"></i>
                                </a>
                                <a href="#" class="hover:text-white">
                                    <i class="uil-crop-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center"> 

                        <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{ $usere->name }}</h2>
                        <p class="lg:text-left mb-2 text-center  dark:text-gray-100">
                            @if ($usere->bio)
                               {{ $usere->bio }} 
                            @else
                                Saya belum menambahkan informasi
                            @endif
                             </p>

                            
                            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                                @if (Auth::user()->is($usere))
                                <a href="/user/{{ Auth::user()->username }}/edit" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Edit Profile</a>
                                <div>

                                <a href="#" class="bg-gray-300 flex h-12 h-full items-center justify-center rounded-full text-xl w-9 dark:bg-gray-700"> 
                                    <i class="icon-feather-chevron-down"></i> 
                                </a>
                                @else
                                <form action="{{ route('follow.store', $usere) }}" method="post" class="my-2">
                                    @csrf
                                    <button>
                                        <a class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">
                                            @if (Auth::user()->follows()->where('following_user_id', $usere->id)->first())
                                                Unfollow
                                                @else
                                             Follow
                                            @endif                                       
                                            
 
                                        </a>
                                    </button>
                                </form>
                                <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Send message</a>
                                <div>

                                <a href="#" class="bg-gray-300 flex h-12 h-full items-center justify-center rounded-full text-xl w-9 dark:bg-gray-700"> 
                                    <i class="icon-feather-chevron-down"></i> 
                                </a>
                                    @endif
                                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900" uk-drop="mode: click">
                              
                                  <ul class="space-y-1">
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-user-minus mr-2"></i>Unfriend
                                        </a> 
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-eye-slash  mr-2"></i>Hide Your Story
                                        </a> 
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-share-alt mr-2"></i> Share This Profile
                                        </a> 
                                    </li>
                                    <li>
                                      <hr class="-mx-2 my-2  dark:border-gray-700">
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                         <i class="uil-stop-circle mr-2"></i> Block
                                        </a> 
                                    </li>
                                  </ul>
                              
                                </div>

                                </div>

                            </div>

                            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                                <div class="flex lg:flex-row flex-col"> {{ $count2->count() }} <strong class="lg:pl-2">Posts</strong></div>
                                <a href="#story-modal99" uk-toggle>
                                    <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $usere->followers()->count() }} <strong class="lg:pl-2">Followers</strong></div>
                                </a>
                                
                                <a href="#story-modal88" uk-toggle>
                                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $usere->follows()->count() }} <strong class="lg:pl-2">Following</strong></div></a>
                            </div>
 
                    </div>

                    <div class="w-20"></div>

                </div>
              
                {{-- <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-8"> Highths </h1>
                
                <div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
                    <a href="#">
                        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full"> 
                            <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
                        </div>
                    </a>
                    <a href="#story-modal" uk-toggle>
                        <img src="{{ asset('/assets/images/post/img2.jpg') }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
                    </a>
                </div> --}}

                <div class="flex items-center justify-between mt-8 space-x-3">
                    <h1 class="flex-1 font-extrabold leading-none lg:text-2xl text-lg text-gray-900 tracking-tight uk-heading-line"><span>Explore</span></h1>
                    <div class="bg-white border border-2 border-gray-300 divide-gray-300 divide-x flex rounded-md shadow-sm dark:bg-gray-100">
                        <a href="#" class="bg-gray300 flex h-10 items-center justify-center  w-10" data-tippy-placement="top" title="Grid view"> <i class="uil-apps"></i></a>
                        <a href="#" class="flex h-10 items-center justify-center w-10" data-tippy-placement="top" title="List view"> <i class="uil-list-ul"></i></a>                        
                    </div>
                </div>

                <div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">
                   @foreach ($posts as $post)
                   @foreach (unserialize(base64_decode($post->image)) as $it)
                   @if ($loop->index == 0)
                       <div class="bg-red-500 max-w-full lg:h-64 h-40 rounded-md relative overflow-hidden uk-transition-toggle" tabindex="0"> 
                            <img src="{{ asset('/storage/'.$it) }}" class="w-full h-full absolute object-cover inset-0">

                            <div class="absolute bg-black bg-opacity-40 bottom-0 flex h-full items-center justify-center space-x-5 text-lg text-white uk-transition-scale-up w-full">   
                                <a href="#story-modal{{ $post->id }}a" uk-toggle class="flex items-center"> <ion-icon name="heart" class="mr-1"></ion-icon> 150 </a>
                                <a href="#story-modal{{ $post->id }}a" uk-toggle class="flex items-center"> <ion-icon name="chatbubble-ellipses" class="mr-1"></ion-icon> 30 </a>
                                <a href="#story-modal{{ $post->id }}a" uk-toggle class="flex items-center"> <ion-icon name="pricetags" class="mr-1"></ion-icon> 12  </a>
                            </div>

                        </div>
                   @else
                       
                   @endif
                       
                   @endforeach
                       
                   @endforeach
                        
                </div>

                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white"> Load more ..</a>
                </div>


            </div>

        </div>

    </div>


   <!-- Story modal -->
   @foreach ($posts as $post)
   <div id="story-modal{{ $post->id }}a" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog story-modal">
        <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white" type="button" uk-close></button>

            <div class="story-modal-media">
                <div uk-lightbox>
                    <div class="grid grid-cols-2">
                @foreach (unserialize(base64_decode($post->image)) as $imm)
                @if (strpos($imm, ".mp4"))
                   @if ($loop->index==0)
                   <a href="{{ asset('/storage/'.$imm) }}" class="col-span-2">  
                    <video class="rounded-md w-full lg:h-76 object-cover" controls>
                        <source src="{{ asset('/storage/'.$imm) }}" type="video/mp4">
                    </video>
                </a>
                   @else
                   <a href="{{ asset('/storage/'.$imm) }}" class="col-span-2 hidden">  
                    <video class="rounded-md w-full lg:h-76 object-cover" controls>
                        <source src="{{ asset('/storage/'.$imm) }}" type="video/mp4">
                    </video>
                </a>   
                   @endif 
                @else
                    @if ($loop->index==0)
                        <a href="{{ asset('/storage/'.$imm) }}" class="col-span-2">
                            <img src="{{ asset('/storage/'.$imm) }}" alt=""  class="inset-0 h-full w-full object-cover" style="height: 600px">
                        </a>
                    @else
                        <a href="{{ asset('/storage/'.$imm) }}" class="col-span-2">
                            <img src="{{ asset('/storage/'.$imm) }}" alt=""  class="inset-0 h-full w-full object-cover hidden" style="height: 600px">
                        </a>
                    @endif 
                @endif
               
                
                @endforeach
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100" id="commentLoad{{ $post->id }}">
            
                <!-- post header-->
                <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                    <div class="flex flex-1 items-center space-x-4">
                        <a href="#">
                            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                <img src="assets/images/avatars/avatar-2.jpg"
                                    class="bg-gray-200 border border-white rounded-full w-8 h-8">
                            </div>
                        </a>
                        <span class="block text-lg font-semibold"> {{ $post->user->name }} </span>
                    </div>
                    <a href="#"> 
                        <i  class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                    </a>
                </div>
                <div class="story-content p-4" data-simplebar id="kotakUntukComent{{ $post->id }}">

                    <p> {{ $post->content }} </p>
                    
                    <div class="py-4 ">
                        <hr class="-mx-4 my-3">
                        <div class="flex items-center space-x-3"> 
                            
                        </div>
                    </div>

                <div class="-mt-1 space-y-1">
                    @foreach ($post->comments as $item)
                    <div class="flex flex-1 items-center space-x-2">
                        <img src="assets/images/avatars/avatar-2.jpg" class="rounded-full w-8 h-8">
                        <div class="flex-1 p-2">
                            <form action="">
                                <style>
                                    .sini-sini{
                                        display: flex;
                                    }
                                    .tidak-ada{
                                        display: none;
                                    }
                                    #arrowKirim:hover{
                                        cursor: pointer;
                                    }
                                </style>
                                <div class="sini-sini">
                                    <input type="hidden" name="comment_reply" id="comment_reply" placeholder="Add your Comment.." class="comment_reply shadow-none" style="background-color: rgba(152, 137, 137, 0.5); color: white; display: inline">
                                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $item->id }}">
                                    <div class="tidak-ada selalu-ada" id="reply-comment-class">
                                        <span class="uil-arrow-circle-right" style="z-index: 77; font-size: 30px; text-align: center; cursor: pointer;"></span>
                                        <input type="hidden" value="{{ $post->user->username }}">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                                <strong>{{ $item->user->username }} </strong>{{ $item->body }}
                                <span class="fas fa-reply" style="cursor: pointer" id="replyCommentUser"></span>
                            </form>
                        </div>
                    </div>
                    @foreach ($item->replies as $reply)
                                <div class="flex flex-1 items-center space-x-2" style="margin-left: 30px">
                                    <img src="assets/images/avatars/avatar-2.jpg" class="rounded-full" style="width: 20px; height: 20px">
                                    <div class="flex-1 p-2">
                                       <strong>{{ $reply->user->username }} </strong>{{ $reply->body }}
                                    </div>
                                </div>
                                @endforeach
                    @endforeach
                </div>


                </div>
                <div class="p-3 border-t dark:border-gray-600">
                    <div class="bg-gray-200 dark:bg-gray-700 rounded-full rounded-md relative">
                        <form action="">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                            <input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-8 shadow-none">
                        <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                            <i class="uil-arrow-circle-right" id="arrowKirim"></i>
                            <input type="hidden" value="{{ $post->user->username }}">
                        </div>
                        </form>
                        
                    </div>
                </div>

            </div>

    </div>
</div>
   @endforeach
   <div id="story-modal88" class="" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white" type="button" uk-close></button>
        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:boSrder-gray-800">
                <h2 class="font-semibold text-lg">Following</h2>
            </div>
           
            <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                @foreach ($usere->follows()->get() as $user)
                   <div class="flex items-center justify-between py-3">
                    <div class="flex flex-1 items-center space-x-4">
                        <a href="profile.html">
                            <img src="/assets/images/avatars/avatar-2.jpg" class="bg-gray-200 rounded-full w-10 h-10">
                        </a>
                        <div class="flex flex-col">
                            <span class="block capitalize font-semibold"> {{ $user->name }} </span>
                            <span class="block capitalize text-sm"> {{ $user->pivot->created_at->diffForHumans() }} </span>
                        </div>
                    </div>
                    
                    <a href="#" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800"> Unfollow </a>
                </div> 
                @endforeach
                

            </div>

        </div>

    </div>
</div>
<div id="story-modal99" class="" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white" type="button" uk-close></button>
        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                <h2 class="font-semibold text-lg">Followers</h2>
            </div>
           
            <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                @foreach ($usere->followers()->get() as $user2)
                   <div class="flex items-center justify-between py-3">
                    <div class="flex flex-1 items-center space-x-4">
                        <a href="profile.html">
                            <img src="/assets/images/avatars/avatar-2.jpg" class="bg-gray-200 rounded-full w-10 h-10">
                        </a>
                        <div class="flex flex-col">
                            <span class="block capitalize font-semibold"> {{ $user2->name }} </span>
                            <span class="block capitalize text-sm"> {{ $user2->pivot->created_at->diffForHumans() }} </span>
                        </div>
                    </div>
                    
                    <a href="#" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800"> Delete </a>
                </div> 
                @endforeach
                

            </div>

        </div>

    </div>
</div>
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
        let usernameLoad = event.target.nextElementSibling.value;
        console.log(usernameLoad);
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
                    $('#' + loadID).load(`/profile/${usernameLoad} ` + '#' + loadID);
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
        let comment_id = event.target.previousElementSibling.previousElementSibling.getAttribute('value');
        let comment_head = document.querySelectorAll('.comment_reply');
        let panah_head = document.querySelectorAll('.selalu-ada');
        let input_reply = event.target.previousElementSibling.previousElementSibling.children[0];
        let panah = event.target.previousElementSibling.previousElementSibling.children[2];
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
        const usernameLoad = event.target.nextElementSibling.value;
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
                    $('#' + headee).load(`/profile/${usernameLoad} ` + '#' + headee);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });


    });
</script>
    @endsection