@include('frontend.section._header')

@include('frontend.section._navbar')
<section class="package">
        <div class=" container">
            <h1 style="text-align:center;color:#fff;font-weight: bolder;padding: 37px 0px 10px 0px;">EXPLORE THE PACKAGES WE OFFER!</h1>
            <hr>


            <div class="row">
            @if($tourpackage_data)
            @foreach($tourpackage_data as $key=>$value)
                <div class="col-md-4">
                    <figure class="card card-product">
                        <div class="img-wrap">
                            <img src="{{asset('/uploads/TourPackage/'.$value->image)}}" class="package-image-holder img-responsive">

                        </div>
                        <figcaption class="info-wrap">
                           
                            <h6 class="title text-dots"><a href="{{ route('front-tourpackages-single', ['id' => $value->id]) }}">{{ $value->title }}</a></h6>
                            <div class="action-wrap">
                                
                                <div class="price-wrap h5">
                                <table class="table">
                                    <tr>
                                        <td scope="row"><i class="fa fa-money"></i>&nbspPRICE</td>
                                            <td>Rs.{{$value->package_price}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><i class="fa fa-bed"></i>&nbspDAY/NIGHT</td>
                                            <td>{{$value->Days_Nights}}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('front-tourpackages-single', ['id' => $value->id]) }}" class="btn btn-primary btn-sm float-right"> KNOW MORE&nbsp<i class="fa fa-plus"></i> </a></td>
                                        <td><a href="{{ url('add-to-cart', ['id' => $value->id]) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        
                                        </td>
                                    </tr>
                                
                                    
                                    </table>
                                    
                                </div> <!-- price-wrap.// -->
                            </div> <!-- action-wrap -->
                        </figcaption>
                    </figure> <!-- card // -->
                </div> <!-- col // -->
                @endforeach
               <div class="paginate" > {{ $tourpackage_data->links() }}</div>
            @endif



            </div>
            
        </div>
    </section>

@include('frontend.section._footer')