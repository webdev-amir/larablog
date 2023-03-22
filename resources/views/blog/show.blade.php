@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-body">

        <h1>{{ $blog->title }}</h1>
        <img src="{{ asset('images/'.$blog->image) }}" alt="" width="100px" height="100px">
        <p>{{ $blog->description }}</p>
        <a href="{{ route('blog.index') }}" class="btn btn-primary">Back</a>

    </div>
    </div>
</div>
@endsection