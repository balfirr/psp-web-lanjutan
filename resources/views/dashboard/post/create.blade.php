@extends('template_dashboard.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Form Pembuatan Post</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="/post" method="POST" class="form">
                @csrf
                <div class="mb-2">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="my-2">
                    <label for="konten">Konten</label>
                    <textarea name="konten" id="konten" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary my-2">
                    Buat Post
                </button>
            </form>
        </div>
    </div>
</main>
@endsection