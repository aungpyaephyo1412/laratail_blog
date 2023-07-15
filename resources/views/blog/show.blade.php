@extends('layout.master')
@section('title')
    Blog detail
@endsection

@section('content')
    <div class="w-full md:max-w-[768px] md:mx-auto min-h-screen flex flex-col justify-center items-start pt-[75px]">
        <div class="w- mb-6">
            <img src="{{$blog->image}}" alt="">
        </div>
        <div class="mb-6 px-3">
            <p>{{$blog->description}}</p>
        </div>

    </div>
@endsection
