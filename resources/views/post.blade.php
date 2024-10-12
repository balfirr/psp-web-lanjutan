@extends('template.main')


@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <article>
                    <h2>{{ $post->title }}</h2>
                    <h6 class="mb-3">By. <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h6>
                    
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @endif

                    <article class="my-3" >
                        {!! $post->body !!}
                    </article>
                    <a href="/blog" class="d-block mt-3">Back to Blog</a>
                </article>
            </div>
        </div>
    </div>
@endsection

