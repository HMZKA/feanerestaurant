@extends('theme')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Edit reservation</div>

                <div class="card-body">
                    <form action="{{ route('reservation.update',$reservation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $reservation->name }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $reservation->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $reservation->email }}">
                        </div>
                        <div>
                            <select class="form-control nice-select wide mb-4" name="person_count" id="person_count">
                              <option value="{{ $reservation->person_count }}" >
                               {{ $reservation->person_count }}
                              </option>
                              <option value="2">
                                2
                              </option>
                              <option value="3">
                                3
                              </option>
                              <option value="4">
                                4
                              </option>
                              <option value="5">
                                5
                              </option>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-select" id="date" aria-label="Default select example" name="date">
                              <option selected value="{{ $reservation->date }}">{{ $reservation->date }}</option>
                              <option value="today">Today</option>
                              <option value="tomorrow">Tomorrow</option>
                               </select>
                              </div>
                             <div class="form-group">
                               <label style="color: white;" for="first_hour">From:</label>
                            <input class="form-control col-sm-3 simpleExample " type="time" id="first_hour" name="first_hour" value="{{ $reservation->first_hour }}">
                             </div>
                             <div class="form-group">
                             <label style="color: white; ">To:</label>
                             <input class="form-control col-sm-3 simpleExample" type="time"  id="last_hour" name="last_hour" value="{{ $reservation->last_hour }}">
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
