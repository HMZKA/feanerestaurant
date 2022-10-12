@extends('theme')
@section('content')

<div class="container pt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Reservations</div>

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
                                        Client email
                                    </th>
                                    <th>
                                        Person count
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Edit
                                    </th>

                                </tr>
                        </thead>
                        <tbody>
                             @forelse ($reservations as $reservation )
                            <tr>

                                <td>
                                   <p>{{ $reservation->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $reservation->phone }}</p>
                                 </td>
                                 <td>
                                    <p>{{ $reservation->email }}</p>
                                 </td>
                                 <td>
                                    <p>{{ $reservation->person_count }}</p>
                                 </td>
                                 <td>
                                    <p>{{ $reservation->date }}</p>
                                 </td>
                               <td>
                               <p>{{ $reservation->first_hour }} >>> {{ $reservation->last_hour }}</p>
                               </td>

                               
                               <td>
                                <form action="{{ route('reservation.destroy',$reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-dark float-end">Delete</button>
                                </form>
                                <a href="{{ route('reservation.edit',$reservation->id) }}"   class="btn btn-dark float-end">Edit</a>
                            
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
