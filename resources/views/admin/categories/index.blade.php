@extends('theme')
@section('content')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Categories</h1>

      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)

      <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/images/categories/{{ $category->image }}" alt="{{ $category->image }}" height="200px">
                <div class="card-body">
                  <p class="card-text">{{ $category->title }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/admin/categories/{{ $category->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                      <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-sm btn-outline-secondary ml-2">Edit</a>


                  </div>
                  <form action="/admin/categories/{{ $category->id }}" method="POST">
                    @csrf
                    @method('Delete')
                  <div class="d-flex flex-row-reverse">
                     <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                    </div>
                  </form>
                </div>
                </div>

              </div>
      </div>
        @endforeach
      </div>
    </div>

@endsection
