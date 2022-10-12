@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Edit item</div>

                <div class="card-body">
                    <form action="{{ route('items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Item title</label>
                            <input type="text" class="form-control" value="{{ $item->title }}" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="title">Item price</label>
                            <input type="text" class="form-control" value="{{ $item->price }}" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="title">Item description</label>
                            <input type="text" class="form-control" value="{{ $item->description }}" name="description" id="description">
                        </div>
                        <select class="form-select" id="category_id" aria-label="Default select example" name="category_id">
                            <option selected value="{{ $item->category->id }}">{{ $item->category->title }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach

                          </select>
                        <hr>
                        <div class="form-group">
                            <input type="submit" class="form-control" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
