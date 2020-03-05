
@include('frontend.section._header')

@include('frontend.section._navbar')


@if($tourpackagesresult ?? '')
<div class="container" >
    <p style="margin-top:100px; font-size:27px" >The search result for query <b>{{$query}}</b> are:</p>

<table class="table table-hover" style="margin:5px 10px 100px 10px;">
  <thead>
    <tr>
      <th scope="col">TOUR PACKAGE ID</th>
      <th scope="col">Title</th>
      <th scope="col">PRICE</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  @foreach($tourpackagesresult ?? '' as $value)
    <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->title}}</td>
      <td>{{$value->package_price}}</td>
      <td><a href="{{ route('front-tourpackages-single', ['id' => $value->id]) }}"> Click Here</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif(isset($message))
<p style="margin-top:100px; font-size:27px; text-align:center;" >{{ $message }}</p>
</div>
@endif
</div>
@include('frontend.section._footer')