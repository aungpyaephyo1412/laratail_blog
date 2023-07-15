@extends('layout.master')
@section('title')
    Blog create
@endsection
@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center pt-[75px] px-3">
        <h4 class="mb-4 font-semibold ">Create Your Post</h4>
        <form action="{{ route('blog.store') }}" enctype="multipart/form-data" class="w-full" method="post">
            @csrf
            <div class="mb-6">
                <input name="blog_photo" value="{{old('blog_photo')}}" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

                @error('blog_photo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog Title</label>
                <input name="blog_title" value="{{old('blog_title')}}" type="text" id="base-input" class="bg-gray-50 border border-gray-300 @error('blog_title') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('blog_title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog Description</label>
                <textarea name="blog_description" id="message" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 @error('blog_description') border-red-500 @enderror focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">{{old('blog_description')}}</textarea>
                @error('blog_description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Post your blog</button>
        </form>
    </div>
@endsection
