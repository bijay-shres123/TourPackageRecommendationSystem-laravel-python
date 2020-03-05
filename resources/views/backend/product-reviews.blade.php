@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('/backend/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{asset('/backend/jquery.datetimepicker.min.css') }}">
@endsection

@section('content')
<div class="right_col" role="main">
   <div class="">
       <div class="page-title">
        <div class="title_left">
        @include('backend.section._notification')
            <h3>USER REVIEWS AND RATING PAGE 
            
            </h3>
            
         </div>

         <div class="title_right">
             <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="input-group">
                 <!-- <a href="{{ route('slider-post') }}" class="btn btn-success pull-right">
              <i class="fa fa-plus"></i> Add Banner
            </a> -->
                 </div>
            </div>
           </div>
          </div>

          <div class="clearfix"> </div>
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>USER REVIEWS</h2>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                         <table class="table table-bordered jambo_table">
                         <thead>
                         <th>S.N</th>
                         <th>USER ID</th>
                         <th>TOUR PACKAGE ID</th>
                         <th>HEADLINE</th>
                         <th>DESCRIPTION</th>
                         <th>RATING</th>
                         </thead>
                         <tbody>
                         @if($reviews_data)
                         @foreach($reviews_data as $key=>$value)
                         <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $value->user_id }}</td>
                         <td>{{ $value->tour_packages_id }}</td>
                         <td>{{ $value->headline }}" </td>
                         <td>
                         {{ $value->description }}
                         </td>
                         <td>
                        {{$value->rating}}
                         </td>
                         </tr>
                         @endforeach
                         @endif
                         </tbody>
                         
                         </table>
                      </div>
                    </div>
                 </div>
                <div>
             </div>
        </div>
@endsection
@section('scripts')
<script src="{{ asset('/backend/jquery.dataTables.min.js') }}"></script>
<script>
$('.table').DataTable();
</script>
@endsection