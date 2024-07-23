<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('posts.index', compact('posts'));
    }

    //Mmebuat function crate untuk menampilkan form tambah data
    public function create()
    {
        return view('posts.create');
    }

    //Membuat function store untuk memperoses data ke database dan upload gambar
    public function  store(request $request)
    {
        //Membuat validasi form
        $this->validate($request, [
            'image'    => 'required|image|mimes:,jpeg|max:2040',
            'title'   => 'required|min:5',
            'content'  => 'required|min:10'
        ]);

        //Upload gambar
        $image = $request->file('image');
        $image->storeAs('public/posts',$image->hashName());

        //simpan ke database
        Post::create([
            'image'     =>$image->hashName(),
            'title'    => $request->title,
            'content'  => $request->content
        ]);

        //redirect ke halaman index
        return redirect()->route('posts.index')->with([
            'success' => 'Data Berhasil disimpan'
        ]);
    }
}
