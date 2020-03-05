@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
   <div class="">
       <div class="page-title">
        <div class="title_left">
            <h3>{{ ucfirst($title) }} Slider 
            
            </h3>
            
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
                          <h2>{{ ucfirst($title) }} Form</h2>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                         {{ Form::open(['url'=>route('slider-submit'),'class'=>'form','enctype'=>'multipart/form-data']) }}

                         <div class="form-group row {{$errors->has('title') ? 'has-error':''}}">
                          <label for="" class="col-sm-3">Title:</label>
                          <div class="col-sm-8">
                          {{ Form::text('title',@$slider_data->title,['class'=>'form-control','required'=>'true','id'=>'title'])}}
                          @if($errors->has('title'))
                          <span class="help-block"> {{ $errors->first('title') }}</span>
                    
                          @endif
                          </div>
                         </div>

                         <div class="form-group row {{$errors->has('slogan') ? 'has-error':''}}">
                          <label for="" class="col-sm-3">Slogan:</label>
                          <div class="col-sm-8">
                          {{ Form::text('slogan',@$slider_data->slogan,['class'=>'form-control','required'=>'true','id'=>'slogan'])}}
                          @if($errors->has('slogan'))
                          <span class="help-block"> {{ $errors->first('slogan') }}</span>
                    
                          @endif
                          </div>
                         </div>

                         <div class="form-group row {{$errors->has('link') ? 'has-error':''}}">
                          <label for="" class="col-sm-3">Link:</label>
                          <div class="col-sm-8">
                          {{ Form::url('link',@$slider_data->link,['class'=>'form-control','required'=>'true','id'=>'link'])}}
                          @if($errors->has('link'))
                          <span class="help-block"> {{ $errors->first('link') }}</span>
                    
                          @endif
                          </div>
                         </div>

                         <div class="form-group row {{$errors->has('image') ? 'has-error':''}}">
                          <label for="" class="col-sm-3">Image:</label>
                          <div class="col-sm-4">
                          {{ Form::file('image',['required'=>($title=='add' ? true :false),'id'=>'image','accept'=>'image/*'])}}
                          @if($errors->has('image'))
                          <span class="help-block"> {{ $errors->first('image') }}</span>
                    
                          @endif
                          </div>
                          <div class="col-sm-4">
                          @if($title=='update' && isset($slider_data,$slider_data->image) && file_exists(public_path().'/uploads/slider/'.@$slider_data->image))
                          <img src="{{ asset('/uploads/slider/'.$slider_data->image) }}"  class="img-responsive img-thumbnail">;
                          @endif
                          </div>
                         </div>

                         <div class="form-group row">
                          <label for="" class="col-sm-3"></label>
                          <div class="col-sm-8">
                          {{Form::button('<i class="fa fa-send"></i> Post Slider',['class'=>'btn btn-success','type'=>'submit'])}}
                          </div>
                         </div>
                         {{ Form::hidden('slider_id',@$slider_data->id) }}
                         {{ Form::close() }}

                      </div>
                    </div>
                 </div>
                <div>
             </div>
        </div>
@endsection