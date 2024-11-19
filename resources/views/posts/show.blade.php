@extends('app')
@section('title', 'Show Post')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <img src="{{ asset('storage/public/posts/' . $post->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $post->title }}</h4>
                    <p class="tmt-3">
                        {!! $post->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
