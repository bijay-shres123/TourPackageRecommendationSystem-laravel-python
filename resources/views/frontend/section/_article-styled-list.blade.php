@if($new_data)
<div class="container">
<div class="row">
    <h1>Check Other Recent Articles</h1>
    <p></p>
</div>
    <div class="row">
		
		<div class="col-md-7 ">
			<ul class="media-list main-list">
				@foreach($new_data as $value)
			  <li class="media">
			    <a class="pull-left" href="#">
			      <img class="media-object" src="{{asset('/uploads/Article/'.$value->image)}}" alt="..." style="height: 82px;width: 100px;margin: 6px;">
			    </a>
			    <div class="media-body">
				<a href="{{ route('front-article-single', ['id' => $value->id]) }}"><h4>{{ $value->title }}</h4></a>
			      <p class="media-heading"> {!!  substr(strip_tags($value->description), 0, 100) !!}<a href="{{ route('front-article-single', ['id' => $value->id]) }}">Read more</a></p>
			     
			    </div>
			  </li>
			  @endforeach
			  
			</ul>
		</div>
	</div>
	@endif