@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Create new item</div>

                <div class="card-body">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Item title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="title">Item image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="title">Item price</label>
                            <input type="text" class="form-control" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="title">Item description</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <div class="form-group">
                        <select class="form-control" id="category_id" aria-label="Default select example" name="category_id">
                            <option selected>Choose category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                              </select></div>
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
