@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header d-inline">
                <h4 class="card-title"> Blog</h4>
                <a href="{{ route('blog.create') }}" class="btn btn-primary float-left">Create Blog</a>
            </div>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($blogs as $blog)
                <tr>
                    <td>
                        <img src="{{ asset('images/'.$blog->image) }}" alt="" width="100px" height="100px">
                    </td>
                    <td>
                        <h3>{{ $blog->title }}</h3>
                    </td>
                    <td>
                        <p>{{ $blog->description }}</p>
                    </td>
                    <td>
                        @if ($blog->status == 1)
                        <span class="success">Active</span>
                        @else
                        <span class="danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('blog.show',[$blog->id]) }}">show </a>
                        <a href="{{ route('blog.edit',[$blog->id]) }}">Edit </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection