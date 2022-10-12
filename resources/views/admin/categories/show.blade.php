@extends('theme')
@section('content')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $category->title }}</h1>
        <p class="lead text-muted">{{ $category->description }}<p>

          <a href="/admin/categories" class="btn btn-secondary my-2">Go Back</a>
        </p>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      @foreach ($category->items as $item)

      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/storage/category/{{ $category->id }}/{{ $item->image }}" alt="{{ $item->image }}" height="250px">
                <div class="card-body">
                  <p class="card-text">{{ $item->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/items/show/{{ $item->id }}" class="btn btn-sm btn-outline-secondary">View</a>

                    </div>

                  </div>
                </div>
              </div>
      </div>
        @endforeach
      </div>
    </div>

@endsection
