@include('frontend.section._header')

@include('frontend.section._navbar')

<section class="intro">
<div class="container box">
  <div class="header_title" style="padding: 100px 0px 0px 11px;">
   <h3 style="color:azure;text-align:center;font-weight:bolder;">SEARCH FOR YOUR<br> <span style="font-family:Dancing Script, sans-serif">DESIRED DESTINATION</span></h3><br />
   </div>
   <div class="form-group">
   <form class="my-2 my-lg-0" style="text-align:center" method="POST" action="{{route('search-result')}}">
    <div>
    <input type="text" name="q" id="country_name" class="form-control form-control-lg" placeholder="Enter Package Name" style="width: 75%; display: inline;" />
    <button class="btn btn-outline-success" type="submit">Search</button><div>
        
    <div id="countryList">
    </div>
    
    {{ csrf_field() }}
    </form>
   </div>
   
  </div>
</section>
<div class="explore">
  <h2><a href="{{route('front-tourpackages-list')}}">EXPLORE THE PACKAGES<i><span class="fa fa-chevron-right" style="padding-left: 10px;"></span></i></a></h2>
</div>


<section class="forum">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 class="h_forum"><a href="{{route('front-article-list')}}" style="color:#fff; text-decoration:none;">ARTICLES HERE! </a></h2>

        <button class="form-control" id="myButton" onclick="myButton()" style="width: 149px;height: 50px;margin-top: 20px;">GET UPDATES</button>
      </div>

      <div class="col-md-4">
        <img src="{{asset('/frontend/images/babaji.png')}}">
      </div>
    </div>
  </div>
</section>

@include('frontend.section._footer')
