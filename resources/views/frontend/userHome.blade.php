@include('frontend.section._header')

@include('frontend.section._navbar')
<div class="user_bio container" style="margin-top:10px;margin-bottom:20px;">


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif

    Dear User, {{{ isset(Auth::user()->name) ? Auth::user()->name : "Please Log In" }}}
    <br>
    <p>The package you have booked is as following:</p>

    <div class="card">
        @if($package_booked_data)

        @foreach($package_booked_data as $value)
        @if(Auth::id()==$value->user_id)
        <table class="table table-hover">
            <tr>
                <th scope="col"> User ID</th>
                <td>{{$value->user_id}}</td>
            </tr>
            <tr>
                <th scope="col"> User Name</th>
                <td>{{$value->user_name}}</td>
            </tr>
            <tr>
                <th scope="col"> Tour Package Selected</th>
                <td>{{$value->tour_packages_name}}</td>
            </tr>
            <tr>
                <th scope="col"> Phone No.</th>
                <td>{{$value->phone_number}}</td>
            </tr>
            <tr>
                <th scope="col">No. of people</th>
                <td>{{$value->no_of_peoples}}</td>
            </tr>
            <tr>
                <th scope="col">Preferred Date</th>
                <td>{{$value->preferred_date}}</td>
            </tr>
            <tr>
                <th scope="col">Booked Date</th>
                <td>{{$value->created_at}}</td>
            </tr>
            <tr>
                <th scope="col">DELETE PACKAGE</th>
                <td><a href="{{ route('bookedPackage-delete',$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" style="border-radius:50%"><i class="fa fa-trash"></i> </a></td>
            </tr>
        </table>


        @endif
        @endforeach

        @endif

    </div>

    <div class="col-lg-6">
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>

        <div class="p-4">
            <p class="font-italic mb-4"> Additional costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
                @if($package_booked_data)
                <div style="display: none">
                    {{$vat = 0}}
	                {{ $total = 0 }}
                </div>
                @foreach($package_booked_data as $value)
                @if(Auth::id()==$value->user_id)
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal</strong><strong>
                    {{$value->package_price}}
                </strong></li>
                <div style="display: none">{{$vat += 0.13 * $value->package_price}}</div>
                <div style="display: none">{{$total += $value->package_price}}</div>
                @endif
                @endforeach
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">VAT</strong><strong>{{$vat}}</strong></li> 
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total:</strong>
                    <h5 class="font-weight-bold">{{$total+ $vat}}</h5>
                </li>
                 @endif
                 <button class="form-control btn btn-dark" onclick="BookShowFunction()"> Proceed To Checkout</i></button>
            
            <div class="pay_package>" style="display:none;" id="myDIV1">

                <form class="main_form">
                  
                    <div class="form_ko_lagi form-group">
                        <img class= "img-responsive" style="border-radius:10px;height: 79px;" src="{{asset('/frontend/images/esewa.png')}}">
                        <label for="">Esewa ID:</label>
                        <input  type="integer" class="form-control form_ko_lagi" name="">

                        <br>
                        <button class="btn btn-warning" onclick="BookShowFunction1()"> Confirm Payment </i></button>
                        <div class="pay_package>" style="display:none;" id="myDIV2">Sorry,No Payment System Available Currently.</div>
                    </div>
            </div>
        </div>
    </div>

</div>


@include('frontend.section._footer')

<script>
function BookShowFunction() {
      var x = document.getElementById("myDIV1");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    function BookShowFunction1() {
      var x = document.getElementById("myDIV2");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>