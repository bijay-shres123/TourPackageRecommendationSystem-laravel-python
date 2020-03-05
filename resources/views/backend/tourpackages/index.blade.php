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
            <h3> TOUR PACKAGES 
            
            </h3>
            
         </div>

         <div class="title_right">
             <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="input-group">
                 <a href="{{ route('tourpackage-post') }}" class="btn btn-success pull-right">
              <i class="fa fa-plus"></i> Add Package
            </a>
                 </div>
            </div>
           </div>
          </div>

          <div class="clearfix"> </div>
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>PACKAGES List</h2>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                         <table class="table table-bordered jambo_table">
                         <thead>
                         <th>S.N</th>
                         <th>Title</th>
                         <th>Date</th>
                         <th>Link</th>
                        <th>Image</th>
                        <th>Meal Inclusion</th>
                        <th>Transport Facilities</th>
                        <th>Days/Nights</th>
                        <th>Inclusion & Exclusion List</th>
                        <th>Detailed Itinerary</th>
                        <th>Package Price</th>
                        <th>Edit/Delete</th>
                         
                         </thead>
                         <tbody>
                         @if($tour_package_data)
                         @foreach($tour_package_data as $key=>$value)
                         <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $value->title }}</td>
                         <td>{{ $value->date }}</td>
                         <td><a href="{{ $value->link }}" target="_banner">{{ $value->link }}</a></td>
                         
                         <td>
                         <img src="{{ asset('/uploads/TourPackage/'.$value->image) }}" style="max-width:100px" class="img-responsive img-thumbnail">
                         </td>
                         
                        <td>{{ $value->meal_inclusion }}</td>
                        <td>{{ $value->transport_facilities }}</td>
 
                        <td>{{ $value-> Days_Nights }}</td>
                       
                        <td>{{ $value->Inclusion_Exclusion_list  }}</td>
                        <td>{!!  substr(strip_tags($value->Detailed_itinerary), 0, 350) !!}</td>
                        <td>{{ $value->package_price }}</td>
                        <td>
                         <a href="{{ route('tourpackage-edit',$value->id) }}" class="btn btn-success"style="border-radius:50%"><i class="fa fa-pencil"></i></a>|
                         <a href="{{ route('tourpackage-delete',$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" style="border-radius:50%"><i class="fa fa-trash"></i> </a>
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
<script src="{{asset('/backend/jquery.datetimepicker.min.js') }}"></script>
<script src="{{asset('/backend/jquery.datetimepicker.full.js') }}"></script>
<script src="{{asset('/backend/jquery.jquery.js') }}"></script>

<script>
$('.table').DataTable();

$('.date').datetimepicker();


</script>
@endsection