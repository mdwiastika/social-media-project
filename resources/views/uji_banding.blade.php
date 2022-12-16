@extends('layouts.main')
@section('container')
<div class="container mx-auto">
    @if (session()->has('message'))
    <h4 style="color: red">{{ session('message') }}</h4>
@endif
</div>
@endsection