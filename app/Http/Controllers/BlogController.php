<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest('id')->get();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $fileName = uniqid() . uniqid() . $request->file('blog_photo')->getClientOriginalName();
        $request->file('blog_photo')->storeAs('public',$fileName);
        $blog->title = $request->blog_title;
        $blog->slug = \Str::slug($request->blog_title);
        $blog->description = $request->blog_description;
        $blog->excerpt = Str::words($request->blog_description,30,'....');
        $blog->image = $fileName;
        $blog->save();
        return redirect()->route('blog.index')->with(['create' => 'Your blog is create successful']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog,)
    {
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
//        return $request;
        if ($request->hasFile('blog_photo')){
            if (Storage::exists('public/'.$blog->image)){
                Storage::delete('public/'.$blog->image);
            }
            $fileName = uniqid() . uniqid() . $request->file('blog_photo')->getClientOriginalName();
            $request->file('blog_photo')->storeAs('public',$fileName);
            $blog->image = $fileName;
        }else{
            $blog->image = $blog->image;
        }
        $blog->title = $request->blog_title;
        $blog->slug = Str::slug($request->blog_title);
        $blog->description = $request->blog_description;
        $blog->excerpt = Str::words($request->blog_description,30,'....');
        $blog->update();
        return redirect()->route('blog.index')->with(['edit'=>'Your post has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Storage::exists('public/'.$blog->image)){
        Storage::delete('public/'.$blog->image);
        }
        $blog->delete();
        return redirect()->back()->with(['delete'=>'Your post has been deleted']);
    }
}
