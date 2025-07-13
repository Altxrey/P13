@extends('layout')

@section('content')
    <div class="bg-white shadow rounded p-4">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium">Judul</label>
                <input type="text" name="title" value="{{ $post->title }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Konten</label>
                <textarea name="content" rows="4" class="w-full border rounded px-3 py-2" required>{{ $post->content }}</textarea>
            </div>
            <div>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('posts.index') }}" class="text-gray-600 underline">Kembali</a>
            </div>
        </form>
    </div>
@endsection