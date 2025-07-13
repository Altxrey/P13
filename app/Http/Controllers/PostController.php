<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form untuk membuat post baru
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan data post baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        // Simpan ke database
        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
    }

    // Menampilkan detail post tertentu
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Menampilkan form edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Memperbarui data post
    public function update(Request $request, Post $post)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        // Update data
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    // Menghapus post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}