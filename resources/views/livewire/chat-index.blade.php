    <div
    class="lg:flex lg:shadow lg:bg-white lg:space-y-0 space-y-8 rounded-md lg:-mx-0 -mx-5 overflow-hidden lg:dark:bg-gray-800">
    <!-- left message-->
    <div class="lg:w-4/12 bg-white border-r overflow-hidden dark:bg-gray-800 dark:border-gray-600">

        <!-- search-->
        <div class="border-b px-4 py-4 dark:border-gray-600">
            <div class="bg-gray-100 input-with-icon rounded-md dark:bg-gray-700">
                <input id="autocomplete-input" type="text" placeholder="Search"
                    class="bg-transparent max-h-10 shadow-none">
                <i class="icon-material-outline-search"></i>
            </div>
        </div>
        <!-- user list-->
        <div class="pb-16 w-full">
            <ul class="dark:text-gray-100">
                @foreach ($all_chat as $chat)    
                <li>
                    <a wire:click="getChat({{ $chat->id }})"
                        class="block flex items-center py-3 px-4 space-x-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-12 h-12 rounded-full relative flex-shrink-0">
                            <img src="assets/images/avatars/avatar-2.jpg" alt=""
                                class="absolute h-full rounded-full w-full">
                            <span
                                class="absolute bg-green-500 border-2 border-white bottom-0 h-3 m-0.5 right-0 rounded-full shadow-md w-3"></span>
                        </div>
                        <div class="flex-1 min-w-0 relative text-gray-500">
                            <h4 class="text-black font-semibold dark:text-white">{{ $chat->sender->name }}</h4>
                            <span class="absolute right-0 top-1 text-xs">Sun {{ $chat->id }}</span>
                            <p class="truncate">Esmod tincidunt ut laoreet</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!--  message-->
    @if ($show_chat)
    <livewire:chat-show></livewire:chat-show>
    @endif
</div>
