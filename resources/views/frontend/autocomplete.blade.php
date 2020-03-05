@include('frontend.section._header')

@include('frontend.section._navbar')

  <br />
  <div class="container box">
   <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3><br />
   
   <div class="form-group">
   <form class="" method="POST" action="{{route('search-result')}}">
    <div>
    <input type="text" name="q" id="country_name" class="form-control input-lg" placeholder="Enter Package Name" style="width: 75%; display: inline;" />
    <button class="btn btn-outline-success" type="submit">Search</button></div>
        
    <div id="countryList">
    </div>
    
    {{ csrf_field() }}
    </form>
   </div>
   
  </div>

  @include('frontend.section._footer')
