@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{asset('/backend/jquery.dataTables.min.css') }}">
@endsection

@section('content')
<div class="right_col" role="main">
   <div class="">
       <div class="page-title">
        <div class="title_left">
        @include('backend.section._notification')
            <h3>Slider Page 
            
            </h3>
            
         </div>

         <div class="title_right">
             <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="input-group">
                 <a href="{{ route('slider-post') }}" class="btn btn-success pull-right">
              <i class="fa fa-plus"></i> Add Banner
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
                          <h2>Sliders List</h2>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                         <table class="table table-bordered jambo_table">
                         <thead>
                         <th>S.N</th>
                         <th>Title</th>
                         <th>Slogan</th>
                         <th>Link</th>
                         <th>Image</th>
                         <th>Action</th>
                         </thead>
                         <tbody>
                         @if($slider_data)
                         @foreach($slider_data as $key=>$value)
                         <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $value->title }}</td>
                         <td>{{ $value->slogan }}</td>
                         <td><a href="{{ $value->link }}" target="_banner">{{ $value->link }}</a></td>
                         <td>
                         <img src="{{ asset('/uploads/slider/'.$value->image) }}" style="max-width:100px" class="img-responsive img-thumbnail">
                         </td>
                         <td>
                         <a href="{{ route('slider-edit',$value->id) }}" class="btn btn-success"style="border-radius:50%"><i class="fa fa-pencil"></i></a>|
                         <a href="{{ route('slider-delete',$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" style="border-radius:50%"><i class="fa fa-trash"></i> </a>
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