@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Blog</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.update',[$blog->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{$blog->title}}">
                    </div>
                    <div class="form-group">
                        @if ($blog->image)
                        <img src="{{ asset('images/'.$blog->image) }}" alt="" width="100px" height="100px">
                        @endif
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="Enter Image">
                    </div>
                    <div class=" form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3">
                            {{$blog->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1" @if ($blog->status == 1) selected @endif>Active</option>
                            <option value="0" @if ($blog->status == 0) selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection