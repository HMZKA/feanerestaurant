@extends('theme')

@section('content')

<section class=" text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $item->title }}</h1>
        <p class="lead text-muted">{{ $item->price }} S.P<p>

          <a href="/admin/items" class="btn btn-secondary my-2">Go Back</a>
        </p>
      </div>
    </div>

  </section>
  <div class="container">
    <div class="row">
        <div class="container p-4 col-6">
            <p style="font-size: 1.8vw">{{ $item->description }}</p>
        </div>
        <div class="container col-6">
            <img src="/storage/category/{{ $item->category_id }}/{{ $item->image }}" alt="" width="100%">
        </div>
    </div>
  </div>
  @endsection
