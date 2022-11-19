@extends('layouts.main')
@section('style')
<style>
    @media (min-width: 1024px) {
        .container {
            max-width: 950px !important;
            padding-top: 30px !important;
        }
    }
</style>
@endsection
@section('explore')
<li class="active">
@endsection
@section('container')
            <div class="container m-auto">

                <h1 class="lg:lg:text-2xl text-lg text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-3"> Explore </h1>

                <div class="lg:m-0 -mx-5 flex justify-between items-center py-2 relative space-x-3 dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95; media : @m ; media @m">
                </div>
                
                <div class="grid lg:grid-cols-4 grid-cols-2 gap-2 hover:text-yellow-700 uk-link-reset" id="getUser">
                    
                    {{-- <div>
                        <div class="bg-yellow-400 max-w-full lg:h-64 h-40 rounded-md relative overflow-hidden shadow-sm">
                            <div class="absolut absolute bottom-0 flex items-center justify-between px-4 py-3 space-x-2 text-white w-full custom-overly1">   
                                <a href="#">Monroe  </a>  
                                <div class="flex space-x-3">  
                                  <a href="#" class="flex items-center"> <ion-icon name="heart" class="mr-1 md hydrated" role="img" aria-label="heart"></ion-icon>  150 </a>
                                  <a href="#" class="flex items-center"> <ion-icon name="chatbubble-ellipses" class="mr-1 md hydrated" role="img" aria-label="chatbubble ellipses"></ion-icon> 30 </a>         
                                </div>        
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Load more-->
                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white"> Load more ..</a>
                </div>

            </div>

        </div>

    </div>


    <!-- Story modal -->
    <div id="story-modal" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog story-modal">
            <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white" type="button" uk-close></button>

                <div class="story-modal-media">
                    <img src="assets/images/post/img4.jpg" alt=""  class="inset-0 h-full w-full object-cover">
                </div>
                <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100">
                
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
                            <i  class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                        </a>
                    </div>
                    <div class="story-content p-4" data-simplebar>

                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                        
                        <div class="py-4 ">
                            <div class="flex justify-around">
                                <a href="#" class="flex items-center space-x-3">
                                    <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Like</div>
                                </a>
                                <a href="#" class="flex items-center space-x-3">
                                    <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Comment</div>
                                </a>
                                <a href="#" class="flex items-center space-x-3">
                                    <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Share</div>
                                </a>
                            </div>
                            <hr class="-mx-4 my-3">
                            <div class="flex items-center space-x-3"> 
                                <div class="flex items-center">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white">
                                    <img src="assets/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                                    <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                                </div>
                                <div>
                                    Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                                </div>
                            </div>
                        </div>

                    <div class="-mt-1 space-y-1">
                        <div class="flex flex-1 items-center space-x-2">
                            <img src="assets/images/avatars/avatar-2.jpg" class="rounded-full w-8 h-8">
                            <div class="flex-1 p-2">
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            </div>
                        </div>

                        <div class="flex flex-1 items-center space-x-2">
                            <img src="assets/images/avatars/avatar-4.jpg" class="rounded-full w-8 h-8">
                            <div class="flex-1 p-2">
                                consectetuer adipiscing elit
                            </div>
                        </div>

                    </div>


                    </div>
                    <div class="p-3 border-t dark:border-gray-600">
                        <div class="bg-gray-200 dark:bg-gray-700 rounded-full rounded-md relative">
                            <input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-8 shadow-none">
                            <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                <a href="#"> <i class="uil-image"></i></a>
                                <a href="#"> <i class="uil-video"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
    </div>
    <script>
        const search = document.getElementById('searchUser');
        const _token = $('input[name="_token"]').val();
        const url = '{{ route('user.search') }}';
        let user_search;
        requestUser();
        $('#searchUser').on('keyup', function(){
            requestUser()
        })
        function requestUser(){
            user_search = search.value
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token:_token,
                    user_search:user_search,
                },
                success: function (response) {
                    $('#getUser').html(response);
                    // console.log(response);
                }, error: function(err){
                    console.log(err);
                }
            });
        }
    </script>
    @endsection