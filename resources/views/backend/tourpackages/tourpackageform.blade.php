@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ ucfirst($title) }} TOUR PACKAGE

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
                        <h2>{{ ucfirst($title) }}Form</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{ Form::open(['url'=>route('tourpackage-submit'),'class'=>'form','enctype'=>'multipart/form-data']) }}
                        <div class="form-group row {{$errors->has('title') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Title:</label>
                            <div class="col-sm-8">
                                {{ Form::text('title',@$tourpackage_data->title,['class'=>'form-control','required'=>'true','id'=>'title'])}}
                                @if($errors->has('title'))
                                <span class="help-block"> {{ $errors->first('title') }}</span>

                                @endif
                            </div>

                        </div>
                        <div class="form-group row {{$errors->has('date') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Date:</label>
                            <div class="col-sm-8">
                                {{ Form::date('date',@$tourpackage_data->date,['class'=>'form-control','required'=>'true','id'=>'date'])}}
                                @if($errors->has('date'))
                                <span class="help-block"> {{ $errors->first('date') }}</span>

                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{$errors->has('link') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Link:</label>
                            <div class="col-sm-8">
                                {{ Form::url('link',@$tourpackage_data->link,['class'=>'form-control','required'=>'true','id'=>'link'])}}
                                @if($errors->has('link'))
                                <span class="help-block"> {{ $errors->first('link') }}</span>

                                @endif


                            </div>
                        </div>
                        <div class="form-group row {{$errors->has('image') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Image:</label>
                            <div class="col-sm-4">
                                {{ Form::file('image',['required'=>($title ?? ''=='add' ? true :false),'id'=>'image','accept'=>'image/*'])}}
                                
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                            @if($title=='update' && isset($tourpackage_data,$tourpackage_data->image) && file_exists(public_path().'/uploads/TourPackage/'.@$tourpackage_data->image))
                          <img src="{{ asset('/uploads/TourPackage/'.$tourpackage_data->image) }}"  class="img-responsive img-thumbnail">;
                          @endif
                          </div>
                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3">Meal Inclusion:</lable>
                            <div class="col-sm-4">
                            {{ Form::text('meal_inclusion',@$tourpackage_data->meal_inclusion,['class'=>'form-control','required'=>'true','id'=>'meal_inclusion'])}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3">Transport Facilities:</lable>
                            <div class="col-sm-4">
                            {{ Form::text('transport_facilities',@$tourpackage_data->transport_facilities,['class'=>'form-control','required'=>'true','id'=>'transport_facilities'])}}
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3">DaysNights:</label>
                            <div class="col-sm-8">
                                {{ Form::text('Days_Nights',@$tourpackage_data->Days_Nights,['class'=>'form-control','required'=>'true','id'=>'title'])}}
                                @if($errors->has('Days_Nights'))
                                <span class="help-block"> {{ $errors->first('Days_Nights') }}</span>

                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3">Inclusion & Exclusion:</lable>
                            <div class="col-sm-4">
                            {{ Form::textarea('Inclusion_Exclusion_list',@$tourpackage_data->Inclusion_Exclusion_list,['class'=>'form-control','required'=>'true','id'=>'Inclusion_Exclusion_list'])}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3">Detailed Itinerary:</lable>
                            <div class="col-sm-4">
                            {{ Form::textarea('Detailed_itinerary',@$tourpackage_data->Detailed_itinerary,['class'=>'form-control','required'=>'true','id'=>'Detailed_itinerary '])}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3">Package Price:</lable>
                            <div class="col-sm-4">
                            {{ Form::text('package_price',@$tourpackage_data->package_price,['class'=>'form-control','required'=>'true','id'=>'package_price'])}}
                            @if($errors->has('package_price'))
                                <span class="help-block"> {{ $errors->first('package_price') }}</span>

                                @endif
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3"></label>
                                <div class="col-sm-8">
                                    {{Form::button('<i class="fa fa-send"></i> Post Package',['class'=>'btn btn-success','type'=>'submit'])}}
                                </div>
                            </div>
                            {{ Form::hidden('id',@$tourpackage_data->id) }}
                            {{ Form::close() }}
                            
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>

            <script src="{{asset('/backend/plugins/ckeditor.js')}}"></script>
            <!-- <script>
                ClassicEditor.create(document.querySelector('textarea'));
            </script> -->
            @endsection