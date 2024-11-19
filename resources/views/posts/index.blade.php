@extends('app')
@section('title', 'Posts')
@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Image</th>
                <th class="text-center">Title</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td class="text-center">
                        <img src="{{ asset('storage/public/posts/' . $post->image) }}" class="rounded" style="width: 150px">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark"><i
                                    class="bi bi-eye"></i> Show</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary"><i
                                    class="bi bi-pencil-alt"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
