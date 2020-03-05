@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ ucfirst($title) }} Article

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
                    {{ Form::open(['url'=>route('article-submit'),'class'=>'form','enctype'=>'multipart/form-data']) }}
                        <div class="form-group row {{$errors->has('title') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Title:</label>
                            <div class="col-sm-8">
                                {{ Form::text('title',@$article_data->title,['class'=>'form-control','required'=>'true','id'=>'title'])}}
                                @if($errors->has('title'))
                                <span class="help-block"> {{ $errors->first('title') }}</span>

                                @endif
                            </div>

                        </div>
                        
                        <div class="form-group row {{$errors->has('link') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Link:</label>
                            <div class="col-sm-8">
                                {{ Form::url('link',@$article_data->link,['class'=>'form-control','required'=>'true','id'=>'link'])}}
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
                        <div class="form-group row {{$errors->has('date') ? 'has-error':''}}">
                            <label for="" class="col-sm-3">Date:</label>
                            <div class="col-sm-8">
                                {{ Form::date('date',@$article_data->date,['class'=>'form-control','required'=>'true','id'=>'date'])}}
                                @if($errors->has('date'))
                                <span class="help-block"> {{ $errors->first('date') }}</span>

                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                            @if($title=='update' && isset($article_data,$article_data->image) && file_exists(public_path().'/uploads/TourPackage/'.@$article_data->image))
                          <img src="{{ asset('/uploads/TourPackage/'.$article_data->image) }}"  class="img-responsive img-thumbnail">;
                          @endif
                          </div>
                        </div>
                        
                        </div>
                        <div class="form-group row">
                            <lable for="" class="col-sm-3" id="editor">Description:</lable>
                            <div class="col-sm-4">
                            {{ Form::textarea('description',@$article_data->description,['class'=>'form-control','required'=>'true','id'=>'description '])}}

                            </div>
                        </div>
                       
                            <div class="form-group row">
                                <label for="" class="col-sm-3"></label>
                                <div class="col-sm-8">
                                    {{Form::button('<i class="fa fa-send"></i> Post Article',['class'=>'btn btn-success','type'=>'submit'])}}
                                </div>
                            </div>
                            {{ Form::hidden('id',@$article_data->id) }}
                            {{ Form::close() }}

                        <!-- <form action="{{ route('article-submit') }}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                            Title: <input type="text" name="title" class="form-control"><br>
                            Date <input type="text" name="date" class="form-control"><br>
                            Description: <input type="text" name="description" class="form-control"><br>
                            Link: <input type="text" name="link" class="form-control"><br>
                            Image: <input type="text" name="image" class="form-control"><br>
                           
                            <input type="submit">POST ARTICLE
                        </form> -->
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>

        <script src="{{asset('/backend/plugins/ckeditor.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
        <script>
        // CKEDITOR.replace( 'editor' );
</script>
        <!-- <script>
            ClassicEditor.create(document.querySelector('textarea'));
        </script> -->
        @endsection