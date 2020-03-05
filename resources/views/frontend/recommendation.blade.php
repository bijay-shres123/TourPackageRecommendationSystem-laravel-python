@include('frontend.section._header')

@include('frontend.section._navbar')
@if($recommendation_data)

<div class="row">
@foreach($recommendation_data as $key=>$value)
<div class="col-md-7">
    <ul class="">
        <li class="form-control">{{ $value->tour_packages_id }}</li>
        <li class="form-control">{{ $value->recommended_product_1 }}</li>
        <li class="form-control">{{ $value->recommended_product_2 }}</li>
        <li class="form-control">{{ $value->recommended_product_3 }}</li>
        <li class="form-control">{{ $value->recommended_product_4 }}</li>
    </ul>
</div>
@endforeach
</div>


@endif
@include('frontend.section._footer')