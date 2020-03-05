@include('frontend.section._header')


@include('frontend.section._navbar')

@if($tourpackage_data)


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif

<section class="first_inner">
  <div class="container">
    <div class="row justify-content-between">
      <div class="card1 col-md-5">
        <div class="image-holder">

          <img src="{{asset('/uploads/TourPackage/'.$tourpackage_data->image)}}">

        </div>
        <div class="title_image">
          <h2>{{ $tourpackage_data->title }}</h2>
        </div>
        <div class="rate">
        <span style="font-size:25px;">RATING:</span> <div class="star-rating">
        @for ($i = 1; $i <= $tourpackage_data->average; $i++)
        <span class="fa fa-star" style="color:#FFEB1C;font-size: 30px;"></span>
        @endfor
        <span style="font-size:28px">({{$tourpackage_data->count}})</span>
        
        </div>
        <!-- <div class="star-rating">
        <span class="fa fa-star-o-value" data-rating="{{$tourpackage_data->average}}"></span>
        </div>
          -->
        </div>
        <!-- <div class="location_text">
          Boudha | Boudha,Kathmandu
        </div>
        <div class="timing">
          Open Today: 12 am: 10:30pm
        </div> -->
      </div>
      
      <div class="col-md-7">
       <div class="gallery">
        <table class="table table-hover">
  
            <tbody>
              <tr>
                <th scope="row"><i class="fa fa-money"></i> PRICE</th>
                <td>Rs.{{$tourpackage_data->package_price}}</td>
              
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-hotdog"></i>Meal Inclusion:</th>
                <td>{{$tourpackage_data->meal_inclusion}}</td>
                
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-car"></i>Transport Facilities</th>
                <td>{{$tourpackage_data->transport_facilities}}</td>
                
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-bed"></i> Days/Nights</th>
                <td>{{$tourpackage_data->Days_Nights}}</td>
                
              </tr>
            </tbody>
          </table>
          <div class="book-package">
          @if(auth()->check())
       <button class="form-control button_ko" onclick="BookShowFunction()"><i class="fa fa-plus" aria-hidden="true"> BOOK PACKAGE</i></button>
       

        <div class="booking_of_package>" style="display:none;" id="myDIV1">

          <form action="{{route('bookpackage.store')}}" method="post" class="main_form">
            {{csrf_field()}}
            <div class="form_ko_lagi form-group">
              <label for="">Preferred Date:</label>
              <input class="form-control" type="date" class="form-control form_ko_lagi" name="preferred_date" >
              
              <br>
            </div>
            <div class="form-group form_ko_lagi">
              <label for="">No of Pax.</label>
              <input type="integer" class="form-control form_ko_lagi" name="no_of_peoples" placeholder="1,2..."><br>
            </div>
            <div>
            <label for="">Phone Number</label>
              <input type="integer" class="form-control form_ko_lagi" name="phone_number" placeholder="98..."><br>
            </div>
            <div class="form-group form_ko_lagi">
              <label for="">Any Enquries?</label>
              <textarea type="text" class="form-control form_ko_lagi" name="enquiries" placeholder="Write Here..."></textarea><br>
            </div>
            <div class="form-group form_ko_lagi">
              <input id="register" class="btn btn-success" type="submit" value="Submit">
            </div>
            <input type="hidden" name="tour_packages_id" value="{{$tourpackage_data->id}}">
            <input type="hidden" name="tour_packages_name" value="{{$tourpackage_data->title}}">
            <input type="hidden" name="package_price" value="{{$tourpackage_data->package_price}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
            <input type="hidden" name="expiration_date" value="{{Carbon\Carbon::now()->addDays(7)}}">
          </form>
          @else
          <a href="{{ route('login') }}" class="btn btn-success pull-right">
              <i class="fa fa-plus"></i> BOOK PACKAGE
            </a>
          @endif
          
        </div>
          </div>
        </div> 
      </div>
      </div>
    </div>


</section>
<section class="body_desc">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-8">
        <div class="overview">
          <h3>OVERVIEW</h3>

        </div>
        <div class="desc-overview">
          <p>{{$tourpackage_data->Detailed_itinerary}}</p>
        </div>
        <!-- TEST OF RECOMMENDATION -->
        <div>
          @if($recommendation_titles)
          @if($recommendation_datas)
          <!-- @foreach($recommendation_datas as $object)
                @foreach ($object as $value)
                {{ $value['title']}}
                @endforeach
            
                @endforeach -->
          @foreach($recommendation_titles as $item)
          <h1 style="background: #f9f9f9;">RECOMMENDED PACKAGES FOR {{$item['tour_packages_id']}} </h1>
          <ul class="">
            <li class="form-control form_ko">
              @foreach($recommendation_datas as $object)
              @foreach ($object as $value)

              @if($item['recommended_product_1']==$value['title'])
              <a href="{{ route('front-tourpackages-single', ['id' => $value['id']]) }}">{{$item['recommended_product_1']}}</a>

              @endif
              @endforeach

              @endforeach
            </li>

            <li class="form-control form_ko">
              @foreach($recommendation_datas as $object)
              @foreach ($object as $value)

              @if($item['recommended_product_2']==$value['title'])
              <a href="{{ route('front-tourpackages-single', ['id' => $value['id']]) }}">{{$item['recommended_product_2']}}</a>

              @endif
              @endforeach

              @endforeach
            </li>
            <li class="form-control form_ko">
              @foreach($recommendation_datas as $object)
              @foreach ($object as $value)

              @if($item['recommended_product_3']==$value['title'])
              <a href="{{ route('front-tourpackages-single', ['id' => $value['id']]) }}">{{$item['recommended_product_3']}}</a>

              @endif
              @endforeach
              @endforeach
            </li>
            <li class="form-control form_ko">
              @foreach($recommendation_datas as $object)
              @foreach ($object as $value)

              @if($item['recommended_product_4']==$value['title'])
              <a href="{{ route('front-tourpackages-single', ['id' => $value['id']]) }}">{{$item['recommended_product_4']}}</a>

              @endif
              @endforeach
              @endforeach
            </li>
          </ul>
          @endforeach

        </div>
        @endif
        @endif
        <!-- END OF RECOMMENDATION -->
        <div class="highlights">
          <h3>HIGHLIGHTS</h3>
        </div>
        <div class="highlights-list">
        {{$tourpackage_data->Inclusion_Exclusion_list}}
        </div>
       
      </div>
      
        <div class="col-md-4">
          <div class="recent-articles">
            <h2>RECENT ARTICLES</h2>
            @if($articles_datas)
           
            <ul>
              @foreach($articles_datas as $value)
              
              <li>
                <div class="article-title">
                  <a href="{{ route('front-article-single', ['id' => $value->id]) }}"><h4>{{$value->title}}</h4></a>
                </div>
                <div class="short-article">
                  <p>{!!  substr(strip_tags($value->description), 0, 100) !!}<a href="{{ route('front-article-single', ['id' => $value->id]) }}" style="color:#8a2a33;">   &nbsp &nbsp Read more...</a></p>
                </div>
              </li>
              <hr style="border-top: dotted 1px;"> 
              @endforeach
            </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
    </div>
    
</section>
<section class="leave-review container">
@if(auth()->check())
        <button class="form-control button_ko" onclick="ReviewShowFunction()">LEAVE US A REVIEW</button>

        <div class="rate_and_review>" style="display:none;" id="myDIV">

          <form action="{{route('review.store')}}" method="post" class="main_form">
            {{csrf_field()}}
            <div class="form_ko_lagi form-group">
              <label for="">RATE IT</label>
              <select class="form-control" type="integer" class="form-control form_ko_lagi" name="rating" placeholder="1,2....">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <br>
            </div>
            <div class="form-group form_ko_lagi">
              <label for="">YOUR REVIEW</label>
              <textarea type="textarea" class="form-control form_ko_lagi" name="description" placeholder="Write Here..."></textarea><br>
            </div>
            <div class="form-group form_ko_lagi">
              <label for="">ANY SUGGESTIONS?</label>
              <textarea type="text" class="form-control form_ko_lagi" name="headline" placeholder="Write Here..."></textarea><br>
            </div>
            <div class="form-group form_ko_lagi">
              <input id="register" class="btn btn-success" type="submit" value="Submit">
            </div>
            <input type="hidden" name="tour_packages_id" value="{{$tourpackage_data->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
          </form>
          @else
          <form action="http://touristlara.com/login">
             <input type="submit" value="LEAVE US A REVIEW" class="btn btn-primary" style="height:60px;width:66%"/>
          </form>
          @endif
          
        </div>
</section>

<section class="map_google">

  <div class="">
    <h2 style=text-align:center;font-weight:bolder;>SAVE YOUR DESTINATION</h2>
  </div>
  <div class="mapouter">
    @if($tourpackage_data)
    <div class="gmap_canvas"><iframe width="1900px" height="500" id="gmap_canvas" src="{{$tourpackage_data->link}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
      </iframe><a href="https://www.whatismyip-address.com">como saver mi ip</a></div>
      @endif
    <style>
      .mapouter {
        position: relative;
        text-align: right;
        height: 500px;
        width: 1900px;
      }

      .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 500px;
        width: 1900px;
      }
    </style>
  </div>
</section>


  @endif

  @include('frontend.section._footer')
  <script>
    function ReviewShowFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    function BookShowFunction() {
      var x = document.getElementById("myDIV1");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    // var button = document.getElementById('myButton3');
    // button.onclick = function() {
    //   location.assign('http://touristlara.com/login');
    // }

    var button = document.getElementById('myButton1');
    button.onclick = function() {
      location.assign('http://touristlara.com/login');
    }
    $('#register').click(function() {
      $(this).attr('disabled', 'disabled');
    });
    $(function() {
    $('span.stars').stars();
    });
    
  </script>