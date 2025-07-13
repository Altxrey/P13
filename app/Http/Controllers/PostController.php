<?php

namespace App\Http\Controllers;

// Impor model Post untuk berinteraksi dengan database
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua post.
     */
    public function index()
    {
        // Mengambil semua data post dari database, diurutkan dari yang terbaru
        $posts = Post::latest()->get();

        // Mengirim data posts ke view 'posts.index'
        return view('posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat post baru.
     */
    public function create()
    {
        // Hanya menampilkan view 'posts.create'
        return view('posts.create');
    }

    /**
     * Menyimpan post baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Memvalidasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Membuat record baru di tabel posts
        Post::create($request->all());

        // Mengalihkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil dibuat.');
    }

    /**
     * Menampilkan detail satu post spesifik.
     * Menggunakan Route Model Binding untuk mencari Post secara otomatis.
     */
    public function show(Post $post)
    {
        // Mengirim data $post ke view 'posts.show'
        return view('posts.show', compact('post'));
    }

    /**
     * Menampilkan form untuk mengedit post.
     * Menggunakan Route Model Binding.
     */
    public function edit(Post $post)
    {
        // Mengirim data $post yang akan diedit ke view 'posts.edit'
        return view('posts.edit', compact('post'));
    }

    /**
     * Memperbarui data post di database.
     * Menggunakan Route Model Binding.
     */
    public function update(Request $request, Post $post)
    {
        // Memvalidasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Memperbarui record post yang ada
        $post->update($request->all());

        // Mengalihkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Menghapus post dari database.
     * Menggunakan Route Model Binding.
     */
    public function destroy(Post $post)
    {
        // Menghapus record post
        $post->delete();

        // Mengalihkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil dihapus.');
    }
}