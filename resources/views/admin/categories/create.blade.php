@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Category title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="title">Category image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="title">Category description</label>
                            <input type="text" class="form-control" name="description" id="description">
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
