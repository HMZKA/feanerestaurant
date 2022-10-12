@extends('usertheme')
@section('content')

<section class="food_section layout_padding-bottom mt-5">
    <div class="container">
    <div class="heading_container heading_center mb-4">
        <h2 style="color: white">
       {{ $category->title }}
        </h2>

    </div>
    <div class="row grid">
        @foreach ($category->items as $item)
        
          <div class="col-sm-6 col-lg-4 all ">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="/storage/category/{{ $category->id }}/{{ $item->image }}" alt="{{ $item->image }}">
                </div>
                <div class="detail-box">
                  <h5>
                   {{ $item->title }}
                  </h5>
                  <p>
                    {{ $item->description }}
                </p>

                <p>
                    {{ $item->price }}
                </p>


                </div>
              </div>
            </div>

          </div>

          @endforeach
        </div>

    </div>
  </section>

@endsection
