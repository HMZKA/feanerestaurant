@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Add new table</div>

                <div class="card-body">
                    <form action="{{ route('tables.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Table title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="count">Chair count</label>
                            <input type="text" class="form-control" name="count" id="count">
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
