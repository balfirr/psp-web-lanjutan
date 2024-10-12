@extends('template_dashboard.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Form Pembuatan Post</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="/post/{{ $post->id }}/update" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $post->judul }}">
                </div>
                <div class="mb-2">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $post->slug }}">
                </div>
                <div class="mb-2">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control form-select @error('category_id') is-invalid @enderror">
                        <option disabled selected>-- Pilih Category --</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $post->category_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    <label for="image">Image</label>
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                </div>
                <div class="my-2">
                    <label for="konten">Konten</label>
                    <textarea name="konten" id="konten" cols="50" rows="25" class="form-control">
                        {{ $post->konten }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary my-2">
                    Ubah Post
                </button>
            </form>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#konten').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 200,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
        });
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection