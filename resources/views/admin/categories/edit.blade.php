@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    <form action="{{ route('categories.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Category Name</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                        </div>

                        <div class="form-group">
                            <label for="title">Category description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="submit" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
