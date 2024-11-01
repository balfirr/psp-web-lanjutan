@extends('template.main')

@section('content')
<div class="text-center">
    <a href="https://www.instagram.com/balfirr163/" target="_blank">
      <img src="{{ asset($url) }}" alt="" class="rounded-5 m-auto" style="height: 150px">
    </a>
    <h3>{{ $name }}</h3>
    <p>{{ $bio }}</p>
    <small class="text-secondary">{{ $spesialis[0] }} | {{ $spesialis[1] }}</small>
</div>
@endsection
