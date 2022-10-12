@extends('usertheme')
@section('content')

<section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="/store" method="POST" enctype="multipart/form-data">
              @csrf
              <div>
                <input type="text" class="form-control" placeholder="Your Name" name="name" id="name"/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" name="email" id="email"/>
              </div>
              <div>
                <select class="form-control nice-select wide" name="person_count" id="person_count">
                  <option value="" disabled selected>
                    How many persons?
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
             
              <div>
                <select class="form-select" id="date" aria-label="Default select example" name="date">
                  <option selected>Choose day</option>
                  <option value="today">Today</option>
                  <option value="tomorrow">Tomorrow</option>
                 
                    </select>
             
              <div class="row mb-3">
                <input class="form-control col-sm-3 simpleExample ml-3" type="time" id="first_hour" name="first_hour">
                <div class=" text-center col-sm-1 pt-2" style="color: white; font-size: 20px; text-align: center">To:</div>
                <input class="form-control col-sm-3 simpleExample ml-3" type="time"  id="last_hour" name="last_hour">
              </div> 
            </div>
              <div class="btn_box">
                <button>
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6" >
         
          </div>
        </div>
      </div>
    </div>
      

  </section>
  <script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
  @endsection
