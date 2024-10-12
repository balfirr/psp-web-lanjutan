@extends('template_dashboard.main')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Daftar Post</h1>
    </div>
    <a href="/post/create" class="btn btn-primary">Tambah Post</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->judul }}</td>
                <td>{{ $post->category->nama }}</td>
                <td>
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/post/{{ $post->id }}" style="display: inline" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</main>
@endsection