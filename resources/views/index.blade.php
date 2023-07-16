@extends('layout.master')
@section('title')
  Home
@endsection

@section('content')
    <div class="pt-[75px] min-h-screen flex justify-center items-start md:items-center">
        <div class="w-full flex-wrap flex justify-center items-center px-3">
            <div class="w-full md:w-[50%]">
                <h1 class="font-semibold text-7xl mb-10">Stay curious.</h1>
                <p class="text-xl mb-6">Discover stories, thinking, and expertise from writers on any topic.</p>
                <button class="px-6 py-2 bg-blue-500 text-white rounded-3xl">Start Reading</button>
            </div>
            <div class="w-full md:w-[50%]">
                <img src="https://w.forfun.com/fetch/16/1649074ecd03634e05639d767e131258.jpeg?w=1000&r=0.5625" class="block w-full rounded-lg" alt="">
            </div>
        </div>
    </div>
@endsection
