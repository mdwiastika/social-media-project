@foreach ($posts as $post)
                        <div id="story-modal{{ $post->id }}b" class="uk-modal-container" uk-modal>
                            <div class="uk-modal-dialog story-modal">
                                <button
                                    class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                                    type="button" uk-close></button>

                                <div class="story-modal-media">
                                    <div uk-lightbox>
                                        <div class="grid grid-cols-2">
                                            @foreach (unserialize(base64_decode($post->image)) as $imm)
                                                @if (strpos($imm, '.mp4'))
                                                    @if ($loop->index == 0)
                                                        <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2">
                                                            <video class="rounded-md w-full lg:h-76 object-cover" controls preload="auto">
                                                                <source src="{{ asset('/storage/' . $imm) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                        </a>
                                                    @else
                                                        <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2 hidden">
                                                            <video class="rounded-md w-full lg:h-76 object-cover" controls preload="auto">
                                                                <source src="{{ asset('/storage/' . $imm) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                        </a>
                                                    @endif
                                                @else
                                                    @if ($loop->index == 0)
                                                        <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2">
                                                            <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                                class="inset-0 h-full w-full object-cover"
                                                                style="height: 600px">
                                                        </a>
                                                    @else
                                                        <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2">
                                                            <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                                class="inset-0 h-full w-full object-cover hidden"
                                                                style="height: 600px">
                                                        </a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100"
                                    id="commentLoad{{ $post->id }}">

                                    <!-- post header-->
                                    <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                                        <div class="flex flex-1 items-center space-x-4">
                                            <a href="#">
                                                <div
                                                    class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                                    <img src="assets/images/avatars/avatar-2.jpg"
                                                        class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                                </div>
                                            </a>
                                            <span class="block text-lg font-semibold"> {{ $post->user->name }} </span>
                                        </div>
                                        <a href="#">
                                            <i
                                                class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
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
                                                    <img src="assets/images/avatars/avatar-2.jpg"
                                                        class="rounded-full w-8 h-8">
                                                    <div class="flex-1 p-2">
                                                        <form action="">
                                                            <style>
                                                                .sini-sini {
                                                                    display: flex;
                                                                }

                                                                .tidak-ada {
                                                                    display: none;
                                                                }

                                                                #arrowKirim:hover {
                                                                    cursor: pointer;
                                                                }
                                                            </style>
                                                            <div class="sini-sini">
                                                                <input type="hidden" name="comment_reply"
                                                                    id="comment_reply" placeholder="reply {{ $item->user->username }}"
                                                                    class="comment_reply shadow-none"
                                                                    style="background-color: rgb(253, 253, 253); color: black; display: inline; border: 1px solid black; border-radius: 5px">
                                                                <input type="hidden" id="parent_id" name="parent_id"
                                                                    value="{{ $item->id }}">
                                                                <div class="tidak-ada selalu-ada" id="reply-comment-class">
                                                                    <span class="uil-arrow-circle-right"
                                                                        style="z-index: 77; font-size: 30px; text-align: center; cursor: pointer;"></span>
                                                                    <input type="hidden" value="{{ $posts->currentPage() }}">
                                                                </div>
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ auth()->user()->id }}">
                                                                <input type="hidden" name="post_id"
                                                                    value="{{ $post->id }}">
                                                            </div>
                                                            <strong>{{ $item->user->username }}
                                                            </strong>{{ $item->body }}
                                                            <span class="fas fa-reply" style="cursor: pointer" id="replyCommentUser"></span>
                                                        </form>
                                                    </div>
                                                </div>
                                                @foreach ($item->replies as $reply)
                                                    <div class="flex flex-1 items-center space-x-2"
                                                        style="margin-left: 30px">
                                                        <img src="assets/images/avatars/avatar-2.jpg" class="rounded-full"
                                                            style="width: 20px; height: 20px">
                                                        <div class="flex-1 p-2">
                                                            <strong>{{ $reply->user->username }}
                                                            </strong>{{ $reply->body }}
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
                                                <input type="hidden" name="user_id" id="user_id"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="post_id" id="post_id"
                                                    value="{{ $post->id }}">
                                                <input type="text" placeholder="Add your Comment.."
                                                    class="bg-transparent max-h-8 shadow-none">
                                                <div
                                                    class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                                    <i class="uil-arrow-circle-right" style="cursor: pointer" id="arrowKirim"></i>
                                                    <input type="hidden" value="{{ $posts->currentPage() }}">
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- post 1-->
                        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="reess">

                            <!-- post header-->
                            <div class="flex justify-between items-center px-4 py-3">
                                <div class="flex flex-1 items-center space-x-4">
                                    <a href="#">
                                        @if ($post->user->profile)
                                            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                                <img src="{{ asset('/storage/' . $post->user->profile) }}"
                                                    class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                            </div>
                                        @else
                                            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                                <img src="assets/images/avatars/avatar-2.jpg"
                                                    class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                            </div>
                                        @endif

                                    </a>
                                    <span class="block capitalize font-semibold dark:text-gray-100">
                                        {{ $post->user->name }} </span>
                                </div>
                                <div>
                                    <a href="#"> <i
                                            class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                                    </a>
                                    <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                        uk-drop="mode: hover;pos: top-right">
                                        @if ($user == $post->user->id)
                                            <ul class="space-y-1">
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-share-alt mr-1"></i> Share
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/post/{{ $post->id }}/edit"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-edit-alt mr-1"></i> Edit Post
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-comment-slash mr-1"></i> Disable comments
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-favorite mr-1"></i> Add favorites
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="-mx-2 my-2 dark:border-gray-800">
                                                </li>
                                                <li>
                                                    <form action="/post/{{ $post->id }}" method="POST"
                                                        class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600"
                                                        style="display: inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" style="display: inline-block"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="uil-trash-alt mr-1"></i> Delete </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="space-y-1">
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-share-alt mr-1"></i> Share
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-favorite mr-1"></i> Add favorites
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="-mx-2 my-2 dark:border-gray-800">
                                                </li>
                                            </ul>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div uk-lightbox>
                                <div class="grid grid-cols-2 gap-2 p-2">
                                    @foreach (unserialize(base64_decode($post->image)) as $imm)
                                        @if (strpos($imm, '.mp4'))
                                            @if ($loop->first)
                                                <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2">
                                                    <video class="rounded-md w-full lg:h-76" controls preload="none">
                                                        <source src="{{ asset('/storage/' . $imm) }}" type="video/mp4">
                                                        <source src="{{ asset('/storage/' . $imm) }}" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @elseif($loop->index == 1)
                                                <a href="{{ asset('/storage/' . $imm) }}">
                                                    <video controls class="rounded-md w-full h-full" preload="none">
                                                        <source src="{{ asset('/storage/' . $imm) }}" type="video/mp4">
                                                    </video>
                                                </a>
                                            @elseif($loop->index == 2)
                                                <a href="{{ asset('/storage/' . $imm) }}">
                                                    <video controls class="rounded-md w-full h-full" preload="none">
                                                        <source src="{{ asset('/storage/' . $imm) }}" type="video/mp4">
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2 hidden">
                                                    <video controls class="rounded-md w-full h-full" preload="none">
                                                        <source src="{{ asset('/storage/' . $imm) }}" type="video/mp4">
                                                    </video>
                                                    <div
                                                        class="absolute bg-gray-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                                                        + {{ sizeOf(unserialize(base64_decode($post->image))) - 2 }} more
                                                    </div>
                                                </a>
                                            @endif
                                        @else
                                            @if ($loop->first)
                                                <a href="{{ asset('/storage/' . $imm) }}" class="col-span-2">
                                                    <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                        class="rounded-md w-full lg:h-76 object-cover"
                                                        style="height: 400px">
                                                </a>
                                            @elseif($loop->index == 1)
                                                <a href="{{ asset('/storage/' . $imm) }}">
                                                    <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                        class="rounded-md w-full h-full"
                                                        style="height: 200px; object-fit: cover">
                                                </a>
                                            @elseif($loop->index == 2)
                                                <a href="{{ asset('/storage/' . $imm) }}" class="relative">
                                                    <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                        class="rounded-md w-full h-full"
                                                        style="height: 200px; object-fit: cover">
                                                    <div
                                                        class="absolute bg-gray-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                                                        + {{ sizeOf(unserialize(base64_decode($post->image))) - 2 }} more
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ asset('/storage/' . $imm) }}" class="hidden">
                                                    <img src="{{ asset('/storage/' . $imm) }}" alt=""
                                                        class="rounded-md w-full h-full">
                                                    <div
                                                        class="absolute bg-gray-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                                                        + 15 more </div>
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                                <div class="story-content p-4" data-simplebar id="readmoreHeader{{ $post->id }}">
                                    <style>
                                        .uil-thumbs-up:hover {
                                            cursor: pointer;
                                        }

                                        #moreeee {
                                            display: none;
                                        }
                                    </style>
                                    @if (strlen($post->content) > 25)
                                        <p>{{ substr($post->content, 0, 25) }}
                                            <span id="dots">...</span>
                                            <span id="moreeee">{{ substr($post->content, 25, null) }}</span>
                                        </p>
                                        <button id="myBtn" class="moreeee">Read more</button>
                                    @else
                                        <p>{{ substr($post->content, 0, 25) }}
                                    @endif

                                </div>
                            </div>

                            <div class="py-3 px-4 space-y-3">
                                <div id="formUntuk{{ $post->id }}" class="space-y-3">
                                    <div class="flex space-x-4 lg:font-bold">
                                        <form class="flex items-center space-x-2">
                                            @csrf
                                            <input type="hidden" name="user_name" id="user_name"
                                                value="{{ auth()->user()->name }}">
                                            <input type="hidden" name="user_id" id="user_id"
                                                value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="post_id" id="post_id"
                                                value="{{ $post->id }}">
                                            <div class="p-2 rounded-full text-black">
                                                <input type="hidden" value="{{ $posts->currentPage() }}" id="getPaginate{{ $post->id }}">
                                                <input type="hidden" value="formUntuk{{ $post->id }}">
                                                <i class="uil-thumbs-up"
                                                    style="color: @foreach ($likePost as $item)
                                                     @if ($item != $post->id)
                                                          @else
                                                              red
                                                              @break       
                                                          @endif @endforeach"></i>
                                            </div>
                                            <div id="likee{{ $post }}">{{ $post->likes()->count('user_id') }}
                                            </div>
                                        </form>
                                        <a href="#story-modal{{ $post->id }}b" uk-toggle
                                            class="flex items-center space-x-2">
                                            <div class="rounded-full text-black ml-2">
                                                <i class="uil-comment-alt-lines"></i>
                                            </div>
                                            <div>Comment</div>
                                        </a>
                                        <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" width="22" height="22"
                                                class="dark:text-gray-100">
                                                <path
                                                    d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                            </svg>
                                            <div> Share</div>
                                        </a>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="dark:text-gray-100" id="Liked{{ $post->id }}">
                                            @php
                                                $firstLike = optional($post->likes->last())->user;
                                            @endphp
                                            Liked by <strong>{{ optional($firstLike)->username }} </strong>
                                            @if ($post->likes->count('user_id') < 2)
                                            @else
                                                and <strong>{{ $post->likes->count('user_id') - 1 }} Others </strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="hhhaaa{{ $post->id }}" class="space-y-3">
                                        <div class="border-t pt-4 space-y-4 dark:border-gray-600"
                                            id="commentUser{{ $post->id }}">
                                            @foreach ($post->comments()->limit(2)->get() as $item)
                                                <div class="flex">
                                                    <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                        <img src="assets/images/avatars/avatar-1.jpg" alt=""
                                                            class="absolute h-full rounded-full w-full">
                                                    </div>
                                                    <div
                                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">
                                                        <p class="leading-6">{{ $item->body }} <urna
                                                                class="i uil-heart"></urna> <i
                                                                class="uil-grin-tongue-wink"> </i> </p>
                                                        <div
                                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div
                                            class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">
                                            <form>
                                                @csrf
                                                <input type="text" name="comment_body"
                                                    placeholder="Add your Comment.."
                                                    class="bg-transparent max-h-10 shadow-none"
                                                    id="commentBox{{ $post->id }}">
                                                <input type="hidden" name="user_id" id="user_id2"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="post_id" id="post_id2"
                                                    value="{{ $post->id }}">
                                                <div
                                                    class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                                    <i class="uil-arrow-circle-right" style="cursor: pointer"></i>
                                                    <input type="hidden" value="{{ $posts->currentPage() }}">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
 
                                </div>

                            </div>

                        </div>
                    @endforeach
                    