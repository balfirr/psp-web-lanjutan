@extends('template.main')

@section('content')
<p>Ini halaman blog</p>
<div class="container">
    <div class="row">
        @foreach ($posts as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>
                                <a href="" class="text-decoration-none text-dark">{{ $item->judul }}</a>
                            </h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::words($item->konten, 10, '...') !!}</p>
                            <a href="" class="text-decoration-none">Read more ..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection