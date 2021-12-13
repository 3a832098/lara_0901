<?php

namespace App\Http\Controllers;
use App\Models\Post;


class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        $data = ['posts'=>$posts];
        return view ('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $data = ['id' => $id];
        $post = Post::find($id);
        return view('admin.posts.edit', $data);
    }

    //新增(加入)一篇文章
    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

}
