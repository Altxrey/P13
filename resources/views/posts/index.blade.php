@extends('layout')

@section('content')
    <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <h1 class="text-3xl font-bold text-stone-800 mb-4 sm:mb-0">Aplikasi Pengelola Post</h1>
            <a href="{{ route('posts.create') }}" class="bg-stone-700 text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:bg-stone-800 focus:outline-none focus:ring-2 focus:ring-stone-500 focus:ring-opacity-75 transition-transform transform hover:scale-105">
                Tambah Post
            </a>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 mb-6 rounded-r-lg" role="alert">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-stone-200">
            <table class="min-w-full bg-white">
                <thead class="bg-stone-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-bold uppercase tracking-wider text-stone-600">Judul</th>
                        <th class="py-3 px-6 text-center text-xs font-bold uppercase tracking-wider text-stone-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-stone-700">
                    @forelse ($posts as $post)
                        <tr class="border-b border-stone-200 hover:bg-stone-50 transition">
                            <td class="py-4 px-6 text-left whitespace-nowrap font-medium">{{ $post->title }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex item-center justify-center space-x-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="bg-stone-200 text-stone-700 px-3 py-1 text-sm rounded-full font-medium hover:bg-stone-300 transition">Detail</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-amber-200 text-amber-800 px-3 py-1 text-sm rounded-full font-medium hover:bg-amber-300 transition">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus post ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-200 text-rose-800 px-3 py-1 text-sm rounded-full font-medium hover:bg-rose-300 transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-6 px-6 text-center text-stone-500">
                                Belum ada post yang dibuat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection