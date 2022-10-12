@extends('usertheme')
@section('content')


<section class="food_section layout_padding-bottom">
    <div class="container">
    <div class="heading_container heading_center">
        <h2 style="color: white">
        Our Menu
        </h2>

    </div>
    

       <div class="filters-content">
        <div class="row grid">
          @foreach ($categories as $category)
          <div class="col-sm-6 col-lg-4 all">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="/images/categories/{{ $category->image }}" alt="{{ $category->image }}">
                </div>
                <div class="detail-box">
                  <h5>
                   {{ $category->title }}
                  </h5>
                  <p>
                    {{ $category->description }}
                </p>


                    <div class="btn-box">
                        <a href="/user/{{ $category->id }}">
                          View
                        </a>
                        
                      </div>

                </div>
              </div>
            </div>

          </div>

    
    @endforeach
  </div>
    </div>
    </div>
  </section>
  @endsection
