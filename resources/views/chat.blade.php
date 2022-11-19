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
@section('messages')
    <li class="active">
    @endsection
    @section('container')
        <div class="container m-auto pt-5">

            <h1 class="font-semibold lg:mb-6 mb-3 text-2xl"> Messages</h1>

            {{-- <livewire:chat-index></livewire:chat-index> --}}
        </div>

        </div>

        </div>
    @endsection
    @section('chat-script')
        <script src="{{ Vite::asset('resources/js/app.js') }}"></script>
        <script>
            let channel = Echo.channel("messages").listen("MessageCreated", function (e) { 
            console.log(e);
         });
        </script>
    @endsection
