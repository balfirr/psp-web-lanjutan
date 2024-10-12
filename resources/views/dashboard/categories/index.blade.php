@extends('template_dashboard.main')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Daftar Categoy</h1>
    </div>
    <a href="/category/create" class="btn btn-primary">Tambah Category</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Category</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->nama }}</td>
                <td>
                    <a href="/category/{{ $category->slug }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/category/{{ $category->slug }}" style="display: inline" method="POST">
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