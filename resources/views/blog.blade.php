@extends('template.main')

@section('content')
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
                <form action="/blog">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="cari" name="search">
                        <button class="btn btn-dark">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $item)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>
                                    <a href="/post/{{ $item->id }}"
                                        class="text-decoration-none text-dark">{{ $item->judul }}</a>
                                </h5>
                                <p class="card-text">{!! Str::limit(strip_tags($item->konten), 150) !!}</p>
                                <a href="/post/{{ $item->id }}" class="text-decoration-none">Read more ..</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{ $posts->links('vendor.pagination.boostrap-5') }}
        </div>
    </div>
@endsection
