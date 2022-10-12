@extends('theme')
@section('content')

<div class="container pt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tables<span class="float-right"><a href="{{ route('tables.create') }}" class="btn btn-secondary">Add Table</a></span></div>

                <div class="card-body">
                    <table class="table ">
                        <thead>
                                <tr>

                                    <th>
                                        Title
                                    </th>

                                </tr>
                        </thead>
                        <tbody>
                            @forelse ($tables as $table )
                            <tr>

                                <td>
                                    <a href="{{ route('tables.show',$table->id) }}"   class="btn btn-light">{{ $table->title }}</a>
                                    <form action="{{ route('tables.destroy',$table->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="margin-top:-30px" class="btn btn-dark float-right">Delete</button>
                                    </form>
                                    <a href="{{ route('tables.edit',$table->id) }}"  style="margin-top:-30px" class="btn btn-dark float-right">Edit</a>

                                </td>



                            </tr>

                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
