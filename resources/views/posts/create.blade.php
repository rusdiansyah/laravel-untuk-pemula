@extends('app')
@section('title', 'Posts Create')
@section('content')
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">GAMBAR</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    <!-- error message untuk title -->
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">JUDUL</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" placeholder="Masukkan Judul Post">

                    <!-- error message untuk title -->
                    @error('title')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">KONTEN</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                        placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

                    @error('content')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>
@endpush
