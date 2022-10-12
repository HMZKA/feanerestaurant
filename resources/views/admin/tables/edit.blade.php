@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Edit table</div>

                <div class="card-body">
                    <form action="{{ route('tables.update',$table->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                        <div class="form-group">
                            <label for="title">Table title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $table->title }}">
                        </div>

                        <div class="form-group">
                            <label for="count">Chair count</label>
                            <input type="text" class="form-control" name="count" id="count" value="{{ $table->count }}">
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
