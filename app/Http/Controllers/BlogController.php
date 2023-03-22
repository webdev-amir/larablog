<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = createUniqueSlug();
        $blog->status = $request->status;
        $blog->image = $imageName;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->route('blog.index');
    }



    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($id);

        $image = $request->file('image');
        if($image){
            unlink(public_path('images/'.$blog->image));
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $blog->image = $imageName;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->save();
        return redirect()->route('blog.index');
    }
}
