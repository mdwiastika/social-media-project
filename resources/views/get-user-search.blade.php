@foreach ($users as $user)

<div class="w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 pb-4">
    <div class="flex flex-col items-center pb-4 pt-4">
        <img class="mb-3 w-24 h-24 rounded-full shadow-lg object-cover" src="{{ $user->profile ? asset('/storage/'. $user->profile) : asset('assets/images/avatars/avatar-2.jpg') }}" alt="Bonnie image">
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400"> {{ $user->username }} </span>
        <div class="flex mt-4 space-x-3 md:mt-6 py-4 text-white">
            <form action="{{ route('follow.store', $user) }}" method="post" class="my-2">
                @csrf
                <button>

                    <a style="display: inline" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        Unfollow
                        @else
                        Follow
                        @endif
                    </a>
                </button>
            </form>
            <button>
                <a href="/profile/{{ $user->username }}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-blue-600 rounded-lg border border-gray-300 hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Profile</a>
            </button>
        </div>
    </div>
</div>
@endforeach
