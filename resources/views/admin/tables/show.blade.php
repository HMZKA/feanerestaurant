@extends('theme')
@section('content')

<div class="container pt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $table->title }}</div>

                <div class="card-body">
                    <table class="table ">
                        <thead>
                                <tr>

                                    <th>
                                        Client name
                                    </th>
                                    <th>
                                        Client phone
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Time
                                    </th>

                                </tr>
                        </thead>
                        <tbody>
                             @forelse ($table->resrvations as $resrvation )
                            <tr>

                                <td>
                                   <p>{{ $resrvation->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $resrvation->phone }}</p>
                                 </td>
                                 <td>
                                    <p>{{ $resrvation->date }}</p>
                                 </td>
                               <td></td>


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
