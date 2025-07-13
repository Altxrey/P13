@extends('layout')

@section('content')
    <div class="bg-white shadow rounded p-4">
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Judul</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Konten</label>
                <textarea name="content" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('posts.index') }}" class="text-gray-600 underline">Kembali</a>
            </div>
        </form>
    </div>
@endsection