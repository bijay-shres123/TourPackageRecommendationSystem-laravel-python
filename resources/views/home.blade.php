@extends('layouts.admin')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
       <div class="page-title">
        <div class="title_left">
        @include('backend.section._notification')
            <h3>Dashboard Page </h3>
         </div>

         <div class="title_right">
             <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="input-group">
                 </div>
            </div>
           </div>
          </div>

          <div class="clearfix"> </div>
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Plain Page</h2>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                         Add content to the page 
                      </div>
                    </div>
                 </div>
                <div>
             </div>
        </div>







    {{--
          <!-- top tiles -->
          <div class="row tile_count">
           
          <h2> Welcome to Admin Dashboard</h2>
          <h3>Plain Page</h3>
          </div>
          <!-- /top tiles -->
          <br />
        </div>
        --}}
        <!-- /page content -->





{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
