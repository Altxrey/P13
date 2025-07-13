@extends('layout')

@section('content')
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Tambah Post
    </a>
    <div class="bg-white shadow rounded p-4">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2 text-center space-x-2">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 underline">Detail</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-600 underline">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline" onclick="return confirm('Hapus post ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection